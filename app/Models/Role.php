<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'slug'];

    protected $table = 'tbl_roles';

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
