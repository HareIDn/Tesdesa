<?php

namespace App\Http\Controllers\Super;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = [
            [
                'id' => 1,
                'username' => 'Admin01',
                'email' => 'admin01@example.com',
                'password' => 'Admin01',
                'date' => '21, oct 2024',
            ],
            [
                'id' => 2,
                'username' => 'Admin02',
                'email' => 'admin02@example.com',
                'password' => 'Admin02',
                'date' => '22, oct 2024',
            ],
            [
                'id' => 3,
                'username' => 'Admin03',
                'email' => 'admin03@example.com',
                'password' => 'Admin03',
                'date' => '23, oct 2024',
            ]
        ];

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
