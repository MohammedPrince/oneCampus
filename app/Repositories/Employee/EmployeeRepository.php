<?php

namespace App\Repositories\Employee;

use App\Models\Branch;
use App\Models\Employee;
use App\Models\Role;
use App\Models\EmployeeMainInfo;
use App\Models\EmployeeProfile;
use App\Models\Faculty;

class EmployeeRepository
{
    public function getAll()
    {
  $employees = EmployeeMainInfo::with(['branch', 'department', 'profile.roleInfo'])
    ->get();

  return $employees;
    }
    public function getFaculty(){
        return Faculty::all();
    }
    public function getAllBranch(){
        return Branch::all();
    }
    public function findById($id)
    {
        return EmployeeMainInfo::with('profile')->findOrFail($id);

    }
    /**
     * Create a new employee, including employee main info and profile data.
     *
     * @param  array $data
     * @return \App\Models\Employee
     */
    public function create(array $data)
    {
        // Calls the Employee model's method to create both main info and profile data.
        return Employee::createEmployeeData($data);

        
        //  $cvPath = null;
        // $certificatesPath = null;

        // // Check if 'cv' exists and is a valid file upload
        // if (isset($validatedData['cv']) && $validatedData['cv'] instanceof \Illuminate\Http\UploadedFile && $validatedData['cv']->isValid()) {
        //     $cvPath = $validatedData['cv']->store('documents', 'public');
        // }

        // // Check if 'certificates' exists and is a valid file upload
        // if (isset($validatedData['certificates']) && $validatedData['certificates'] instanceof \Illuminate\Http\UploadedFile && $validatedData['certificates']->isValid()) {
        //     $certificatesPath = $validatedData['certificates']->store('documents', 'public');
        // }

        // // First, create the main employee record (employee_main_info)
        // $employeeMainInfo = EmployeeMainInfo::create([
        //     'full_name_ar'     => $validatedData['full_name_ar'],
        //     'full_name_en'     => $validatedData['full_name_en'],
        //     'personal_email'   => $validatedData['personal_email'],
        //     'corporate_email'  => $validatedData['corporate_email'],
        //     'phone_number'     => $validatedData['phone_number'],
        //     'department_id'       => $validatedData['department_id'],
        //     'branch_id'           => $validatedData['branch_id'],
        //     'user_id'          =>Auth::id()
        // ]);
        // $latestId = DB::getPdo()->lastInsertId();

        // // Then, create the employee profile record (employee_profile)
        // $employeeProfile = EmployeeProfile::create([
        //     'employee_id' => $latestId,
        //     'nationality'        => $validatedData['nationality'],
        //     'whatsapp_number'    => $validatedData['whatsapp_number'] ?? null,
        //     'date_of_birth'       => $validatedData['birth_date'],
        //     'role'             => $validatedData['role'],
        //     'biometric'        => $validatedData['biometric'],
        //     'gender'           => $validatedData['gender'],
        //     'hire_date' => $validatedData['hire_date'],
        //     'identification_id_type' => $validatedData['identification_type'],  // Enum value ('National ID', 'Passport', etc.)
        //     'identification_id' => $validatedData['identification_id'],  // The identification number input by the user
        //     'cv'               => $cvPath,
        //     'certificates'     => $certificatesPath,

        // ]);

        // // Return the employee profile and employee main info as a response
        // return $employeeMainInfo;

    }

    /**
     * Update an existing employee's data, including updating their main info and profile.
     *
     * @param  array $data
     * @param  int $id
     * @return \App\Models\Employee
     */
    public function update(array $data, $id)
    {
        // Calls the Employee model's method to update both main info and profile data.
        return Employee::updateEmployeeData($data, $id);
    }

    /**
     * Delete an employee and their associated data (main info, profile).
     *
     * @param  int $id
     * @return bool
     */
    public function delete($id)
    {
        // Calls the Employee model's method to delete both the employee's main info and profile.
        return Employee::deleteEmployee($id);
    }

    /**-+
     * Get all available roles.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getRoles()
    {
        return Role::all();
    }

    /**
     * Get an employee's profile based on employee ID.
     *
     * @param  int $id
     * @return \App\Models\EmployeeProfile
     */
    public function getProfileByEmployeeId($id)
    {
        return EmployeeProfile::where('employee_profile_id', $id)->first();
    }

    /**
     * Get employee main info based on employee ID.
     *
     * @param  int $id
     * @return \App\Models\EmployeeMainInfo
     */
    public function getMainInfoByEmployeeId($id)
    {
        return EmployeeMainInfo::where('employee_id', $id)->first();
    }
}
