<?php

if (!function_exists('price_without_vat')) {
    function price_without_vat(float $price_with_vat, int $vat_rate = 20): float
    {
        return round($price_with_vat / (1.0 + (float)env('VAT_RATE', $vat_rate)), 2);
    }
}

if (!function_exists('bigR')) {
    function bigR(float|int $r, $dec = 2, $locale = null): bool|string
    {
        $locale ??= substr(config('app.locale'), 0, 2);
        $fmt = new NumberFormatter(locale: $locale, style: NumberFormatter::DECIMAL);
        return $fmt->format(num: round($r, $dec));
    }
}

if (!function_exists('ftA')) {
    function ftA($amount, $locale = null): bool|string
    {
        $locale ??= config('app.locale');
        preg_match('/_([^_]*)$/', $locale, $matches);
        $currency = $matches[1] ?? 'EUR';
        $formatter = new NumberFormatter($locale, NumberFormatter::CURRENCY);
        return $formatter->formatCurrency($amount, $currency);
    }
}

if (!function_exists('getBestPrice')) {
    function getBestPrice($product)
    {
        $promoGlobal = \App\Models\Setting::where('key', 'promotion')->first();

        $globalPromoValid = $promoGlobal && $promoGlobal->value && now()->between($promoGlobal->date1, $promoGlobal->date2);
        $productPromoValid = $product->promotion_price && now()->between($product->promotion_start_date, $product->promotion_end_date);

        $bestPrice = $product->price;

        if ($productPromoValid) {
            $bestPrice = $product->promotion_price;
        }

        if ($globalPromoValid) {
            $globalPromoPrice = $product->price * (1 - $promoGlobal->value / 100);
            if ($globalPromoPrice < $bestPrice) {
                $bestPrice = $globalPromoPrice;
            }
        }

        return $bestPrice;
    }
}
