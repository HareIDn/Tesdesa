<?php


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Spatie\Permission\Traits\HasRoles; // Pastikan ini ada

class User extends Authenticatable
{
    use  Notifiable, HasRoles; // Pastikan ini ada

    protected $fillable = [
        'nama_lengkap',
        'email',
        'password',
        'NIK',
        'tanggal_lahir',
        'tempat_lahir',
        'agama',
        'pekerjaan',
        'alamat_lengkap',
        'rt_rw',
        'kecamatan',
        'kelurahan',
        'kabupaten',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
