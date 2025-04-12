<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeMainInfo extends Model
{
    use SoftDeletes;
    public $timestamps = true;
    protected $fillable = [
        'full_name_en',
        'first_name_en',
        'second_name_en',
        'third_name_en',
        'fourth_name_en',
        
        'full_name_ar',
        'first_name_ar',
        'second_name_ar',
        'third_name_ar',
        'fourth_name_ar',

        'phone_number',
        'employee_photo',
        'status',
        'corporate_email',
        'personal_email',

        'branch_id',
        'department_id',
        'user_id',
    ];

    protected $table = 'tbl_employee_main_info';

}
