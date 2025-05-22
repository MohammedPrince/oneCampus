<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Major\StoreMajorRequest;
use App\Http\Requests\Major\UpdateMajorRequest;
use App\Services\Major\MajorService;
use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    protected $majorService;

    // Inject MajorService into the controller
    public function __construct(MajorService $majorService)
    {
        $this->majorService = $majorService;
    }

    // Display the list of majors
    public function index()
    {
        $majors = $this->majorService->getAllMajors();
        $faculty = $this->majorService->getAllFaculty();

         return view('admin.academic.majors', compact('majors','faculty'));
    }
    public function getMajorData()
    {
        $majors = $this->majorService->getAllMajors();
        return response()->json(['majors' => $majors]);

    }
    public function getMajorsByFaculty($id)
    {
        $majors = Major::where('faculty_id', $id)->get();
        return response()->json($majors);
    }

    // Store a new major
    public function store(StoreMajorRequest $request)
    {

        $data = $request->validated();
        $this->majorService->createMajor($data);
        return redirect()->route('admin.academic.major')->with('success', 'Major added successfully!');

        // try {
        //     // Call the service method to create the major
        //     $major = $this->majorService->createMajor($request->validated());

        //     return response()->json([
        //         'message' => 'Major added successfully!',
        //         'major' => $major
        //     ], 201);

        // } catch (\Exception $e) {
        //     return response()->json([
        //         'message' => 'Error creating major: ' . $e->getMessage()
        //     ], 500);
        // }
    }

    // Show the edit form for a specific major
    public function edit($id)
    {
        $major = $this->majorService->findMajor($id);
        return response()->json(['major' => $major]);
    }

    // Update a major
    // public function update(UpdateMajorRequest $request)
    public function update(Request $request)
    {

        $major = $this->majorService->findMajor($request->major_id);

        $updatedMajor = $this->majorService->updateMajor($major, $request->all());

        return redirect()->route('admin.academic.major')->with('success', 'Major updated successfully!');


        // return response()->json([
        //     'message' => 'Major updated successfully!',
        //     'major' => $updatedMajor
        // ]);
    }

    // Delete a major
    public function destroy($id)
    {
        // Find the major
        $major = $this->majorService->findMajor($id);
        // dd($major);
        // Call the service method to delete the major
        $this->majorService->deleteMajor($major);
        return redirect()->route('admin.academic.major')->with('success', 'Major deleted successfully.!');

        // return response()->json(['message' => 'Major deleted successfully.']);
    }
}
