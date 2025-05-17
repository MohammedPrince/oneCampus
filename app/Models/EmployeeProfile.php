<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeProfile extends Model
{
    use SoftDeletes;

    protected $table = 'tbl_employee_profile';

    protected $primaryKey = 'employee_profile_id';

    public function mainInfo()
    {
        return $this->belongsTo(EmployeeMainInfo::class, 'employee_id', 'employee_id');
    }
     protected $fillable = [
        'employee_id','gender', 'nationality', 'nationality_2', 'religious',
        'date_of_birth', 'whatsapp_number', 'facebook_account',
        'twitter_account', 'instgram_account', 'address', 'town',
        'state', 'country', 'place_of_residence', 'office_location',
        'identification_id_type', 'identification_id', 'identification_id_issue_date',
        'identification_id_expired_date', 'identification_id_issue_place',
        'identification_id_upload', 'visa_id', 'visa_type', 'visa_expired_date',
        'role', 'certificates', 'cv', 'employment_type', 'biometric', 'hire_date',
        'end_date', 'position_level', 'salary', 'military_code',
        'marital_status', 'employment_status', 'spouse_name', 'spouse_nationality'
    ];
    public function roleInfo()
    {
        return $this->belongsTo(Role::class, 'role', 'id');
    }
    
    // Optional helper methods
    public static function createProfile(array $data)
    {
        return self::create($data);
    }

    public function updateProfile(array $data)
    {
        return $this->update($data);
    }

    public function deleteProfile()
    {
        return $this->delete();
    }
  
}
