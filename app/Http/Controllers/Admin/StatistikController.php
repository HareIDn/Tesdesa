<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Submission; // Model Submission untuk pengajuan surat
use Carbon\Carbon;

class StatistikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data pengajuan per bulan
        $monthlyData = [
            'labels' => ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN'],
            'datasets' => [
                [
                    'label' => 'Jumlah Pengajuan',
                    'data' => [50, 75, 100, 125, 150, 100],
                    'backgroundColor' => '#166534'
                ],
                [
                    'label' => 'Rata-rata Waktu',
                    'data' => [30, 45, 60, 75, 90, 60],
                    'backgroundColor' => '#22c55e'
                ],
                [
                    'label' => 'Paling Banyak Diajukan',
                    'data' => [20, 30, 40, 50, 60, 40],
                    'backgroundColor' => '#86efac'
                ]
            ]
        ];

        // Data dummy untuk kinerja staff
        $staffPerformanceData = [
            'labels' => ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'],
            'datasets' => [
                [
                    'label' => 'Staff A',
                    'data' => [95, 88, 92, 85, 90],
                    'backgroundColor' => '#166534'
                ],
                [
                    'label' => 'Staff B',
                    'data' => [80, 85, 83, 88, 85],
                    'backgroundColor' => '#22c55e'
                ],
                [
                    'label' => 'Staff C',
                    'data' => [75, 78, 82, 80, 85],
                    'backgroundColor' => '#86efac'
                ]
            ]
        ];

        // Kirim data dummy ke view
        return view('admin.statistic', compact('monthlyData', 'staffPerformanceData'));
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
