<?php

namespace Database\Seeders;

use App\Models\Pengajuan;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PengajuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat 5 data pengajuan secara manual
        Pengajuan::create([
            'user_id' => 1, // Menggunakan user_id yang sesuai, pastikan data user ada
            'pilih_tujuan' => 'SKCK',
            'jenis_pengajuan' => 'Pengajuan Baru',
            'status' => 'diterima',
            'deskripsi' => 'Pengajuan baru untuk SKCK',
            'tanggal_pengajuan' => Carbon::now(),
            'tanggal_diproses' => Carbon::now(),
            'keterangan' => 'Keterangan pengajuan baru SKCK'
        ]);

        Pengajuan::create([
            'user_id' => 2,
            'pilih_tujuan' => 'SKTM',
            'jenis_pengajuan' => 'Pengajuan Baru',
            'status' => 'diterima',
            'deskripsi' => 'Pengajuan baru untuk SKTM',
            'tanggal_pengajuan' => Carbon::now(),
            'tanggal_diproses' => Carbon::now(),
            'keterangan' => 'Keterangan pengajuan baru SKTM'
        ]);

        Pengajuan::create([
            'user_id' => 3,
            'pilih_tujuan' => 'Pindah domisili',
            'jenis_pengajuan' => 'Pengajuan Baru',
            'status' => 'diterima',
            'deskripsi' => 'Pengajuan baru untuk Pindah domisili',
            'tanggal_pengajuan' => Carbon::now(),
            'tanggal_diproses' => Carbon::now(),
            'keterangan' => 'Keterangan pengajuan baru Pindah domisili'
        ]);

        Pengajuan::create([
            'user_id' => 4,
            'pilih_tujuan' => 'SKCK',
            'jenis_pengajuan' => 'Pengajuan Perpanjangan',
            'status' => 'diterima',
            'deskripsi' => 'Pengajuan perpanjangan untuk SKCK',
            'tanggal_pengajuan' => Carbon::now(),
            'tanggal_diproses' => Carbon::now(),
            'keterangan' => 'Keterangan pengajuan perpanjangan SKCK'
        ]);

        Pengajuan::create([
            'user_id' => 1,
            'pilih_tujuan' => 'SKTM',
            'jenis_pengajuan' => 'Pengajuan Perpanjangan',
            'status' => 'diterima',
            'deskripsi' => 'Pengajuan perpanjangan untuk SKTM',
            'tanggal_pengajuan' => Carbon::now(),
            'tanggal_diproses' => Carbon::now(),
            'keterangan' => 'Keterangan pengajuan perpanjangan SKTM'
        ]);
    }
}
