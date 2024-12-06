<?php

namespace Database\Seeders;

use App\Models\Notifikasi;
use Illuminate\Database\Seeder;

class NotifikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menambahkan 3 data notifikasi secara manual
        Notifikasi::create([
            'pengajuan_id' => 1, // ID pengajuan yang ada
            'judul' => 'Notifikasi untuk pengajuan SKCK',
            'deskripsi' => 'Pengajuan SKCK dengan status diterima. Keterangan: Pengajuan SKCK untuk keperluan administratif.',
            'status' => 'success'
        ]);

        Notifikasi::create([
            'pengajuan_id' => 2, // ID pengajuan yang ada
            'judul' => 'Notifikasi untuk pengajuan SKTM',
            'deskripsi' => 'Pengajuan SKTM dengan status diterima. Keterangan: Pengajuan SKTM untuk beasiswa pendidikan.',
            'status' => 'info'
        ]);

        Notifikasi::create([
            'pengajuan_id' => 3, // ID pengajuan yang ada
            'judul' => 'Notifikasi untuk pengajuan Pindah Domisili',
            'deskripsi' => 'Pengajuan Pindah Domisili dengan status ditolak. Keterangan: Pengajuan tidak memenuhi persyaratan.',
            'status' => 'error'
        ]);
    }
}
