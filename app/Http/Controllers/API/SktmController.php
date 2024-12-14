<?php

namespace App\Http\Controllers\API;

use App\Models\Pengajuan;
use App\Models\Sktm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SktmController extends Controller
{
    /**
     * Menyimpan data Pengajuan dan data Sktm sekaligus.
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

            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|numeric|unique:sktms,nik',
            'tempat' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|max:10',
            'agama' => 'required|string|max:20',
            'pekerjaan' => 'required|string|max:100',
            'telepon' => 'required|string|max:15',
            'alamat_lengkap' => 'required|string|max:255',
            'rt' => 'required|string|max:5',
            'rw' => 'required|string|max:5',
            'kelurahan' => 'required|string|max:100',
            'kecamatan' => 'required|string|max:100',
            'kabupaten' => 'required|string|max:100',
        ]);

        // Menyimpan data Pengajuan
        $pengajuan = new Pengajuan();
        $pengajuan->user_id = $request->user_id;
        $pengajuan->pilih_tujuan = "SKTM";
        $pengajuan->jenis_pengajuan = "Pengajuan Baru";
        $pengajuan->status = "diterima";
        $pengajuan->deskripsi = "belum ada";
        $pengajuan->tanggal_pengajuan = $request->tanggal_pengajuan;
        $pengajuan->tanggal_diproses = $request->tanggal_diproses;
        $pengajuan->keterangan = $request->keterangan;
        $pengajuan->save();

        // Menyimpan data Sktm yang terkait dengan Pengajuan yang baru dibuat
        $sktm = new Sktm();
        $sktm->pengajuan_id = $pengajuan->id;
        $sktm->nama_lengkap = $request->nama_lengkap;
        $sktm->nik = $request->nik;
        $sktm->tempat = $request->tempat;
        $sktm->tanggal_lahir = $request->tanggal_lahir;
        $sktm->jenis_kelamin = $request->jenis_kelamin;
        $sktm->agama = $request->agama;
        $sktm->pekerjaan = $request->pekerjaan;
        $sktm->telepon = $request->telepon;
        $sktm->alamat_lengkap = $request->alamat_lengkap;
        $sktm->rt = $request->rt;
        $sktm->rw = $request->rw;
        $sktm->kelurahan = $request->kelurahan;
        $sktm->kecamatan = $request->kecamatan;
        $sktm->kabupaten = $request->kabupaten;
        $sktm->save();

        return response()->json([
            'message' => 'Pengajuan dan SKTM berhasil dibuat.',
            'pengajuan' => $pengajuan,
            'sktm' => $sktm
        ], 201);
    }

    /**
     * Menampilkan daftar Pengajuan dan SKTM
     */
    public function index()
    {
        $pengajuans = Pengajuan::with('sktm')->get();  // Menampilkan Pengajuan beserta SKTM terkait
        return response()->json([
            'message' => 'Daftar Pengajuan dan SKTM',
            'data' => $pengajuans
        ], 200);
    }

    /**
     * Menampilkan detail Pengajuan dan SKTM berdasarkan ID.
     */
    public function show($id)
    {
        $pengajuan = Pengajuan::with('sktm')->find($id);

        if (!$pengajuan) {
            return response()->json([
                'message' => 'Pengajuan tidak ditemukan.'
            ], 404);
        }

        return response()->json([
            'message' => 'Detail Pengajuan dan SKTM',
            'data' => $pengajuan
        ], 200);
    }

    /**
     * Mengupdate data Pengajuan dan SKTM.
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

        $sktm = $pengajuan->sktm;  // Ambil SKTM terkait
        // Update SKTM
        $sktm->update([
            'nama_lengkap' => $request->nama_lengkap ?? $sktm->nama_lengkap,
            'nik' => $request->nik ?? $sktm->nik,
            'tempat' => $request->tempat ?? $sktm->tempat,
            'tanggal_lahir' => $request->tanggal_lahir ?? $sktm->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin ?? $sktm->jenis_kelamin,
            'agama' => $request->agama ?? $sktm->agama,
            'pekerjaan' => $request->pekerjaan ?? $sktm->pekerjaan,
            'telepon' => $request->telepon ?? $sktm->telepon,
            'alamat_lengkap' => $request->alamat_lengkap ?? $sktm->alamat_lengkap,
            'rt' => $request->rt ?? $sktm->rt,
            'rw' => $request->rw ?? $sktm->rw,
            'kelurahan' => $request->kelurahan ?? $sktm->kelurahan,
            'kecamatan' => $request->kecamatan ?? $sktm->kecamatan,
            'kabupaten' => $request->kabupaten ?? $sktm->kabupaten,
        ]);

        return response()->json([
            'message' => 'Pengajuan dan SKTM berhasil diperbarui.',
            'pengajuan' => $pengajuan,
            'sktm' => $sktm
        ], 200);
    }

    /**
     * Menghapus data Pengajuan dan SKTM.
     */
    public function destroy($id)
    {
        $pengajuan = Pengajuan::find($id);

        if (!$pengajuan) {
            return response()->json([
                'message' => 'Pengajuan tidak ditemukan.'
            ], 404);
        }

        // Hapus SKTM terkait
        $pengajuan->sktm->delete();
        // Hapus Pengajuan
        $pengajuan->delete();

        return response()->json([
            'message' => 'Pengajuan dan SKTM berhasil dihapus.'
        ], 200);
    }
}
