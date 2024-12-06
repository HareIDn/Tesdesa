<?php

namespace App\Http\Controllers\API;

use App\Models\Jadwal;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class JadwalController extends Controller
{
    /**
     * Menampilkan daftar jadwal.
     */
    public function index()
    {
        try {
            $jadwals = Jadwal::all(); // Menampilkan semua jadwal
            return response()->json([
                'message' => 'Data jadwal berhasil diambil',
                'data' => $jadwals
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal mengambil data jadwal',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Menambahkan jadwal baru.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'pengajuan_id' => 'required|exists:pengajuans,id', // Pengajuan yang terkait
            'jadwal' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu', // Hari yang valid
            'keterangan' => 'nullable|string',
            'status' => 'nullable|in:dijadwalkan,selesai,dibatalkan', // Status jadwal yang valid
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Data yang dimasukkan tidak valid',
                'errors' => $validator->errors()
            ], 400);
        }

        try {
            // Menambahkan jadwal baru
            $jadwal = Jadwal::create([
                'pengajuan_id' => $request->pengajuan_id,
                'jadwal' => $request->jadwal,
                'keterangan' => $request->keterangan,
                'status' => $request->status ?? 'dijadwalkan', // Default status 'dijadwalkan'
            ]);
            return response()->json([
                'message' => 'Jadwal berhasil ditambahkan',
                'data' => $jadwal
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal menambahkan jadwal',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Menampilkan jadwal berdasarkan ID.
     */
    public function show($id)
    {
        try {
            $jadwal = Jadwal::findOrFail($id); // Menampilkan jadwal berdasarkan ID
            return response()->json([
                'message' => 'Data jadwal ditemukan',
                'data' => $jadwal
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Jadwal tidak ditemukan',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Memperbarui jadwal berdasarkan ID.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'pengajuan_id' => 'required|exists:pengajuans,id',
            'jadwal' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu',
            'keterangan' => 'nullable|string',
            'status' => 'nullable|in:dijadwalkan,selesai,dibatalkan',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Data yang dimasukkan tidak valid',
                'errors' => $validator->errors()
            ], 400);
        }

        try {
            $jadwal = Jadwal::findOrFail($id); // Mencari jadwal berdasarkan ID
            $jadwal->update([
                'pengajuan_id' => $request->pengajuan_id,
                'jadwal' => $request->jadwal,
                'keterangan' => $request->keterangan,
                'status' => $request->status ?? 'dijadwalkan', // Default status 'dijadwalkan'
            ]);
            return response()->json([
                'message' => 'Jadwal berhasil diperbarui',
                'data' => $jadwal
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal memperbarui jadwal',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Menghapus jadwal berdasarkan ID.
     */
    public function destroy($id)
    {
        try {
            $jadwal = Jadwal::findOrFail($id); // Mencari jadwal berdasarkan ID
            $jadwal->delete(); // Menghapus jadwal
            return response()->json([
                'message' => 'Jadwal berhasil dihapus'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal menghapus jadwal',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
