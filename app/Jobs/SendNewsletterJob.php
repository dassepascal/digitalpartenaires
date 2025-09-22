<?php

namespace App\Jobs;

use App\Models\Newsletter;
use App\Models\User;
use App\Mail\NewsletterMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendNewsletterJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public Newsletter $newsletter;
    public User $user;

    // Nombre maximum de tentatives
    public $tries = 3;

    // Délai entre chaque retry (en secondes)
    public $backoff = 60;

    public function __construct(Newsletter $newsletter, User $user)
    {
        $this->newsletter = $newsletter;
        $this->user = $user;
    }

    public function handle(): void
    {
        try {
            // Envoie le mail en file d'attente
            Mail::to($this->user->email)->queue(new NewsletterMail($this->newsletter, $this->user));

            // Crée ou met à jour le pivot newsletter_subscribers
            \App\Models\NewsletterSubscriber::updateOrCreate(
                [
                    'newsletter_id' => $this->newsletter->id,
                    'user_id' => $this->user->id,
                ],
                [
                    'sent_at' => now(),
                    'opened'  => false,
                    'clicked' => false,
                ]
            );

            Log::info("Newsletter #{$this->newsletter->id} envoyée à l'utilisateur #{$this->user->id}");

        } catch (\Exception $e) {
            Log::error("Échec de l'envoi newsletter #{$this->newsletter->id} à l'utilisateur #{$this->user->id} : {$e->getMessage()}");

            // Relancer l'exception pour que le job soit réessayé
            throw $e;
        }
    }

    // Méthode appelée si le job échoue après toutes les tentatives
    public function failed(\Exception $exception): void
    {
        Log::critical("Échec définitif de la newsletter #{$this->newsletter->id} pour l'utilisateur #{$this->user->id} : {$exception->getMessage()}");
        // Ici, tu peux envoyer un mail d'alerte à l'admin ou déclencher une notification
    }
}
