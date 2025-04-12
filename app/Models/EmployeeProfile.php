<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class EmployeeProfile extends Model
{
    use SoftDeletes;
    public $timestamps = true;
    protected $fillable = [
        'gender',
        'blood_group',
        'nationality',
        'nationality_2',
        'religious',

        'date_of_birth',
        'whatsapp_number',
        'facebook_account',
        'twitter_account',
        'instgram_account',

        'address',
        'town',
        'state',
        'country',
        'place_of_residenceplace_of_residence',

        'office_location',
        'identification_id_type',
        'identification_id',
        'identification_id_issue_date',
        'identification_id_expired_date',

        'identification_id_issue_place',
        'identification_id_upload',
        'visa_id',
        'visa_type',
        'visa_expired_date',

        'role',
        'certificates',
        'employment_type',
        'biometric',
        'hire_date',

        'end_date',
        'position_level',
        'salary',
        'military_code',
        'marital_status',

        'employment_status',
        'spouse_name',
        'spouse_nationality',

    ];

    protected $table = 'tbl_employee_profile';
}
