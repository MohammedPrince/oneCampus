<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faculty extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'faculty_name_en',
        'abbreviation',
        'faculty_name_ar',
        'branch_id',
        'is_active',
    ];

    protected $table = 'tbl_faculty';

}
