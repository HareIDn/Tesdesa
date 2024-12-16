<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupportUsaha extends Model
{
    protected $fillable = [
        'id_surat_usaha',
        'nama_usaha',
        'bentuk_usaha',
        'bidang_usaha',
        'modal_usaha',
        'jumlah_karyawan',
        'alamat_usaha',
    ];

    /**
     * Definisikan relasi dengan model SuratUsaha
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function suratUsaha()
    {
        return $this->belongsTo(SuratUsaha::class);
    }
}
