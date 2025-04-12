<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Intake extends Model
{
    use SoftDeletes;
    public $timestamps = true;

    protected $fillable = [
        'intake_name',
        'intake_name_ar',
        'intake_year',
        'created_by',
        
    ];

    protected $table = 'tbl_intake';

}
