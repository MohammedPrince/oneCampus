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
        return back()->with('success', 'Faculty created successfully.');
    }

    public function update(UpdateFacultyRequest $request, $id)
    {
        $this->facultyService->update($id, $request->validated());
        
        return back()->with('success', 'Faculty Updated successfully.');
          
     }

    public function destroy($id): RedirectResponse
    {
        $this->facultyService->delete($id);
        return back()->with('success', 'Faculty deleted successfully.');
    }
}
