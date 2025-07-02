<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

        return redirect()->route('user.list')->with('success', 'File Uploaded successfully!');
    }
    public function getUserData(){
     $faculties = $this->employeeService->getFaculty();
     $roles = $this->employeeService->getRoles();
     $branches = $this->employeeService->getAllBranch(); // Assuming this method exists in your BatchService

     return view('admin.user.add_users',compact('faculties','roles','branches'));
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

    $employeeName = strtolower(str_replace(' ', '_', $data['full_name_en']));

    // Cv code
    if ($request->hasFile('cv')) {
        $cvFile = $request->file('cv');
        $cvFileName = $employeeName . '_cv.' . $cvFile->getClientOriginalExtension();
        $data['cv'] = $cvFile->storeAs('employee_cvs', $cvFileName, 'public');
    }

    //  certificate code
    if ($request->hasFile('certificates')) {
        $certificateFile = $request->file('certificates');
        $certificateFileName = $employeeName . '_certificate.' . $certificateFile->getClientOriginalExtension();
        $data['certificates'] = $certificateFile->storeAs('employee_certificates', $certificateFileName, 'public');
    }

    $this->employeeService->createEmployee($data);
    
    return redirect()->route(route: 'user.list')->with('success', 'Employee added successfully!');
}

    public function update(UpdateEmployeeRequest $request)
    {
        $data = $request->validated();
        $id = $data['id'];

        $employeeName = strtolower(str_replace(' ', '_', $data['full_name_en']));

        if ($request->hasFile('cv')) {
            $cvFile = $request->file('cv');
            $cvFileName = $employeeName . '_cv.' . $cvFile->getClientOriginalExtension();
            $data['cv'] = $cvFile->storeAs('employee_cvs', $cvFileName, 'public');
        }

        if ($request->hasFile('certificates')) {
            $certificateFile = $request->file('certificates');
            $certificateFileName = $employeeName . '_certificate.' . $certificateFile->getClientOriginalExtension();
            $data['certificates'] = $certificateFile->storeAs('employee_certificates', $certificateFileName, 'public');
        }

        $this->employeeService->updateEmployee($data, $id);
        
        return redirect()->route('user.list')->with('success', 'Employee updated successfully!');
    }



        public function edit($id)
        {
            $employee = $this->employeeService->getEmployee($id);
            return response()->json($employee);
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
