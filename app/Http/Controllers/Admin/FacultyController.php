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
    return response()->json(['message' => 'Faculty added successfully']);
    }

    public function update(UpdateFacultyRequest $request, $id)
    {
        $this->facultyService->update($id, $request->validated());
        
    return response()->json(['message' => 'Faculty Updated successfully']);
          
     }

    public function destroy($id)
    {
        $this->facultyService->delete($id);
    return response()->json(['message' => 'Faculty Deleted successfully']);
    }
}
