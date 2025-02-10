<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class AdmissionOnline extends Model
{
    use SoftDeletes;
    public $timestamps = true;

    protected $fillable = [
        'university_id',
        'application_level',
        'admission_status', 
        'student_id',
        'first_name',
        'second_name',
        'third_name',
        'last_name',
        'first_namear',
        'second_namear',
        'third_namear',
        'last_namear',
        'student_photo',
        'activity_status',
        'batch',
        'current_semester',
        'branch_id',
        'faculty_id',
        'major_id',
        'student_study_mode',
        'gender',
        'blood_group',
        'military_code',
        'date_of_birth',
        'nationality',
        'nationality_2',
        'student_address',
        'student_town',
        'student_state',
        'student_country',
        'student_email',
        'phone_number',
        'whatsapp_number',
        'facebook_link',
        'twitter_id',
        'identification_id_type',
        'identification_id',
        'identification_id_issue_date',
        'identification_id_expired_date',
        'identification_id_issue_place',
        'identification_id_upload',
        'place_of_residence',
        'visa_id',
        'visa_type',
        'visa_expired_date',
        'religious',
        'sibling',
        'guardian_name',
        'guardian_relationship',
        'guardian_gender',
        'ocupation',
        'work_location',
        'guardian_address',
        'guardian_email',
        'guardian_phone_number',
        'school_name',
        'school_place',
        'certificate_no',
        'certicate_issue_date',
        'pass_percentage',
        'no_of_subjects',
        'failed_subjects',
        'student_certificate_upload',
        'certificate_type_code',
        'certificate_major_code',
    ];
    protected $table = 'tbl_admission_oline';
}
