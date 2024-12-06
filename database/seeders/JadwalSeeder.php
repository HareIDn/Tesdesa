<?php

namespace Database\Seeders;

use App\Models\Jadwal;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jadwal::create([
            'pengajuan_id' => 1,
            'jadwal' => 'Senin',
            'keterangan' => 'Jadwal pertama',
            'status' => 'dijadwalkan',
        ]);

        Jadwal::create([
            'pengajuan_id' => 2,
            'jadwal' => 'Selasa',
            'keterangan' => 'Jadwal kedua',
            'status' => 'selesai',
        ]);
        Jadwal::create([
            'pengajuan_id' => 3,
            'jadwal' => 'Selasa',
            'keterangan' => 'Jadwal kedua',
            'status' => 'selesai',
        ]);
        Jadwal::create([
            'pengajuan_id' => 4,
            'jadwal' => 'Selasa',
            'keterangan' => 'Jadwal kedua',
            'status' => 'selesai',
        ]);
    }
}
