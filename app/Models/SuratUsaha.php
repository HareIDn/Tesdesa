<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratUsaha extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'surat_usahas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pengajuan_id',
        'nama_lengkap',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jabatan',
        'pekerjaan',
        'npwp',
        'no_telepon',
        'alamat_lengkap',
        'rt',
        'rw',
        'kecamatan',
        'kelurahan',
        'kabupaten',
    ];

    /**
     * Get the pengajuan that owns the SuratUsaha.
     */
    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class);
    }
}
