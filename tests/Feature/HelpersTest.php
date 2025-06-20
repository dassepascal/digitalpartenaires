<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Config;

test('it converts absolute img urls to relative', function () {
    $baseUrl = rtrim(url('/'), '/') . '/';
    $html = '<img src="' . $baseUrl . 'storage/photos/image.jpg">';
    $expected = '<img src="/storage/photos/image.jpg"';

    expect(replaceAbsoluteUrlsWithRelative($html))->toContain($expected);
});

test('it formats lowercase translations correctly', function () {
    $translated = __L('auth.failed'); // Clé de test à adapter
    expect($translated)
        ->not->toBeEmpty()
        ->and(mb_strtolower(mb_substr($translated, 0, 1)))->toBe(mb_substr($translated, 0, 1));
});

// test('it calculates price without vat', function () {
//     Config::set('VAT_RATE', 20); // Ou utilise env() selon le contexte

//     $priceWithVat = 120;
//     $expected = 100.00;

//     expect(price_without_vat($priceWithVat, 20))->toEqual($expected);
// });
test('debug ftA output', function () {
    $formatted = ftA(1234.56, 'fr_FR');

    fwrite(STDERR, "\nFormatted value: [$formatted]\n");
    $bytes = unpack('H*', $formatted);
    fwrite(STDERR, "Hex: {$bytes[1]}\n");

    expect(true)->toBeTrue(); // pour voir la sortie
});


test('it generates random date in range', function () {
    $start = '2024-01-01';
    $end = '2024-01-31';
    $randomDate = generateRandomDateInRange($start, $end);

    expect($randomDate)->toBeInstanceOf(Carbon::class)
                      ->and($randomDate->between(Carbon::parse($start), Carbon::parse($end)))->toBeTrue();
});

test('it formats number based on locale', function () {
    Config::set('app.locale', 'fr_FR');
    $formatted = bigR(1234.567, 2);

    // Supprimer tous les espaces, peu importe leur type
    $cleaned = preg_replace('/\s/u', '', $formatted);

    expect($cleaned)->toEqual('1234,57');
});



