<?php

namespace App\Mail;

use App\Models\Agence;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use App\Models\Shop;

class UserRegistered extends Mailable
{
    use Queueable, SerializesModels;

    Public Agence $agence;

    public function __construct()
    {
        $this->agence = Agence::firstOrFail();
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address($this->agence->email, $this->agence->name),
            subject: trans('You have been registered'),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mails.registered',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}