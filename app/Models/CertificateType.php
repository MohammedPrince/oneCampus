<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CertificateType extends Model
{
    use SoftDeletes;

    protected $table = 'lookup_certificate_type';
    protected $primaryKey = 'certificate_type_id';
    public $timestamps = true;

    protected $fillable = [
        'certificate_type_name',
        'certificate_type_name_ar',
    ];
}
