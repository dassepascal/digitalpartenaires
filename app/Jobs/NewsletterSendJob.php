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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class NewsletterSendJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public Newsletter $newsletter;
    public User $user;

    public function __construct(Newsletter $newsletter, User $user)
    {
        $this->newsletter = $newsletter;
        $this->user       = $user;
    }

    public function handle(): void
    {
        // Récupération des tokens depuis newsletter_tokens
        $token = DB::table('newsletter_tokens')
            ->where('newsletter_id', $this->newsletter->id)
            ->where('user_id', $this->user->id)
            ->first();

        if (!$token) {
            return; // sécurité
        }

        Mail::to($this->user->email)
            ->send(new NewsletterMail($this->newsletter, $this->user, $token->tracking_token, $token->unsubscribe_token));
    }
}
