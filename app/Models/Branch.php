<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Branch extends Model
{
    use SoftDeletes;
    public $timestamps = false;

    protected $fillable = [
        'branch_name',
        'branch_address',
        'branch_country',
        'branch_city',
    ];

    protected $table = 'tbl_branch';


}
