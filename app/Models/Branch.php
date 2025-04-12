<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Branch extends Model
{
    use SoftDeletes;
    public $timestamps = true;


    protected $fillable = [
        'branch_name_ar',
        'branch_name_en',
        'branch_country',
        'branch_city',
        'branch_address',
    ];

    protected $table = 'tbl_branch';


}
