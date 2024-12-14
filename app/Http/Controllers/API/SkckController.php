<?php

namespace App\Http\Controllers\API;

use App\Models\Skck;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SkckController extends Controller
{
    /**
     * Menyimpan data Pengajuan dan data SKCK sekaligus.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'pilih_tujuan' => 'required|string',
            'jenis_pengajuan' => 'required|string',
            'status' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'tanggal_pengajuan' => 'nullable|date',
            'tanggal_diproses' => 'nullable|date',
            'keterangan' => 'nullable|string',

            // Validasi data SKCK
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|numeric',
            'tempat' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|max:10',
            'agama' => 'required|string|max:20',
            'pekerjaan' => 'required|string|max:100',
            'alamat_lengkap' => 'required|string|max:255',
        ]);

        // Menyimpan data Pengajuan
        $pengajuan = new Pengajuan();
        $pengajuan->user_id = $request->user_id;
        $pengajuan->pilih_tujuan = "Surat Keterangan SKCK";
        $pengajuan->jenis_pengajuan = "Pengajuan Baru";
        $pengajuan->status = "diterima";
        $pengajuan->deskripsi = "belum ada";
        $pengajuan->tanggal_pengajuan = $request->tanggal_pengajuan;
        $pengajuan->tanggal_diproses = $request->tanggal_diproses;
        $pengajuan->keterangan = $request->keterangan;
        $pengajuan->save();

        // Menyimpan data SKCK yang terkait dengan Pengajuan yang baru dibuat
        $skck = new Skck();
        $skck->pengajuan_id = $pengajuan->id;
        $skck->nama_lengkap = $request->nama_lengkap;
        $skck->nik = $request->nik;
        $skck->tempat = $request->tempat;
        $skck->tanggal_lahir = $request->tanggal_lahir;
        $skck->jenis_kelamin = $request->jenis_kelamin;
        $skck->agama = $request->agama;
        $skck->pekerjaan = $request->pekerjaan;
        $skck->alamat_lengkap = $request->alamat_lengkap;
        $skck->save();

        return response()->json([
            'message' => 'Pengajuan dan SKCK berhasil dibuat.',
            'pengajuan' => $pengajuan,
            'skck' => $skck
        ], 201);
    }

    /**
     * Menampilkan daftar SKCK.
     */
    public function index()
    {
        $skcks = Skck::all();  // Menampilkan semua data SKCK
        return response()->json([
            'message' => 'Daftar SKCK',
            'data' => $skcks
        ], 200);
    }

    /**
     * Menampilkan detail SKCK berdasarkan ID.
     */
    public function show($id)
    {
        $skck = Skck::find($id);  // Menampilkan SKCK berdasarkan ID

        if (!$skck) {
            return response()->json([
                'message' => 'SKCK tidak ditemukan.'
            ], 404);
        }

        return response()->json([
            'message' => 'Detail SKCK',
            'data' => $skck
        ], 200);
    }

    /**
     * Mengupdate data Pengajuan dan SKCK.
     */
    public function update(Request $request, $id)
    {
        $pengajuan = Pengajuan::find($id);

        if (!$pengajuan) {
            return response()->json([
                'message' => 'Pengajuan tidak ditemukan.'
            ], 404);
        }

        // Update Pengajuan
        $pengajuan->update([
            'user_id' => $request->user_id ?? $pengajuan->user_id,
            'pilih_tujuan' => $request->pilih_tujuan ?? $pengajuan->pilih_tujuan,
            'jenis_pengajuan' => $request->jenis_pengajuan ?? $pengajuan->jenis_pengajuan,
            'status' => $request->status ?? $pengajuan->status,
            'deskripsi' => $request->deskripsi ?? $pengajuan->deskripsi,
            'tanggal_pengajuan' => $request->tanggal_pengajuan ?? $pengajuan->tanggal_pengajuan,
            'tanggal_diproses' => $request->tanggal_diproses ?? $pengajuan->tanggal_diproses,
            'keterangan' => $request->keterangan ?? $pengajuan->keterangan,
        ]);

        $skck = $pengajuan->skck; // Ambil SKCK terkait
        // Update SKCK
        $skck->update([
            'nama_lengkap' => $request->nama_lengkap ?? $skck->nama_lengkap,
            'nik' => $request->nik ?? $skck->nik,
            'tempat' => $request->tempat ?? $skck->tempat,
            'tanggal_lahir' => $request->tanggal_lahir ?? $skck->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin ?? $skck->jenis_kelamin,
            'agama' => $request->agama ?? $skck->agama,
            'pekerjaan' => $request->pekerjaan ?? $skck->pekerjaan,
            'alamat_lengkap' => $request->alamat_lengkap ?? $skck->alamat_lengkap,
        ]);

        return response()->json([
            'message' => 'Pengajuan dan SKCK berhasil diperbarui.',
            'pengajuan' => $pengajuan,
            'skck' => $skck
        ], 200);
    }

    /**
     * Menghapus data Pengajuan dan SKCK.
     */
    public function destroy($id)
    {
        $pengajuan = Pengajuan::find($id);

        if (!$pengajuan) {
            return response()->json([
                'message' => 'Pengajuan tidak ditemukan.'
            ], 404);
        }

        // Hapus SKCK terkait
        $pengajuan->skck->delete();
        // Hapus Pengajuan
        $pengajuan->delete();

        return response()->json([
            'message' => 'Pengajuan dan SKCK berhasil dihapus.'
        ], 200);
    }
}
