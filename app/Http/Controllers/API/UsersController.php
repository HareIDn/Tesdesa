<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    /**
     * Menampilkan semua pengguna.
     */
    public function index()
    {
        try {
            $users = User::all(); // Mengambil semua pengguna
            return response()->json([
                'message' => 'Data pengguna berhasil diambil',
                'data' => $users,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan saat mengambil data pengguna',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Menambahkan pengguna baru.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:255',
            'agama' => 'required|string|max:255',
            'pekerjaan' => 'nullable|string|max:255',
            'alamat_lengkap' => 'required|string',
            'rt' => 'required|string',
            'rw' => 'required|string',
            'kecamatan' => 'required|string|max:255',
            'kelurahan' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:255',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Data yang dimasukkan tidak valid',
                'errors' => $validator->errors(),
            ], 400);
        }

        try {
            $user = User::create([
                'nama_lengkap' => $request->nama_lengkap,
                'nik' => $request->nik,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'tanggal_lahir' => $request->tanggal_lahir,
                'tempat_lahir' => $request->tempat_lahir,
                'agama' => $request->agama,
                'pekerjaan' => $request->pekerjaan,
                'alamat_lengkap' => $request->alamat_lengkap,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'kecamatan' => $request->kecamatan,
                'kelurahan' => $request->kelurahan,
                'kabupaten' => $request->kabupaten,
            ]);

            return response()->json([
                'message' => 'Pengguna berhasil ditambahkan',
                'data' => $user,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan saat menambahkan pengguna',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Menampilkan pengguna berdasarkan ID.
     */
    public function show($id)
    {
        try {
            $user = User::findOrFail($id); // Mencari pengguna berdasarkan ID
            return response()->json([
                'message' => 'Data pengguna berhasil ditemukan',
                'data' => $user,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Pengguna tidak ditemukan',
                'error' => $e->getMessage(),
            ], 404);
        }
    }

    /**
     * Memperbarui data pengguna.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'nullable|string|max:255',
            'nik' => 'nullable|string|max:255|unique:users,nik,' . $id,
            'email' => 'nullable|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
            'tanggal_lahir' => 'nullable|date',
            'tempat_lahir' => 'nullable|string|max:255',
            'agama' => 'nullable|string|max:255',
            'pekerjaan' => 'nullable|string|max:255',
            'alamat_lengkap' => 'nullable|string',
            'rt' => 'nullable|string',
            'rw' => 'nullable|string',
            'kecamatan' => 'nullable|string|max:255',
            'kelurahan' => 'nullable|string|max:255',
            'kabupaten' => 'nullable|string|max:255',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Data yang dimasukkan tidak valid',
                'errors' => $validator->errors(),
            ], 400);
        }

        try {
            $user = User::findOrFail($id); // Mencari pengguna berdasarkan ID

            // Update data pengguna
            $user->update($request->only([
                'nama_lengkap',
                'nik',
                'email',
                'password',
                'tanggal_lahir',
                'tempat_lahir',
                'agama',
                'pekerjaan',
                'alamat_lengkap',
                'rt',
                'rw',
                'kecamatan',
                'kelurahan',
                'kabupaten',
            ]));

            if ($request->has('password')) {
                $user->password = Hash::make($request->password);
                $user->save();
            }

            return response()->json([
                'message' => 'Pengguna berhasil diperbarui',
                'data' => $user,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan saat memperbarui pengguna',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Menghapus pengguna.
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id); // Mencari pengguna berdasarkan ID
            $user->delete();

            return response()->json([
                'message' => 'Pengguna berhasil dihapus',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan saat menghapus pengguna',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
