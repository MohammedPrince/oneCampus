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
        'employee_id','gender', 'nationality',
        'date_of_birth', 'whatsapp_number', 
        'identification_id_type', 'identification_id',
        'role', 'certificates', 'cv', 'biometric', 'hire_date',
        'end_date'
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
