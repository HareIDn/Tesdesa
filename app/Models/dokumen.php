<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_pdf',
        'data_pendukung1',
        'data_pendukung2',
        'data_pendukung3',
        'data_pendukung4',
        'data_pendukung5',
    ];
}
