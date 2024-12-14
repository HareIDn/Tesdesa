<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

class DokumenSktm extends Model
{
    use HasFactory;

    protected $fillable = [
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

    public function sktm()
    {
        return $this->belongsTo(Sktm::class);
    }
}
