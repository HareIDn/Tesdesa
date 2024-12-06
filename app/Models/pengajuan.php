<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'pilih_tujuan',
        'jenis_pengajuan',
        'status',
        'deskripsi',
        'tanggal_pengajuan',
        'tanggal_diproses',
        'keterangan'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tanggal_pengajuan' => 'datetime',
        'tanggal_diproses' => 'datetime'
    ];

    /**
     * The default attributes.
     *
     * @var array<string, mixed>
     */
    protected $attributes = [
        'status' => 'diterima'
    ];

    /**
     * Get the user that owns the pengajuan.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
} 
