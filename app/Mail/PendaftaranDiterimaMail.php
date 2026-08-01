<?php

namespace App\Mail;

use App\Models\Pendaftaran;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PendaftaranDiterimaMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Pendaftaran $pendaftaran, public string $periode)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Selamat! Pendaftaran Anda Diterima - IDAKOM POLBAN',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.pendaftaran-diterima',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
