<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

class subsktm extends Model
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
        'sktm_id',
        'ayah',
        'pekerjaan_ayah',
        'ibu',
        'pekerjaan_ibu',
        'jumlah_tanggungan',
        'penghasilan_perbulan',
        'sktm_id',
        'pilih_tujuan',
        'keterangan',
        'dokumen_pendukung',
    ];
    protected function dokumenPendukung(): Attribute {
        return Attribute::make(
            get: fn ($dokumen) => Storage::url($dokumen)
        );
    }

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class);
    }

}
