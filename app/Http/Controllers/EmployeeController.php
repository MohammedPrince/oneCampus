<?php
namespace App\Http\Controllers;

use App\Http\Requests\EmpBulk\BulkRequest;
use App\Http\Requests\Employee\EmployeeRequest;
use App\Http\Requests\Employee\UpdateEmployeeRequest;

use App\Services\Employee\EmployeeServices;
use Illuminate\Http\Request;


class EmployeeController extends Controller
{
    protected $employeeService;

    public function __construct(EmployeeServices $employeeService)
    {
        $this->employeeService = $employeeService;
    }    
  public function uploadEmployees(BulkRequest $request)
{
    $validated = $request->validated(); // Optional: Already runs `validate()` implicitly

    $result = $this->employeeService->bulkUpload($request->file('bulk_file'));

    return back()->with('message', "{$result['success']} users uploaded successfully, {$result['error']} failed.");
}

    public function index()
    {
        $employees = $this->employeeService->listEmployees();
        $roles = $this->employeeService->getRoles();
        return view('admin.user.list', compact('employees','roles'));
    }

    public function store(EmployeeRequest $request)
    {
        $data = $request->validated();
        $this->employeeService->createEmployee($data);
        return redirect()->route('user.add')->with('success', 'Employee added successfully!');
    }

    public function edit($id)
    {
        $employee = $this->employeeService->getEmployee($id);
        return response()->json($employee);
    }

    public function update(UpdateEmployeeRequest $request, $id)
    {
        $data = $request->validated();
        if ($request->hasFile('cv')) {
            $data['cv'] = $request->file('cv')->store('employee_cvs');
        }

        if ($request->hasFile('certificates')) {
            $data['certificates'] = $request->file('certificates')->store('employee_certificates');
        }

        $this->employeeService->updateEmployee($data, $id);
        return redirect()->route('user.list')->with('success', 'Employee added successfully!');
    }

    public function destroy($id)
    {
        $this->employeeService->deleteEmployee($id);
        return redirect()->back()->with('success', 'Employee deleted successfully');
    }

    public function show($id)
    {
        $employee = $this->employeeService->getEmployee($id);
        return view('admin.user.show', compact('employee'));
    }
}
