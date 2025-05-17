<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CertificateMajor extends Model
{
    use SoftDeletes;

    protected $table = 'lookup_certificate_major';
    protected $primaryKey = 'certificate_major_id';
    public $timestamps = true;

    protected $fillable = [
        'certificate_major_name',
        'certificate_major_name_ar',
    ];
}
