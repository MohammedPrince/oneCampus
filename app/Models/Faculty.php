<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faculty extends Model
{
    use SoftDeletes;

    protected $table = 'tbl_faculty';
    protected $primaryKey = 'faculty_id';

    protected $fillable = [
        'faculty_name_en',
        'faculty_name_ar',
        'abbreviation',
        'branch_id',
      
    ];
        public function batchControls()
    {
        return $this->hasMany(BatchControl::class, 'faculty_id');
    }

    public function branch()
    {
     return $this->belongsTo(Branch::class, 'branch_id', 'branch_id');
        }
    
    public static function createFaculty(array $data)
    {
        return self::create($data);
    }
    
    public function updateFaculty(array $data)
    {
        return $this->update($data);
    }
    
    public function deleteFaculty()
    {
        return $this->delete();
    }
    
}
