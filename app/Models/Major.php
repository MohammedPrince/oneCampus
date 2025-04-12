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
        'major_name_en',
        'major_name_ar',
        'major_abbreviation',
        'credits_required',
        'major_ministry_code',
        'major_mode',
        'degree_type',
        'faculty_id',
        'number_of_semesters',
        'program_duration',
        'is_active',
    ];

    protected $table = 'tbl_major';

    
}
