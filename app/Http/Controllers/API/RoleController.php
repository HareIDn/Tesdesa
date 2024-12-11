<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    // Fungsi untuk mencari pengguna berdasarkan role
    public function getUsersByRole($roleName)
    {
        // Cek apakah role ada di database
        $role = Role::where('name', $roleName)->first();

        if (!$role) {
            return response()->json(['message' => 'Role not found'], 404);
        }

        // Ambil semua pengguna yang memiliki role tersebut
        $users = User::role($roleName)->get();

        return response()->json($users);
    }

    public function updateUserRole(Request $request, $userId)
    {
        // Validasi input untuk memastikan role_id yang diberikan ada di database
        $request->validate([
            'role_id' => 'required|exists:roles,id', // Pastikan role_id yang diberikan ada di tabel roles
        ]);

        // Cari pengguna berdasarkan ID
        $user = User::find($userId);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Ambil role baru berdasarkan role_id
        $role = Role::find($request->role_id);

        if (!$role) {
            return response()->json(['message' => 'Role not found'], 404);
        }

        // Menggunakan syncRoles untuk mengganti semua role yang ada pada pengguna
        $user->syncRoles([$role->name]);

        return response()->json([
            'message' => 'Role updated successfully',
            'user' => $user,
            'new_role' => $role->name
        ]);
    }
}
