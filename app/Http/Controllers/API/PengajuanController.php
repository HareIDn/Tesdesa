<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PengajuanController extends Controller
{
    /**
     * Menampilkan daftar pengajuan.
     */
    public function index(Request $request)
    {
        try {
            // Ambil ID pengguna yang sedang login
            $userId = $request->user()->id;

            // Filter data pengajuan berdasarkan ID pengguna
            $pengajuan = Pengajuan::where('user_id', $userId)->get();

            // Kembalikan data pengajuan sebagai respons JSON
            return response()->json([
                'message' => 'Data pengajuan berhasil diambil',
                'data' => $pengajuan
            ], 200);
        } catch (\Exception $e) {
            // Tangani error
            return response()->json([
                'message' => 'Gagal mengambil data pengajuan',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function indexUser(Request $request)
        {
            try {
                // Ambil pengguna yang sedang login
                $user = $request->user();

                // Periksa apakah pengguna memiliki role "Admin Level 3"
                if (!$user->hasRole('super_admin')) {
                    return response()->json([
                        'message' => 'Anda tidak memiliki akses untuk data ini',
                    ], 403);
                }

                // Ambil data pengajuan yang terkait dengan pengguna ber-role "Role ID 1" atau "Role ID 2"
                $pengajuan = Pengajuan::whereHas('user.roles', function ($query) {
                    $query->whereIn('id', [1]);
                })->get();

                // Kembalikan data pengajuan
                return response()->json([
                    'message' => 'Data pengajuan berhasil diambil',
                    'data' => $pengajuan
                ], 200);
            } catch (\Exception $e) {
                // Tangani error
                return response()->json([
                    'message' => 'Gagal mengambil data pengajuan',
                    'error' => $e->getMessage()
                ], 500);
            }
        }
        public function indexAdmin(Request $request)
        {
            try {
                // Ambil pengguna yang sedang login
                $user = $request->user();

                // Periksa apakah pengguna memiliki role "Admin Level 3"
                if (!$user->hasRole('super_admin')) {
                    return response()->json([
                        'message' => 'Anda tidak memiliki akses untuk data ini',
                    ], 403);
                }

                // Ambil data pengajuan yang terkait dengan pengguna ber-role "Role ID 1" atau "Role ID 2"
                $pengajuan = Pengajuan::whereHas('user.roles', function ($query) {
                    $query->whereIn('id', [2]);
                })->get();

                // Kembalikan data pengajuan
                return response()->json([
                    'message' => 'Data pengajuan berhasil diambil',
                    'data' => $pengajuan
                ], 200);
            } catch (\Exception $e) {
                // Tangani error
                return response()->json([
                    'message' => 'Gagal mengambil data pengajuan',
                    'error' => $e->getMessage()
                ], 500);
            }
        }


    public function indexAll(Request $request)
    {
        try {
            // Ambil ID pengguna yang sedang login
            $userId = $request->user()->id;

            // Filter data pengajuan berdasarkan ID pengguna
            $pengajuan = Pengajuan::all();

            // Kembalikan data pengajuan sebagai respons JSON
            return response()->json([
                'message' => 'Data pengajuan berhasil diambil',
                'data' => $pengajuan
            ], 200);
        } catch (\Exception $e) {
            // Tangani error
            return response()->json([
                'message' => 'Gagal mengambil data pengajuan',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Menambahkan pengajuan baru.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'pilih_tujuan' => 'required|string',
            'jenis_pengajuan' => 'required|string',
            'status' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'tanggal_pengajuan' => 'required|date',
            'tanggal_diproses' => 'nullable|date',
            'keterangan' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Data yang dimasukkan tidak valid',
                'errors' => $validator->errors()
            ], 400);
        }

        try {
            // Menambahkan pengajuan baru
            $pengajuan = Pengajuan::create($request->all());
            return response()->json([
                'message' => 'Pengajuan berhasil ditambahkan',
                'data' => $pengajuan
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal menambahkan pengajuan',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Menampilkan pengajuan berdasarkan ID.
     */
    public function show($id)
    {
        try {
            $pengajuan = Pengajuan::findOrFail($id); // Menampilkan pengajuan berdasarkan ID
            return response()->json([
                'message' => 'Data pengajuan ditemukan',
                'data' => $pengajuan
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Pengajuan tidak ditemukan',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Memperbarui pengajuan berdasarkan ID.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'pilih_tujuan' => 'required|string',
            'jenis_pengajuan' => 'required|string',
            'status' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'tanggal_pengajuan' => 'required|date',
            'tanggal_diproses' => 'nullable|date',
            'keterangan' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Data yang dimasukkan tidak valid',
                'errors' => $validator->errors()
            ], 400);
        }

        try {
            $pengajuan = Pengajuan::findOrFail($id); // Mencari pengajuan berdasarkan ID
            $pengajuan->update($request->all()); // Memperbarui pengajuan
            return response()->json([
                'message' => 'Pengajuan berhasil diperbarui',
                'data' => $pengajuan
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal memperbarui pengajuan',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Menghapus pengajuan berdasarkan ID.
     */
    public function destroy($id)
    {
        try {
            $pengajuan = Pengajuan::findOrFail($id); // Mencari pengajuan berdasarkan ID
            $pengajuan->delete(); // Menghapus pengajuan
            return response()->json([
                'message' => 'Pengajuan berhasil dihapus'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal menghapus pengajuan',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
