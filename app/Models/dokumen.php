<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Dokumen extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'jenis_dokumen',
        'file_pdf',
        'data_pendukung1',
        'data_pendukung2',
        'data_pendukung3',
        'data_pendukung4',
        'data_pendukung5',
        'data_pendukung6',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'file_pdf' => 'string',
    ];

    /**
     * Menyimpan file PDF ke dalam storage/public.
     */
    public static function storeFile($file)
    {
        if ($file) {
            // Menyimpan file ke storage/app/public dan mengembalikan path file
            return $file->store('dokumen', 'public');
        }
        return null;
    }
}
