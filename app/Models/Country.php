<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
 use SoftDeletes;

    protected $table = 'tbl_country';
    protected $primaryKey = 'country_id';

public function branches()
{
    return $this->hasMany(Branch::class, 'country_id', 'country_id');
}

}
