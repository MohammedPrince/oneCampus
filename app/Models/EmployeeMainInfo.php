<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeMainInfo extends Model
{
    use HasFactory;

    protected $table = 'tbl_employee_main_info';
    protected $primaryKey = 'employee_id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'full_name_ar', 'full_name_en', 'phone_number', 
        'personal_email', 'corporate_email', 'branch_id', 
        'department_id', 'user_id', 'biometric','gender',
    ];

    public function branch()
{
    return $this->belongsTo(Branch::class, 'branch_id');
}

public function department()
{
    return $this->belongsTo(Faculty::class, 'department_id');
}

    public function profile()
    {
        return $this->hasOne(EmployeeProfile::class, 'employee_id', 'employee_id');
    }
}
