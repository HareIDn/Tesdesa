<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Container\Attributes\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
    public function update(Request $request, string $id)
    {
        try {
            // Ambil pengguna berdasarkan ID
            $user = User::findOrFail($id);

            // Validasi data yang diterima
            $validatedData = $request->validate([
                'nama_lengkap' => 'nullable|string|max:255',
                'nik' => 'nullable|string|max:255|unique:users,nik,' . $id,
                'email' => 'nullable|email|unique:users,email,' . $id,
                'password' => 'nullable|string|min:8|confirmed', // password update with confirmation
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

            // Update hanya field yang ada di dalam request
            if ($request->has('nama_lengkap')) {
                $user->nama_lengkap = $validatedData['nama_lengkap'];
            }
            if ($request->has('nik')) {
                $user->nik = $validatedData['nik'];
            }
            if ($request->has('email')) {
                $user->email = $validatedData['email'];
            }
            if ($request->has('tanggal_lahir')) {
                $user->tanggal_lahir = $validatedData['tanggal_lahir'];
            }
            if ($request->has('tempat_lahir')) {
                $user->tempat_lahir = $validatedData['tempat_lahir'];
            }
            if ($request->has('agama')) {
                $user->agama = $validatedData['agama'];
            }
            if ($request->has('pekerjaan')) {
                $user->pekerjaan = $validatedData['pekerjaan'];
            }
            if ($request->has('alamat_lengkap')) {
                $user->alamat_lengkap = $validatedData['alamat_lengkap'];
            }
            if ($request->has('rt')) {
                $user->rt = $validatedData['rt'];
            }
            if ($request->has('rw')) {
                $user->rw = $validatedData['rw'];
            }
            if ($request->has('kecamatan')) {
                $user->kecamatan = $validatedData['kecamatan'];
            }
            if ($request->has('kelurahan')) {
                $user->kelurahan = $validatedData['kelurahan'];
            }
            if ($request->has('kabupaten')) {
                $user->kabupaten = $validatedData['kabupaten'];
            }

            // Jika password diberikan, kita hash dan update password
            if ($request->has('password')) {
                $user->password = Hash::make($validatedData['password']);
            }

            // Simpan perubahan
            $user->save();

            // Mengembalikan response sukses
            return response()->json([
                'message' => 'User updated successfully',
                'data' => $user,
            ], 200);

        } catch (\Exception $e) {
            // Jika terjadi kesalahan, kembalikan error
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
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
