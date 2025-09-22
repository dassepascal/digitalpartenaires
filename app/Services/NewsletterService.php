<?php

// app/Services/NewsletterService.php
namespace App\Services;

use Exception;
use App\Models\User;
use App\Models\Newsletter;
use Illuminate\Support\Str;
use App\Mail\NewsletterMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class NewsletterService
{

     /**
     * Génère les tokens de tracking et de désabonnement pour un utilisateur.
     */
    public function generateTokens(Newsletter $newsletter, User $user): array
    {
        return [
            'tracking_token'   => hash('sha256', $newsletter->id . '|' . $user->id . '|' . \Illuminate\Support\Str::random(40)),
            'unsubscribe_token' => hash('sha256', $user->id . '|' . \Illuminate\Support\Str::random(40)),
        ];
    }
    /**
     * Envoie la newsletter à tous les abonnés valides.
     */
    public function sendNewsletter(Newsletter $newsletter): array
    {
        $subscribers = User::where('newsletter', true)
            ->where('valid', true)
            ->get();

        if ($subscribers->isEmpty()) {
            return [
                'success' => false,
                'message' => 'Aucun abonné valide pour envoyer cette newsletter.',
                'sent_count' => 0,
                'failed_count' => 0,
            ];
        }

        $sentCount   = 0;
        $failedCount = 0;

        foreach ($subscribers as $user) {
            try {
                // Générer les tokens
                $trackingToken    = Str::random(64);
                $unsubscribeToken = Str::random(64);

                // Enregistrer dans newsletter_tokens
                DB::table('newsletter_tokens')->insert([
                    'newsletter_id'     => $newsletter->id,
                    'user_id'           => $user->id,
                    'tracking_token'    => $trackingToken,
                    'unsubscribe_token' => $unsubscribeToken,
                    'generated_at'      => now(),
                    'created_at'        => now(),
                    'updated_at'        => now(),
                ]);

                // Envoi du mail
                Mail::to($user->email)->send(
                    new NewsletterMail($newsletter, $user, $trackingToken, $unsubscribeToken)
                );

                // Marquer l’envoi dans la table pivot newsletter_subscribers
                $newsletter->subscribers()->attach($user->id, [
                    'sent_at' => now(),
                    'tracking_token' => $trackingToken,
                    'unsubscribe_token' => $unsubscribeToken,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                $sentCount++;
            } catch (Exception $e) {
                $failedCount++;
            }
        }

        // Mettre à jour la newsletter
        $newsletter->update([
            'status'     => 'sent',
            'sent_at'    => now(),
            'sent_count' => $sentCount,
        ]);

        return [
            'success'      => $failedCount === 0,
            'message'      => "Newsletter envoyée à $sentCount abonnés, $failedCount échecs.",
            'sent_count'   => $sentCount,
            'failed_count' => $failedCount,
        ];
    }


     /**
     * Désabonner un utilisateur via un token.
     */

     public function unsubscribeUser(User $user, string $token): bool
    {
        $record = DB::table('newsletter_tokens')
            ->where('user_id', $user->id)
            ->where('unsubscribe_token', $token)
            ->first();

        if (! $record) {
            return false;
        }

        // Marquer le désabonnement
        DB::table('newsletter_tokens')
            ->where('id', $record->id)
            ->update(['unsubscribed_at' => now()]);

        $user->update(['newsletter' => false]);

        return true;
    }



    public function processScheduledNewsletters(): array
    {
        $newsletters = Newsletter::where('status', 'scheduled')
            ->where('scheduled_at', '<=', now())
            ->get();

        $results = [];

        foreach ($newsletters as $newsletter) {
            $result = $this->sendNewsletter($newsletter);
            $results[] = [
                'newsletter_id' => $newsletter->id,
                'newsletter_title' => $newsletter->title,
                'result' => $result,
            ];
        }

        return $results;
    }

    public function getNewsletterStats(Newsletter $newsletter): array
    {
        $subscribers = $newsletter->subscriberRecords();

        $totalSent = $subscribers->count();
        $totalOpened = $subscribers->where('opened', true)->count();
        $totalClicked = $subscribers->where('clicked', true)->count();

        return [
            'total_sent' => $totalSent,
            'total_opened' => $totalOpened,
            'total_clicked' => $totalClicked,
            'open_rate' => $totalSent > 0 ? round(($totalOpened / $totalSent) * 100, 2) : 0,
            'click_rate' => $totalSent > 0 ? round(($totalClicked / $totalSent) * 100, 2) : 0,
        ];
    }

    public function trackOpen(Newsletter $newsletter, User $user): void
    {
        $subscriber = $newsletter->subscriberRecords()
            ->where('user_id', $user->id)
            ->first();

        if ($subscriber && !$subscriber->opened) {
            $subscriber->update([
                'opened' => true,
                'opened_at' => now(),
            ]);
        }
    }

    public function trackClick(Newsletter $newsletter, User $user): void
    {
        $subscriber = $newsletter->subscriberRecords()
            ->where('user_id', $user->id)
            ->first();

        if ($subscriber) {
            if (!$subscriber->opened) {
                $subscriber->update([
                    'opened' => true,
                    'opened_at' => now(),
                ]);
            }

            if (!$subscriber->clicked) {
                $subscriber->update([
                    'clicked' => true,
                    'clicked_at' => now(),
                ]);
            }
        }
    }



    public function validateUnsubscribeToken(User $user, string $token): bool
    {
        $expectedToken = hash('sha256', $user->id . $user->email . config('app.key'));
        return hash_equals($expectedToken, $token);
    }

    public function generateUnsubscribeToken(User $user): string
    {
        return hash('sha256', $user->id . $user->email . config('app.key'));
    }

    public function generateTrackingPixelUrl(Newsletter $newsletter, User $user): string
    {
        return route('newsletter.track.open', [
            'newsletter' => $newsletter->id,
            'user' => $user->id,
            'token' => $this->generateTrackingToken($newsletter, $user),
        ]);
    }

    public function generateTrackingToken(Newsletter $newsletter, User $user): string
    {
        return hash('sha256', $newsletter->id . $user->id . config('app.key'));
    }

    public function validateTrackingToken(Newsletter $newsletter, User $user, string $token): bool
    {
        $expectedToken = $this->generateTrackingToken($newsletter, $user);
        return hash_equals($expectedToken, $token);
    }
}
