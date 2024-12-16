<?php

namespace App\Http\Controllers\API;

use App\Models\Pengajuan;
use App\Models\SuratUsaha;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuratUsahaController extends Controller
{
    /**
     * Menyimpan data Pengajuan dan data Surat Usaha sekaligus.
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
            'nik' => 'required',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jabatan' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'npwp' => 'nullable|string|max:20',
            'no_telepon' => 'required|string|max:15',
            'alamat_lengkap' => 'required|string|max:255',
            'rt' => 'required|string|max:5',
            'rw' => 'required|string|max:5',
            'kecamatan' => 'required|string|max:100',
            'kelurahan' => 'required|string|max:100',
            'kabupaten' => 'required|string|max:100',
        ]);

        // Menyimpan data Pengajuan
        $pengajuan = new Pengajuan();
        $pengajuan->user_id = $request->user_id;
        $pengajuan->pilih_tujuan = "Surat Usaha";
        $pengajuan->jenis_pengajuan = "Pengajuan Baru";
        $pengajuan->status = "diterima";
        $pengajuan->deskripsi = "belum ada";
        $pengajuan->tanggal_pengajuan = $request->tanggal_pengajuan;
        $pengajuan->tanggal_diproses = $request->tanggal_diproses;
        $pengajuan->keterangan = $request->keterangan;
        $pengajuan->save();

        // Menyimpan data Surat Usaha yang terkait dengan Pengajuan yang baru dibuat
        $suratUsaha = new SuratUsaha();
        $suratUsaha->pengajuan_id = $pengajuan->id;
        $suratUsaha->nama_lengkap = $request->nama_lengkap;
        $suratUsaha->nik = $request->nik;
        $suratUsaha->tempat_lahir = $request->tempat_lahir;
        $suratUsaha->tanggal_lahir = $request->tanggal_lahir;
        $suratUsaha->jabatan = $request->jabatan;
        $suratUsaha->pekerjaan = $request->pekerjaan;
        $suratUsaha->npwp = $request->npwp;
        $suratUsaha->no_telepon = $request->no_telepon;
        $suratUsaha->alamat_lengkap = $request->alamat_lengkap;
        $suratUsaha->rt = $request->rt;
        $suratUsaha->rw = $request->rw;
        $suratUsaha->kecamatan = $request->kecamatan;
        $suratUsaha->kelurahan = $request->kelurahan;
        $suratUsaha->kabupaten = $request->kabupaten;
        $suratUsaha->save();

        return response()->json([
            'message' => 'Pengajuan dan Surat Usaha berhasil dibuat.',
            'pengajuan' => $pengajuan,
            'suratUsaha' => $suratUsaha
        ], 201);
    }

    /**
     * Menampilkan daftar Surat Usaha.
     */
    public function index()
    {
        $suratUsahas = SuratUsaha::all();
        return response()->json([
            'message' => 'Daftar Surat Usaha',
            'data' => $suratUsahas
        ], 200);
    }

    /**
     * Menampilkan detail Surat Usaha berdasarkan ID.
     */
    public function show($id)
    {
        $suratUsaha = SuratUsaha::find($id);

        if (!$suratUsaha) {
            return response()->json([
                'message' => 'Surat Usaha tidak ditemukan.'
            ], 404);
        }

        return response()->json([
            'message' => 'Detail Surat Usaha',
            'data' => $suratUsaha
        ], 200);
    }

    /**
     * Mengupdate data Pengajuan dan Surat Usaha.
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

        $suratUsaha = $pengajuan->suratUsaha;
        // Update Surat Usaha
        $suratUsaha->update([
            'nama_lengkap' => $request->nama_lengkap ?? $suratUsaha->nama_lengkap,
            'nik' => $request->nik ?? $suratUsaha->nik,
            'tempat_lahir' => $request->tempat_lahir ?? $suratUsaha->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir ?? $suratUsaha->tanggal_lahir,
            'jabatan' => $request->jabatan ?? $suratUsaha->jabatan,
            'pekerjaan' => $request->pekerjaan ?? $suratUsaha->pekerjaan,
            'npwp' => $request->npwp ?? $suratUsaha->npwp,
            'no_telepon' => $request->no_telepon ?? $suratUsaha->no_telepon,
            'alamat_lengkap' => $request->alamat_lengkap ?? $suratUsaha->alamat_lengkap,
            'rt' => $request->rt ?? $suratUsaha->rt,
            'rw' => $request->rw ?? $suratUsaha->rw,
            'kecamatan' => $request->kecamatan ?? $suratUsaha->kecamatan,
            'kelurahan' => $request->kelurahan ?? $suratUsaha->kelurahan,
            'kabupaten' => $request->kabupaten ?? $suratUsaha->kabupaten,
        ]);

        return response()->json([
            'message' => 'Pengajuan dan Surat Usaha berhasil diperbarui.',
            'pengajuan' => $pengajuan,
            'suratUsaha' => $suratUsaha
        ], 200);
    }

    /**
     * Menghapus data Pengajuan dan Surat Usaha.
     */
    public function destroy($id)
    {
        $pengajuan = Pengajuan::find($id);

        if (!$pengajuan) {
            return response()->json([
                'message' => 'Pengajuan tidak ditemukan.'
            ], 404);
        }

        // Hapus Surat Usaha terkait
        $pengajuan->suratUsaha->delete();
        // Hapus Pengajuan
        $pengajuan->delete();

        return response()->json([
            'message' => 'Pengajuan dan Surat Usaha berhasil dihapus.'
        ], 200);
    }
}
