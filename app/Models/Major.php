<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Major extends Model
{
    use SoftDeletes;
    public $timestamps = true;


    protected $fillable = [
        'major_name',
        'major_abbreviation',
        'degree_type',
        'program_duration',
        'number_of_sem',
        'credits_required',
        'faculty_id',
        'is_active',
        'major_name_ar',
        'major_ministry_code',
        'major_mode',
    ];

    protected $table = 'tbl_major';

    
}
