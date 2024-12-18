<?php

namespace App\Http\Controllers\API;

use App\Models\Notifikasi;
use App\Models\Pengajuan;
use App\Mail\NotifikasiMail;
use App\Mail\PengajuanConfirmationMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;




class NotifikasiController extends Controller
{
    /**
     * Menambahkan notifikasi baru.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'pengajuan_id' => 'required|exists:pengajuans,id',
            'judul' => 'required|string',
            'deskripsi' => 'nullable|string',
            'status' => 'nullable',
        ]);

        // Mengembalikan respons jika validasi gagal
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Data tidak valid',
                'errors' => $validator->errors()
            ], 400);
        }

        try {
            // Simpan notifikasi ke database
            $notifikasi = Notifikasi::create($request->all());

            // Kirim email setelah notifikasi berhasil dibuat
            $this->sendEmailNotification($notifikasi);

            return response()->json([
                'message' => 'Notifikasi berhasil dibuat dan email dikirim',
                'data' => $notifikasi
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal membuat notifikasi',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Fungsi untuk mengirim email.
     */
    private function sendEmailNotification(Notifikasi $notifikasi)
    {
        // Ambil pengajuan terkait untuk mendapatkan informasi lebih lanjut
        $pengajuan = Pengajuan::find($notifikasi->pengajuan_id);

        // Tentukan email yang akan dikirim (misalnya admin atau user terkait)
        $recipientEmail = 'bagussatt09@gmail.com'; // Ganti dengan email tujuan

        // Kirim email menggunakan Mailable NotifikasiMail
        Mail::to($recipientEmail)->send(new NotifikasiMail($notifikasi, $pengajuan));
    }

        /**
         * API untuk mengirim email konfirmasi pengajuan.
         */
        public function sendConfirmationEmail(Request $request)
        {
            // Validasi input pengajuan_id
            $request->validate([
                'pengajuan_id' => 'required|exists:pengajuans,id',
            ]);

            // Ambil data pengajuan berdasarkan ID
            $pengajuan = Pengajuan::findOrFail($request->pengajuan_id);

            // Ambil data user berdasarkan user_id dari pengajuan
            $user = User::findOrFail($pengajuan->user_id);

            // Tentukan pesan dan status notifikasi berdasarkan status pengajuan
            switch ($pengajuan->status) {
                case 'diterima':
                    $judul = 'Pengajuan Telah Diterima';
                    $deskripsi = 'Pengajuan Anda dengan tujuan: ' . $pengajuan->pilih_tujuan . ' telah diterima. Terima kasih atas pengajuan Anda.';
                    $emailBody = "Pengajuan Anda dengan tujuan '{$pengajuan->pilih_tujuan}' telah diterima. Terima kasih atas pengajuan Anda.";
                    $statusNotifikasi = 'info';
                    break;

                case 'diproses':
                    $judul = 'Pengajuan Sedang Diproses';
                    $deskripsi = 'Pengajuan Anda sedang dalam proses. Kami akan segera menghubungi Anda.';
                    $emailBody = "Pengajuan Anda sedang dalam proses. Kami akan segera menghubungi Anda.";
                    $statusNotifikasi = 'info';
                    break;

                case 'disetujui':
                    $judul = 'Pengajuan Anda Disetujui';
                    $deskripsi = 'Pengajuan Anda telah disetujui dan bisa segera diambil.';
                    $emailBody = "Pengajuan Anda telah disetujui dan bisa segera diambil.";
                    $statusNotifikasi = 'success';
                    break;

                case 'ditolak':
                    $judul = 'Pengajuan Anda Ditolak';
                    $deskripsi = 'Dokumen Anda perlu diperbaiki atau ada kekurangan. Silakan cek kembali pengajuan Anda.';
                    $emailBody = "Dokumen Anda perlu diperbaiki atau ada kekurangan. Silakan cek kembali pengajuan Anda.";
                    $statusNotifikasi = 'warning';
                    break;

                default:
                    return response()->json([
                        'message' => 'Status pengajuan tidak valid.',
                    ], 400);
            }

            // Buat notifikasi baru
            $notifikasi = Notifikasi::create([
                'pengajuan_id' => $pengajuan->id,
                'judul' => $judul,
                'deskripsi' => $deskripsi,
                'status' => $statusNotifikasi,
            ]);

            // Detail untuk email
            $details = [
                'title' => $judul,
                'body' => $emailBody,
                'notifikasi' => $notifikasi->toArray(), // Kirim seluruh data notifikasi
            ];

            // Kirim email ke alamat email user
            Mail::to($user->email)->send(new PengajuanConfirmationMail($details));

            return response()->json([
                'message' => 'Email berhasil dikirim ke ' . $user->email,
                'notifikasi' => $notifikasi,
            ], 200);
        }

    }




