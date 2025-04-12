<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BatchControl extends Model
{
    use SoftDeletes;
    public $timestamps = true;

    protected $fillable = [
        'branch_id',
        'faculty_id',
        'major_id',
        'batch',
        'max_semester',
        'active_semester',
        'graduate_status',
    ];
    protected $table = 'tbl_batch_control';
}
