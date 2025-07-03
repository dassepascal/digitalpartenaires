<?php

// app/Mail/NewsletterMail.php
namespace App\Mail;

use App\Models\Newsletter;
use App\Models\User;
use App\Services\NewsletterService;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewsletterMail extends Mailable
{
    use Queueable, SerializesModels;

    public Newsletter $newsletter;
    public User $user;
    public string $trackingPixelUrl;
    public string $unsubscribeUrl;

    public function __construct(Newsletter $newsletter, User $user)
    {
        $this->newsletter = $newsletter;
        $this->user = $user;

        $service = new NewsletterService();
        $this->trackingPixelUrl = $service->generateTrackingPixelUrl($newsletter, $user);

        $unsubscribeToken = $service->generateUnsubscribeToken($user);
        $this->unsubscribeUrl = route('newsletter.unsubscribe', [
            'user' => $user->id,
            'token' => $unsubscribeToken,
        ]);
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->newsletter->subject,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.newsletter',
            with: [
                'newsletter' => $this->newsletter,
                'user' => $this->user,
                'trackingPixelUrl' => $this->trackingPixelUrl,
                'unsubscribeUrl' => $this->unsubscribeUrl,
            ],
        );
    }
}

// app/Console/Commands/SendScheduledNewsletters.php
namespace App\Console\Commands;

use App\Services\NewsletterService;
use Illuminate\Console\Command;

class SendScheduledNewsletters extends Command
{
    protected $signature = 'newsletter:send-scheduled';
    protected $description = 'Envoie les newsletters programmées';

    public function __construct(private NewsletterService $newsletterService)
    {
        parent::__construct();
    }

    public function handle(): int
    {
        $this->info('Traitement des newsletters programmées...');

        $results = $this->newsletterService->processScheduledNewsletters();

        if (empty($results)) {
            $this->info('Aucune newsletter programmée à envoyer.');
            return 0;
        }

        foreach ($results as $result) {
            $status = $result['result']['success'] ? 'SUCCÈS' : 'ÉCHEC';
            $this->line("Newsletter #{$result['newsletter_id']} ({$result['newsletter_title']}): {$status}");
            $this->line("  - {$result['result']['message']}");
        }

        return 0;
    }
}

// app/Jobs/SendNewsletterJob.php
namespace App\Jobs;

use App\Models\Newsletter;
use App\Services\NewsletterService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendNewsletterJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(private Newsletter $newsletter)
    {
        //
    }

    public function handle(NewsletterService $service): void
    {
        $service->sendNewsletter($this->newsletter);
    }
}

// app/Http/Controllers/NewsletterController.php
namespace App\Http\Controllers;

use App\Models\Newsletter;
use App\Models\User;
use App\Services\NewsletterService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NewsletterController extends Controller
{
    public function __construct(private NewsletterService $newsletterService)
    {
        //
    }

    public function trackOpen(Request $request, Newsletter $newsletter, User $user): Response
    {
        $token = $request->get('token');

        if ($this->newsletterService->validateTrackingToken($newsletter, $user, $token)) {
            $this->newsletterService->trackOpen($newsletter, $user);
        }

        // Retourner un pixel transparent
        return response()->make(
            base64_decode('R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7'),
            200,
            ['Content-Type' => 'image/gif']
        );
    }

    public function trackClick(Request $request, Newsletter $newsletter, User $user): \Illuminate\Http\RedirectResponse
    {
        $token = $request->get('token');
        $url = $request->get('url');

        if ($this->newsletterService->validateTrackingToken($newsletter, $user, $token)) {
            $this->newsletterService->trackClick($newsletter, $user);
        }

        return redirect($url);
    }

    public function unsubscribe(Request $request, User $user)
    {
        $token = $request->get('token');

        if ($this->newsletterService->unsubscribeUser($user, $token)) {
            return view('newsletter.unsubscribed', compact('user'));
        }

        abort(403, 'Lien de désinscription invalide');
    }

    public function view(Newsletter $newsletter, User $user)
    {
        // Vérifier les permissions ou utiliser un token
        $token = request()->get('token');
        if (!$this->newsletterService->validateTrackingToken($newsletter, $user, $token)) {
            abort(403);
        }

        $this->newsletterService->trackOpen($newsletter, $user);

        return view('newsletter.view', compact('newsletter', 'user'));
    }
}
