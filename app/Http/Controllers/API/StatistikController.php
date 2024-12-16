<?php

namespace App\Http\Controllers\API;

use App\Models\Pengajuan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StatistikController extends Controller
{
    public function getStatistik()
    {
        $totalPengajuan = Pengajuan::count();

        $pengajuans = Pengajuan::whereNotNull('tanggal_diproses')->get();
        $selisihHari = [];

        foreach ($pengajuans as $pengajuan) {
            $tanggalPengajuan = Carbon::parse($pengajuan->tanggal_pengajuan);
            $tanggalDiproses = Carbon::parse($pengajuan->tanggal_diproses);
            $selisihHari[] = $tanggalDiproses->diffInDays($tanggalPengajuan);
        }

        $rataRataHari = (count($selisihHari) > 0) ? round(array_sum($selisihHari) / count($selisihHari)) : 0;

        $dokumenTerbanyak = Pengajuan::select('pilih_tujuan', DB::raw('COUNT(*) as jumlah'))
            ->groupBy('pilih_tujuan')
            ->orderByDesc('jumlah')
            ->first();

        $nilaiKinerja = 100;

        if ($rataRataHari > 10) {
            $nilaiKinerja -= ($rataRataHari - 10);
        }

        $data = [
            'total_pengajuan' => $totalPengajuan,
            'rata_rata_hari' => $rataRataHari,
            'dokumen_terbanyak' => $dokumenTerbanyak ? $dokumenTerbanyak->pilih_tujuan : null,
            'jumlah_terbanyak' => $dokumenTerbanyak ? $dokumenTerbanyak->jumlah : 0,
            'nilai_kinerja' => $nilaiKinerja,
        ];

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

        public function getStatistikPerBulan()
        {
            $pengajuans = Pengajuan::whereIn('status', ['diproses', 'diterima', 'disetujui'])
                ->get();

            $statistikPerBulan = $pengajuans->groupBy(function ($item) {
                return Carbon::parse($item->tanggal_pengajuan)->format('Y-m');
            });

            $data = [];
            $totalWaktuProses = 0;
            $jumlahPengajuan = 0;
            $pengajuanDiproses = 0;
            $pengajuanDisetujui = 0;
            $pengajuanTerlambat = 0;

            foreach ($statistikPerBulan as $bulan => $pengajuanBulan) {
                $formattedBulan = Carbon::parse($bulan . '-01')->format('F Y');

                $statusCount = $pengajuanBulan->groupBy('status')->map(function ($statusGroup) {
                    return $statusGroup->count();
                });

                foreach ($pengajuanBulan as $pengajuan) {
                    if ($pengajuan->status == 'diproses' || $pengajuan->status == 'disetujui') {
                        $tanggalPengajuan = Carbon::parse($pengajuan->tanggal_pengajuan);
                        $tanggalDiproses = Carbon::parse($pengajuan->tanggal_diproses);
                        $totalWaktuProses += $tanggalDiproses->diffInDays($tanggalPengajuan);
                        $jumlahPengajuan++;
                    }

                    if ($pengajuan->status == 'diproses') {
                        $pengajuanDiproses++;
                    }

                    if ($pengajuan->status == 'disetujui') {
                        $pengajuanDisetujui++;
                    }

                    if (isset($pengajuan->tanggal_deadline) && Carbon::parse($pengajuan->tanggal_diproses)->greaterThan(Carbon::parse($pengajuan->tanggal_deadline))) {
                        $pengajuanTerlambat++;
                    }
                }

                $data[] = [
                    'bulan' => $formattedBulan,
                    'jumlah_surat' => count($pengajuanBulan),
                    'diproses' => $statusCount->get('diproses', 0),
                    'diterima' => $statusCount->get('diterima', 0),
                    'disetujui' => $statusCount->get('disetujui', 0),
                ];
            }

            $rataRataWaktuProses = ($jumlahPengajuan > 0) ? round($totalWaktuProses / $jumlahPengajuan) : 0;
            $completionRate = ($pengajuanDiproses > 0) ? round(($pengajuanDisetujui / $pengajuanDiproses) * 100) : 0;
            $successRate = ($pengajuanDiproses > 0) ? round(($pengajuanDisetujui / $pengajuanDiproses) * 100) : 0;
            $lateSubmissionRate = ($jumlahPengajuan > 0) ? round(($pengajuanTerlambat / $jumlahPengajuan) * 100) : 0;

            $performanceScore = round(($rataRataWaktuProses * 0.2) + ($completionRate * 0.3) + ($successRate * 0.3) + (100 - $lateSubmissionRate * 0.2));

            return response()->json([
                'success' => true,
                'data' => $data,
                'kinerja' => $performanceScore,

            ]);
        }
    }


