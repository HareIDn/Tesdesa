<?php

namespace App\Http\Controllers\Civil;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serviceHistory = [
            [
                'service' => 'Surat Izin Usaha',
                'status' => 'Selesai',
                'date' => '2024-01-08',
                'time' => '13:00',
            ],
            [
                'service' => 'Surat Keterangan Domisili',
                'status' => 'Proses',
                'date' => '2024-02-15',
                'time' => '10:30',
            ],
            [
                'service' => 'Surat Keterangan Tidak Mampu',
                'status' => 'Selesai',
                'date' => '2024-03-22',
                'time' => '09:00',
            ],
        ];

        // Kirim data ke view
        return view('civil.dashboard', compact('serviceHistory'));

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
