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
        // Ensure the storage directory exists
        if (!Storage::exists('public/dokumens')) {
            Storage::makeDirectory('public/dokumens');
        }

        // Create dummy PDF files in storage for seeding
        $dummyPdfPath = 'public/dokumens/dummy.pdf';
        if (!Storage::exists($dummyPdfPath)) {
            Storage::put($dummyPdfPath, '%PDF-1.4\n% Dummy PDF content for testing purposes.\n');
        }

        // Seed sample data
        $data = [
            [
                'file_pdf' => 'dokumens/dummy.pdf',
                'data_pendukung1' => 'Supporting Data 1',
                'data_pendukung2' => 'Supporting Data 2',
                'data_pendukung3' => 'Supporting Data 3',
                'data_pendukung4' => 'Supporting Data 4',
                'data_pendukung5' => 'Supporting Data 5',
            ],
            [
                'file_pdf' => 'dokumens/dummy.pdf',
                'data_pendukung1' => 'Another Supporting Data 1',
                'data_pendukung2' => 'Another Supporting Data 2',
                'data_pendukung3' => null,
                'data_pendukung4' => null,
                'data_pendukung5' => 'Final Supporting Data 5',
            ],
        ];

        foreach ($data as $item) {
            Dokumen::create($item);
        }
    }
}
