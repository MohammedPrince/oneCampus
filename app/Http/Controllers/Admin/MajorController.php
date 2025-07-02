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
    // public function store(StoreMajorRequest $request)
    // {

    //     $major = $this->majorService->createMajor($request->validated());
    //     if($major == "exists"){
    //     return redirect()->route('admin.academic.major')->with('exists', 'Majorwith the same details already exists.');
    //     }
    //     return redirect()->route('admin.academic.major')->with('success', 'Major added successfully!');        
    // }

    public function store(StoreMajorRequest $request)
{
    $result = $this->majorService->createMajor($request->validated());

    if ($result == "exists") {
        return redirect()->route('admin.academic.major')
            ->with('exist', 'Major with the same details already exists.');
    }

    return redirect()->route('admin.academic.major')
        ->with('success', 'Major added successfully!');
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

        // dd($request->validated());    

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

        // Call the service method to delete the major
        $result = $this->majorService->deleteMajor($major);

        if (!$result) {
        return redirect()->route('admin.academic.major')->with('error', 'Major Not Deleted !');
        }
        return redirect()->route('admin.academic.major')->with('success', 'Major deleted successfully!');
    }


}
