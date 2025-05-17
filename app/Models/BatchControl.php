<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BatchControl extends Model
{
    use SoftDeletes;
    public $timestamps = true;

    protected $table = 'tbl_batch_control';
    protected $primaryKey = 'batch_control_id';

    protected $fillable = [
        'batch',
        'branch_id',
        'faculty_id',
        'major_id',
        'batch',
        'active_sem',
        'max_sem',
        'graduate_status',
    ];
    public function branch()
    {
        return $this->belongsTo(Branch::class,'branch_id');
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class,'faculty_id');
    }

    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id');  // Correct foreign key 'major_id'
    }
}
