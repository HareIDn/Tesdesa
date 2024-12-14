<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skck extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak sesuai dengan nama default
    protected $table = 'skcks';

    // Tentukan kolom yang bisa diisi secara massal
    protected $fillable = [
        'pengajuan_id',
        'nama_lengkap',
        'nik',
        'tempat',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'pekerjaan',
        'alamat_lengkap'
    ];

    // Menentukan relasi dengan model Pengajuan (jika dibutuhkan)
    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class);
    }
}

