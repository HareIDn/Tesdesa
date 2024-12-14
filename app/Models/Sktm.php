<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sktm extends Model
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

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class);
    }

    public function pendukung()
    {
        return $this->hasOne(PendukungSktm::class);
    }

    public function dokumen()
    {
        return $this->hasMany(DokumenSktm::class);
    }
}
