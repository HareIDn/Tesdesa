<?php

namespace App\Http\Controllers\Super;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil data aktivitas dari database (misalnya, data dari tabel aktivitas)
        $activities = []; // Inisialisasi array kosong untuk menyimpan data aktivitas

        // Mengambil data pengguna dengan role 'user' dan aktivitas terkait
        $users = User::role('user')->get(); // Ambil semua pengguna dengan role 'user'

        foreach ($users as $user) {
            // Menambahkan data aktivitas terkait dengan pengguna
            $activities[] = [
                'user' => $user,
                'document' => 'Surat Keterangan Domisili',  // Ganti dengan dokumen yang sesuai
                'status' => 'Dalam Proses',  // Status aktivitas
                'date' => now()->format('Y-m-d'),  // Tanggal aktivitas
                'time' => now()->format('H:i'),  // Waktu aktivitas
            ];
        }

        // Mengirim data ke view
        return view('admin.super.activity', compact('activities'));
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
        //
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
