<?php

use App\Models\Agency;

test('an agence can be instantiated', function () {
    $agence = new Agency([
        'name' => 'Agence Paris',
        'address' => '123 Rue de Paris',
        'email' => 'paris@agence.com',
        'holder' => 'Jean Dupont',
        'bic' => 'AGRIFRPPXXX',
        'iban' => 'FR7612345678901234567890123',
        'bank' => 'Crédit Agricole',
        'bank_address' => '456 Avenue de la Banque',
        'phone' => '0123456789',
        'facebook' => 'https://facebook.com/agenceparis',
        'home' => true,
        'home_infos' => 'Infos sur la page d\'accueil',
        'home_shipping' => false,
        'invoice' => true,
        'card' => true,
        'transfer' => false,
        'check' => true,
        'mandat' => false,
    ]);

    expect($agence)->toBeInstanceOf(Agency::class)
        ->and($agence->name)->toBe('Agence Paris')
        ->and($agence->email)->toBe('paris@agence.com')
        ->and($agence->holder)->toBe('Jean Dupont');
});



test('an agence has fillable attributes', function () {
    $attributes = [
        'name' => 'Agence Marseille',
        'address' => '789 Boulevard Marseille',
        'email' => 'marseille@agence.com',
        'holder' => 'Marie Curie',
        'bic' => 'BNPAFRPPXXX',
        'iban' => 'FR7612345678909876543210987',
        'bank' => 'BNP Paribas',
        'bank_address' => '321 Rue de la Banque',
        'phone' => '0987654321',
        'facebook' => 'https://facebook.com/agencemarseille',
        'home' => false,
        'home_infos' => 'Infos spécifiques',
        'home_shipping' => true,
        'invoice' => false,
        'card' => false,
        'transfer' => true,
        'check' => false,
        'mandat' => true,
    ];

    $agence = new Agency($attributes);

    foreach ($attributes as $key => $value) {
        expect($agence->$key)->toBe($value);
    }
});

