<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class PengajuanConfirmationMail extends Mailable
{
    public $details;

    public function __construct($details)
    {
        $this->details = $details;
    }

    public function build()
    {
        return $this->subject($this->details['title'])
                    ->view('emails.pengajuan_confirmation')
                    ->with([
                        'title' => $this->details['title'],
                        'body' => $this->details['body'],
                        'notifikasi' => $this->details['notifikasi'],
                    ]);
    }
}
