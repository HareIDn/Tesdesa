<?php

namespace App\Http\Controllers\Super;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = User::role('admin')->get();

        // Kirim data dummy ke view
        return view('admin.super.dashboard', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed', // memastikan password dan konfirmasi password cocok
        ]);

        try {
            // Menyimpan data admin baru
            $user = User::create([
                'nama_lengkap' => $validated['username'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            // Assign role 'admin' kepada pengguna
            $role = Role::findByName('admin');
            $user->assignRole($role);

            // Flash success message jika berhasil
            return redirect()->route('admin.super.dashboard')->with('success', 'Admin baru berhasil ditambahkan!');
        } catch (\Exception $e) {
            // Jika terjadi error, kirimkan pesan error
            return redirect()->route('admin.super.dashboard')->with('error', 'Terjadi kesalahan! Gagal menambahkan admin.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
