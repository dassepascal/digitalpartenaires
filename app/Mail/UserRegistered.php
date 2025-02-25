<?php

namespace App\Mail;

use App\Models\Agence;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class UserRegistered extends Mailable
{
    use Queueable, SerializesModels;

    public Agence $agence;

    public function __construct(Agence $agence = null)
    {
        // Si aucune agence n'est passée, utilise la première ou une valeur par défaut
        $this->agence = $agence ?? Agence::first() ?? new Agence(['name' => 'Agence par défaut', 'email' => 'no-reply@example.com']);
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
            view: 'mails.registered', // Assurez-vous que cette vue existe
        );
    }

    public function attachments(): array
    {
        return [];
    }
}