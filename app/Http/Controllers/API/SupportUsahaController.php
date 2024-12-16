<?php

namespace App\Http\Controllers\API;

use App\Models\SupportUsaha;
use App\Models\SuratUsaha;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupportUsahaController extends Controller
{
    /**
     * Menampilkan daftar semua SupportUsaha.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Ambil semua data SupportUsaha dengan relasi suratUsaha
        $supportUsahas = SupportUsaha::with('suratUsaha')->get();

        return response()->json([
            'success' => true,
            'message' => "Daftar Data Pendukung Usaha",
            'data' => $supportUsahas
        ]);
    }

    /**
     * Menampilkan detail dari SupportUsaha tertentu.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Ambil data SupportUsaha berdasarkan ID
        $supportUsaha = SupportUsaha::with('suratUsaha')->find($id);

        if (!$supportUsaha) {
            return response()->json([
                'success' => false,
                'message' => 'SupportUsaha tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $supportUsaha
        ]);
    }

    /**
     * Menyimpan data SupportUsaha baru ke dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_surat_usaha' => 'required|exists:surat_usahas,id',
            'nama_usaha' => 'required|string|max:255',
            'bentuk_usaha' => 'required|string|max:255',
            'bidang_usaha' => 'required|string|max:255',
            'modal_usaha' => 'required|numeric',
            'jumlah_karyawan' => 'required|integer',
            'alamat_usaha' => 'required|string',
        ]);

        // Simpan data SupportUsaha baru
        $supportUsaha = SupportUsaha::create($request->all());

        return response()->json([
            'success' => true,
            'message' => "Daftar Data Pendukung Usaha",
            'data' => $supportUsaha
        ], 201);
    }

    /**
     * Mengupdate data SupportUsaha tertentu.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'id_surat_usaha' => 'required|exists:surat_usahas,id',
            'nama_usaha' => 'required|string|max:255',
            'bentuk_usaha' => 'required|string|max:255',
            'bidang_usaha' => 'required|string|max:255',
            'modal_usaha' => 'required|numeric',
            'jumlah_karyawan' => 'required|integer',
            'alamat_usaha' => 'required|string',
        ]);
 
        // Cari data SupportUsaha berdasarkan ID
        $supportUsaha = SupportUsaha::find($id);

        if (!$supportUsaha) {
            return response()->json([
                'success' => false,
                'message' => 'SupportUsaha tidak ditemukan'
            ], 404);
        }

        // Update data SupportUsaha
        $supportUsaha->update($request->all());

        return response()->json([
            'success' => true,
            'data' => $supportUsaha
        ]);
    }

    /**
     * Menghapus data SupportUsaha tertentu.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Cari data SupportUsaha berdasarkan ID
        $supportUsaha = SupportUsaha::find($id);

        if (!$supportUsaha) {
            return response()->json([
                'success' => false,
                'message' => 'SupportUsaha tidak ditemukan'
            ], 404);
        }

        // Hapus data SupportUsaha
        $supportUsaha->delete();

        return response()->json([
            'success' => true,
            'message' => 'SupportUsaha berhasil dihapus'
        ]);
    }
}
