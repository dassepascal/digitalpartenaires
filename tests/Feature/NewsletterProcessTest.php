<?php
uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);
use App\Models\User;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterMail;

it('récupère uniquement les utilisateurs abonnés et validés via les scopes', function () {
    // Utilisateur abonné et validé (doit être inclus)
    $user1 = User::factory()->create(['newsletter' => true, 'valid' => true]);
    // Utilisateur abonné mais non validé (exclu)
    User::factory()->create(['newsletter' => true, 'valid' => false]);
    // Utilisateur non abonné mais validé (exclu)
    User::factory()->create(['newsletter' => false, 'valid' => true]);
    // Utilisateur ni abonné ni validé (exclu)
    User::factory()->create(['newsletter' => false, 'valid' => false]);

    $subscribers = User::newsletterSubscribers()->validUsers()->get();

    expect($subscribers)->toHaveCount(1);
    expect($subscribers->first()->id)->toBe($user1->id);
    expect($subscribers->first()->newsletter)->toBeTrue();
    expect($subscribers->first()->valid)->toBeTrue();
});

it('simule le process complet d\'envoi de newsletter via le service', function () {
    Mail::fake();

    // 1. Créer un utilisateur abonné et valide
    $user = User::factory()->create([
        'newsletter' => true,
        'valid' => true,
        'email' => 'test@example.com',
    ]);

    // 2. Créer une newsletter
    $newsletter = Newsletter::factory()->create([
        'title' => 'Test Pest',
        'subject' => 'Sujet test',
        'content' => 'Contenu test',
        'status' => 'draft',
        'created_by' => $user->id,
    ]);

    // 3. Appeler le service pour envoyer la newsletter
    app(\App\Services\NewsletterService::class)->sendNewsletter($newsletter);

    // 4. Vérifier que la newsletter est marquée comme envoyée
    expect($newsletter->fresh()->status)->toBe('sent');

    // 5. Vérifier la présence dans la table newsletter_subscribers
    $this->assertDatabaseHas('newsletter_subscribers', [
        'newsletter_id' => $newsletter->id,
        'user_id' => $user->id,
    ]);

    // 6. Vérifier qu’un mail a été envoyé
    Mail::assertSent(NewsletterMail::class);

    // 7. Vérifier le nombre d’envois
    expect($newsletter->fresh()->sent_count)->toBe(1);
});
