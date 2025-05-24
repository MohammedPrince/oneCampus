<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Faculty\StoreFacultyRequest;
use App\Http\Requests\Faculty\UpdateFacultyRequest;
use App\Models\Branch;
use App\Services\Faculty\FacultyServices;
use Illuminate\Http\RedirectResponse;

class FacultyController extends Controller
{
    protected $facultyService;

    public function __construct(FacultyServices $facultyService)
    {
        $this->facultyService = $facultyService;
    }

    public function index()
    {
        $faculties = $this->facultyService->all();
        $branches = Branch::all();

        return view('admin.rules.department', compact('faculties', 'branches'));
    }

    public function edit($id)
    {
        $faculty = $this->facultyService->findById($id);

        return response()->json([
            'status' => true,
            'data' => $faculty
        ]);
    }

    public function store(StoreFacultyRequest $request)
    {
        $this->facultyService->store($request->validated());
        return back()->with('success', 'Faculty added successfully');
        return redirect()->route('admin.rule.dept')->with('success', 'Faculty added successfully!');
        // return response()->json(['message' => 'Faculty added successfully']);
    }

    public function update(UpdateFacultyRequest $request , $id)
    {

        // return redirect()->route('admin.rule.dept')->with('success', 'Faculty updated successfully!');



        // echo $id;
        // dd($request->validated());
        $result = $this->facultyService->update($id, $request->validated());
        if ($result){
        return redirect()->route('admin.rule.dept')->with('success', 'Faculty updated successfully!');

        }else{
        return redirect()->route('admin.rule.dept')->with('error', 'Faculty  Not updated!');
    
        }

    // return response()->json(['message' => 'Faculty Updated successfully']);

     }





    public function destroy($id)
    {
        // echo $id;
        $faculty =  $this->facultyService->delete($id);

        if($faculty) {

         return redirect()->route('admin.rule.dept')->with('success', 'Faculty deleted successfully!');

        }else {
         return redirect()->route('admin.rule.dept')->with('error', 'Faculty not found!');

        }

    // return response()->json(['message' => 'Faculty Deleted successfully']);
    }



   public function show(){


   }
}
