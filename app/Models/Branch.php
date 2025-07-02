<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Branch extends Model
{
    use SoftDeletes;
    public $timestamps = true;
    protected $table = 'tbl_branch';
    protected $primaryKey = 'branch_id'; // or whatever the actual column name is

    protected $fillable = [
        'branch_name_ar',
        'branch_name_en',
        'branch_address',
        'country_id',
        'branch_city',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'country_id');
    }

    public function batchControls()
    {
        return $this->hasMany(BatchControl::class, 'branch_id');
    }
    

    public static function createBranch(array $data): self
    {
        return self::create($data);
    }

    public function updateBranch(array $data): bool
    {
        return $this->update($data);
    }

    public function deleteBranch(): bool
    {
        return $this->delete();
    }

}
