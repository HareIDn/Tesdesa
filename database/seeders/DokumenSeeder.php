<?php

namespace Database\Seeders;

use App\Models\Dokumen;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DokumenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dokumen::created([
            'jenis_dokumen' => 'Surat Pengantar',
            'file_pdf' => "dummy.pdf",
            'data_pendukung1' => 'Supporting Data 1',
            'data_pendukung2' => 'Supporting Data 2',
            'data_pendukung3' => 'Supporting Data 3',
            'data_pendukung4' => 'Supporting Data 4',
            'data_pendukung5' => 'Supporting Data 5',
        ]);
       }
}
