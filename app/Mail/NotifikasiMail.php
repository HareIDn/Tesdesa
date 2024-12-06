<?php

namespace App\Mail;

use App\Models\Notifikasi;
use App\Models\Pengajuan;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifikasiMail extends Mailable
{
    use Queueable, SerializesModels;

    public $notifikasi;
    public $pengajuan;

    /**
     * Create a new message instance.
     *
     * @param Notifikasi $notifikasi
     * @param Pengajuan $pengajuan
     * @return void
     */
    public function __construct(Notifikasi $notifikasi, Pengajuan $pengajuan)
    {
        $this->notifikasi = $notifikasi;
        $this->pengajuan = $pengajuan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Notifikasi Pengajuan')
                    ->view('emails.notifikasi');
    }
}
