<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domisili extends Model
{
    use HasFactory;

    protected $fillable = [
        'pengajuan_id',
        'nama_lengkap',
        'nik',
        'tempat',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'pekerjaan',
        'telepon',
        'alamat_lengkap',
        'rt',
        'rw',
        'kelurahan',
        'kecamatan',
        'kabupaten',
    ];

    /**
     * Relasi ke model Pengajuan.
     */
    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class);
    }
}
