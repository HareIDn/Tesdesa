<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendukungSktm extends Model
{
    use HasFactory;

    protected $fillable = [
        'sktm_id',
        'ayah',
        'pekerjaan_ayah',
        'ibu',
        'pekerjaan_ibu',
        'jumlah_tanggungan',
        'penghasilan_perbulan',
    ];

    public function sktm()
    {
        return $this->belongsTo(Sktm::class);
    }
}
