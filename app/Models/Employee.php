<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    use HasFactory;

protected $table ='tbl_employee_main_info';
    // Fillable fields for employee_main_info table
   

    protected $casts = [
        'birth_date' => 'date',
        'recruitment_date' => 'date',
    ];

    /**
     * Define relationship with Role model
     */
    public function role()
    {
        return $this->belongsTo(Role::class, 'role');
    }

    /**
     * Define relationship with EmployeeProfile model
     */
    public function profile()
    {
        return $this->hasOne(EmployeeProfile::class, 'employee_id');
    }

    /**
     * Define relationship with EmployeeMainInfo model
     */
    public function mainInfo()
    {
        return $this->hasOne(EmployeeMainInfo::class, 'employee_id');
    }

    /**
     * Create employee and related data in employee_profile and employee_main_info tables
     */
    public static function createEmployeeData(array $validatedData)
    {
        // Initialize paths as null in case no file is uploaded
        $cvPath = null;
        $certificatesPath = null;

        // Check if 'cv' exists and is a valid file upload
        if (isset($validatedData['cv']) && $validatedData['cv'] instanceof \Illuminate\Http\UploadedFile && $validatedData['cv']->isValid()) {
            $cvPath = $validatedData['cv']->store('documents', 'public');
        }

        // Check if 'certificates' exists and is a valid file upload
        if (isset($validatedData['certificates']) && $validatedData['certificates'] instanceof \Illuminate\Http\UploadedFile && $validatedData['certificates']->isValid()) {
            $certificatesPath = $validatedData['certificates']->store('documents', 'public');
        }

        // First, create the main employee record (employee_main_info)
        $employeeMainInfo = EmployeeMainInfo::create([
            'full_name_ar'     => $validatedData['full_name_ar'],
            'full_name_en'     => $validatedData['full_name_en'],
            'personal_email'   => $validatedData['personal_email'],
            'corporate_email'  => $validatedData['corporate_email'],
            'phone_number'     => $validatedData['phone_number'],
            'department_id'       => $validatedData['department_id'],
            'branch_id'           => $validatedData['branch_id'],
            'user_id'          =>Auth::id()
        ]);
        $latestId = DB::getPdo()->lastInsertId();

        // Then, create the employee profile record (employee_profile)
        $employeeProfile = EmployeeProfile::create([
            'employee_id' => $latestId,
            'nationality'        => $validatedData['nationality'],
            'whatsapp_number'    => $validatedData['whatsapp_number'] ?? null,
            'date_of_birth'       => $validatedData['birth_date'],
            'role'             => $validatedData['role'],
            'biometric'        => $validatedData['biometric'],
            'gender'           => $validatedData['gender'],
            'hire_date' => $validatedData['hire_date'],
            'identification_id_type' => $validatedData['identification_type'],  // Enum value ('National ID', 'Passport', etc.)
            'identification_id' => $validatedData['identification_id'],  // The identification number input by the user
            'cv'               => $cvPath,
            'certificates'     => $certificatesPath,
   
        ]);

        // Return the employee profile and employee main info as a response
        return $employeeMainInfo;
    }

    /**
     * Update employee data in employee_main_info and employee_profile
     */
    public static function updateEmployeeData(array $validatedData, $id)
    {
        // Find employee records
        $employeeMainInfo = EmployeeMainInfo::findOrFail($id);
        $employeeProfile = EmployeeProfile::where('employee_id', $id)->first(); // Use employee_id not employee_profile_id
    
        // Initialize file paths with current values
        $cvPath = $employeeProfile->cv ?? null;
        $certificatesPath = $employeeProfile->certificates ?? null;
    
        // Handle CV upload if present
        if (isset($validatedData['cv']) && $validatedData['cv'] instanceof \Illuminate\Http\UploadedFile && $validatedData['cv']->isValid()) {
            $cvPath = $validatedData['cv']->store('documents', 'public');
        }
    
        // Handle Certificates upload if present
        if (isset($validatedData['certificates']) && $validatedData['certificates'] instanceof \Illuminate\Http\UploadedFile && $validatedData['certificates']->isValid()) {
            $certificatesPath = $validatedData['certificates']->store('documents', 'public');
        }
    
        // Update employee main info
        $employeeMainInfo->update([
            'full_name_ar'     => $validatedData['full_name_ar'] ?? $employeeMainInfo->full_name_ar,
            'full_name_en'     => $validatedData['full_name_en'] ?? $employeeMainInfo->full_name_en,
            'personal_email'   => $validatedData['personal_email'] ?? $employeeMainInfo->personal_email,
            'corporate_email'  => $validatedData['corporate_email'] ?? $employeeMainInfo->corporate_email,
            'phone_number'     => $validatedData['phone_number'] ?? $employeeMainInfo->phone_number,
            'department_id'    => $validatedData['department_id'] ?? $employeeMainInfo->department_id,
            'branch_id'        => $validatedData['branch_id'] ?? $employeeMainInfo->branch_id,
        ]);
    
        // Update employee profile if found
        if ($employeeProfile) {
            $employeeProfile->update([
                'gender'                => $validatedData['gender'] ?? $employeeProfile->gender,
                'nationality'           => $validatedData['nationality'] ?? $employeeProfile->nationality,
                'whatsapp_number'       => $validatedData['whatsapp_number'] ?? $employeeProfile->whatsapp_number,
                'role'                  => $validatedData['role'] ?? $employeeProfile->role,
                'biometric'             => $validatedData['biometric'] ?? $employeeProfile->biometric,
                'hire_date'             => $validatedData['hire_date'] ?? $employeeProfile->hire_date,
                'date_of_birth'         => $validatedData['birth_date'] ?? $employeeProfile->date_of_birth,
                'identification_id_type' => $validatedData['identification_type'] ?? $employeeProfile->identification_id_type,
                'identification_id'     => $validatedData['identification_id'] ?? $employeeProfile->identification_id,
                'cv'                    => $cvPath,
                'certificates'          => $certificatesPath,
            ]);
        }
    
        return $employeeMainInfo;
    }
    

    /**
     * Delete employee and related data
     */
    public static function deleteEmployee($id)
    {
        // Find the employee's main info and profile
        $employeeMainInfo = EmployeeMainInfo::findOrFail($id);
        $employeeProfile = EmployeeProfile::where('employee_profile_id', $id)->first();

        // Delete the employee's profile data if it exists
        if ($employeeProfile) {
            $employeeProfile->delete();
        }

        // Delete the employee's main info record
        $employeeMainInfo->delete();

        return true;
    }
}
