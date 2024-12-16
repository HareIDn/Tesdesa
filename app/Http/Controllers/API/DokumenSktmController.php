<?php

namespace App\Http\Controllers\API;

use App\Models\DokumenSktm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DokumenSktmController extends Controller
{
    /**
     * Menyimpan dokumen pendukung (PDF) untuk SKTM.
     */
    public function store(Request $request)
    {
        // Validasi untuk memastikan file PDF ada
        $request->validate([
            'dokumen_pendukung' => 'required|file|mimes:pdf|max:20480', // Maksimal 20 MB
        ]);

        // Ambil file PDF yang di-upload
        $file = $request->file('dokumen_pendukung');

        // Generate nama file baru
        $filename = 'dokumen_' . time() . '.' . $file->getClientOriginalExtension();

        // Tentukan path tempat menyimpan file
        $filePath = 'dokumen_sktm/' . $filename;

        // Simpan file ke disk public
        $file->storeAs('public/' . $filePath);

        // Simpan data dokumen di database
        $dokumenSktm = new DokumenSktm();
        $dokumenSktm->sktm_id = $request->input('sktm_id'); // Misal ini adalah ID SKTM terkait
        $dokumenSktm->pilih_tujuan = $request->input('pilih_tujuan');
        $dokumenSktm->keterangan = $request->input('keterangan');
        $dokumenSktm->dokumen_pendukung = $filePath; // Menyimpan path file
        $dokumenSktm->save();

        // Kembalikan respons dengan URL file yang sudah di-upload
        return response()->json([
            'message' => 'Dokumen berhasil di-upload',
            'dokumen_url' => Storage::url($dokumenSktm->dokumen_pendukung),
        ], 200);
    }

    /**
     * Menampilkan daftar dokumen SKTM.
     */
    public function index()
    {
        // Ambil semua dokumen SKTM dari database
        $dokumenSktms = DokumenSktm::all();

        // Jika tidak ada data, return message
        if ($dokumenSktms->isEmpty()) {
            return response()->json([
                'message' => 'Tidak ada dokumen SKTM ditemukan.',
            ], 404);
        }

        // Return data dokumen SKTM
        return response()->json([
            'message' => 'Daftar dokumen SKTM',
            'data' => $dokumenSktms,
        ], 200);
    }
}
