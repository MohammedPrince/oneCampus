<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BatchControl extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'batch_id',
        'faculty_id',
        'major_id',
        'batch',
        'active_sem',
        'max_sem',
        'graduate_status',
    ];
    protected $table = 'tbl_batch_control';

}
