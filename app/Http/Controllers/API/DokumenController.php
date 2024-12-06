<?php

namespace App\Http\Controllers\API;

use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;  // Perbaiki import Storage

class DokumenController extends Controller
{
    /**
     * Menyimpan dokumen baru.
     */
    public function store(Request $request)
    {
        // Validasi file PDF yang diunggah
        $validated = $request->validate([
            'jenis_dokumen' => 'required|string|max:255',
            'file_pdf' => 'nullable|file|mimes:pdf|max:2048',
            'data_pendukung1' => 'nullable|string|max:255',
            'data_pendukung2' => 'nullable|string|max:255',
            'data_pendukung3' => 'nullable|string|max:255',
            'data_pendukung4' => 'nullable|string|max:255',
            'data_pendukung5' => 'nullable|string|max:255',
            'data_pendukung6' => 'nullable|string|max:255',
        ]);

        try {
            // Menyimpan file PDF ke storage dan mendapatkan path file
            $filePdfPath = Dokumen::storeFile($request->file('file_pdf'));

            // Membuat data dokumen baru
            $dokumen = Dokumen::create([
                'jenis_dokumen' => $validated['jenis_dokumen'],
                'file_pdf' => $filePdfPath, // Menyimpan path file PDF
                'data_pendukung1' => $validated['data_pendukung1'],
                'data_pendukung2' => $validated['data_pendukung2'],
                'data_pendukung3' => $validated['data_pendukung3'],
                'data_pendukung4' => $validated['data_pendukung4'],
                'data_pendukung5' => $validated['data_pendukung5'],
                'data_pendukung6' => $validated['data_pendukung6'],
            ]);

            return response()->json([
                'message' => 'Dokumen berhasil disimpan!',
                'data' => $dokumen
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal menyimpan dokumen',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Menampilkan daftar semua dokumen.
     */
    public function index()
    {
        // Ambil semua dokumen dari database
        $dokumens = Dokumen::all();
        return response()->json([
            'message' => 'Data Dokumen berhasil diambil',
            'data' => $dokumens
        ], 200);
    }

    /**
     * Menghapus dokumen berdasarkan ID.
     */
    public function destroy($id)
    {
        // Cari dokumen berdasarkan ID
        $dokumen = Dokumen::findOrFail($id);

        try {
            // Hapus file PDF dari storage
            if ($dokumen->file_pdf) {
                Storage::delete('public/' . $dokumen->file_pdf);  // Pastikan menggunakan Storage yang benar
            }

            // Hapus data dokumen dari database
            $dokumen->delete();

            return response()->json([
                'message' => 'Dokumen berhasil dihapus!',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal menghapus dokumen',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
