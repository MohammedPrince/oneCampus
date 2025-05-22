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
        // dd($request->validated());
    //     $result = $this->majorService->createMajor($request->validated());
    //     // return response()->json(['message' => 'Major deleted successfully.']);
    //     if ($result == 'success') {
    //    return response()->json([
    //             'message' => 'Major added successfully!',
    //             'major' => $major
    //         ], 201);
    //         // return redirect()->back()->with('success', 'Major added successfully!');
    //     // return response()->json(['message' => 'Major added successfully!']);

    //     } elseif ($result == 'error') {
    //         return redirect()->route('admin.academic.major')->with('error', 'Major Not Added!');
    //     }

        try {
            // Call the service method to create the major
            $major = $this->majorService->createMajor($request->validated());

            return response()->json([
                'message' => 'Major added successfully!',
                'major' => $major
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error creating major: ' . $e->getMessage()
            ], 500);
        }
    }

    // Show the edit form for a specific major
    public function edit($id)
    {
        $major = $this->majorService->findMajor($id);
        return response()->json(['major' => $major]);
    }

    // Update a major
    public function update(UpdateMajorRequest $request, $id)
    {
        // Find the major
        $major = $this->majorService->findMajor($id);

        // Call the service method to update the major
        $updatedMajor = $this->majorService->updateMajor($major, $request->validated());

        return response()->json([
            'message' => 'Major updated successfully!',
            'major' => $updatedMajor
        ]);
    }

    // Delete a major
    public function destroy($id)
    {
        // Find the major
        $major = $this->majorService->findMajor($id);
        // dd($major);
        // Call the service method to delete the major
        $this->majorService->deleteMajor($major);

        return response()->json(['message' => 'Major deleted successfully.']);
    }
}
