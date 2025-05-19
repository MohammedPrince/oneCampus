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
    ->whereHas('department')
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

    /**
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
