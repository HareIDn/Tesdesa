<?php

namespace App\Http\Controllers\API;

use App\Models\Domisili;
use App\Models\Pengajuan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DomisiliController extends Controller
{
    /**
     * Menyimpan data Pengajuan dan data Domisili sekaligus.
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
            'nik' => 'required|numeric|',
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
        $pengajuan->pilih_tujuan = "Surat Keterangan Domisili";
        $pengajuan->jenis_pengajuan = "Pengajuan Baru";
        $pengajuan->status = "diterima";
        $pengajuan->deskripsi = "belum ada";
        $pengajuan->tanggal_pengajuan = $request->tanggal_pengajuan;
        $pengajuan->tanggal_diproses = $request->tanggal_diproses;
        $pengajuan->keterangan = $request->keterangan;
        $pengajuan->save();

        // Menyimpan data Domisili yang terkait dengan Pengajuan yang baru dibuat
        $domisili = new Domisili();
        $domisili->pengajuan_id = $pengajuan->id;
        $domisili->nama_lengkap = $request->nama_lengkap;
        $domisili->nik = $request->nik;
        $domisili->tempat = $request->tempat;
        $domisili->tanggal_lahir = $request->tanggal_lahir;
        $domisili->jenis_kelamin = $request->jenis_kelamin;
        $domisili->agama = $request->agama;
        $domisili->pekerjaan = $request->pekerjaan;
        $domisili->telepon = $request->telepon;
        $domisili->alamat_lengkap = $request->alamat_lengkap;
        $domisili->rt = $request->rt;
        $domisili->rw = $request->rw;
        $domisili->kelurahan = $request->kelurahan;
        $domisili->kecamatan = $request->kecamatan;
        $domisili->kabupaten = $request->kabupaten;
        $domisili->save();

        return response()->json([
            'message' => 'Pengajuan dan Surat Keterangan Domisili berhasil dibuat.',
            'pengajuan' => $pengajuan,
            'domisili' => $domisili
        ], 201);
    }

    /**
     * Menampilkan daftar Pengajuan dan Domisili.
     */
    public function index()
    {
        $domisilis = Domisili::all();  // Menampilkan semua data Domisili
        return response()->json([
            'message' => 'Daftar Domisili',
            'data' => $domisilis
        ], 200);
    }
    /**
     * Menampilkan detail Pengajuan dan Domisili berdasarkan ID.
     */
    public function show($id)
    {
        $domisili = Domisili::find($id);  // Menampilkan Domisili berdasarkan ID

        if (!$domisili) {
            return response()->json([
                'message' => 'Domisili tidak ditemukan.'
            ], 404);
        }

        return response()->json([
            'message' => 'Detail Domisili',
            'data' => $domisili
        ], 200);
    }

    /**
     * Mengupdate data Pengajuan dan Domisili.
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

        $domisili = $pengajuan->domisili; // Ambil Domisili terkait
        // Update Domisili
        $domisili->update([
            'nama_lengkap' => $request->nama_lengkap ?? $domisili->nama_lengkap,
            'nik' => $request->nik ?? $domisili->nik,
            'tempat' => $request->tempat ?? $domisili->tempat,
            'tanggal_lahir' => $request->tanggal_lahir ?? $domisili->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin ?? $domisili->jenis_kelamin,
            'agama' => $request->agama ?? $domisili->agama,
            'pekerjaan' => $request->pekerjaan ?? $domisili->pekerjaan,
            'telepon' => $request->telepon ?? $domisili->telepon,
            'alamat_lengkap' => $request->alamat_lengkap ?? $domisili->alamat_lengkap,
            'rt' => $request->rt ?? $domisili->rt,
            'rw' => $request->rw ?? $domisili->rw,
            'kelurahan' => $request->kelurahan ?? $domisili->kelurahan,
            'kecamatan' => $request->kecamatan ?? $domisili->kecamatan,
            'kabupaten' => $request->kabupaten ?? $domisili->kabupaten,
        ]);

        return response()->json([
            'message' => 'Pengajuan dan Surat Keterangan Domisili berhasil diperbarui.',
            'pengajuan' => $pengajuan,
            'domisili' => $domisili
        ], 200);
    }

    /**
     * Menghapus data Pengajuan dan Domisili.
     */
    public function destroy($id)
    {
        $pengajuan = Pengajuan::find($id);

        if (!$pengajuan) {
            return response()->json([
                'message' => 'Pengajuan tidak ditemukan.'
            ], 404);
        }

        // Hapus Domisili terkait
        $pengajuan->domisili->delete();
        // Hapus Pengajuan
        $pengajuan->delete();

        return response()->json([
            'message' => 'Pengajuan dan Surat Keterangan Domisili berhasil dihapus.'
        ], 200);
    }
}
