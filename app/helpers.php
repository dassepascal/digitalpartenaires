<?php

if (!function_exists('replaceAbsoluteUrlsWithRelative')) {
    function replaceAbsoluteUrlsWithRelative(string $content)
    {
        $baseUrl = url('/');

        if ('/' !== substr($baseUrl, -1)) {
            $baseUrl .= '/';
        }

        $pattern     = '/<img\s+[^>]*src="(?:https?:\/\/)?' . preg_quote(parse_url($baseUrl, PHP_URL_HOST), '/') . '\/([^"]+)"/i';
        $replacement = '<img src="/$1"';

        return preg_replace($pattern, $replacement, $content);
    }
}

if (!function_exists('price_without_vat')) {
    function price_without_vat(float $price_with_vat, int $vat_rate = 20): float
    {
        return round($price_with_vat / (1.0 + (float)env('VAT_RATE', $vat_rate)), 2);
    }
}

if (!function_exists('transL')) {
    function transL($key, $replace = [], $locale = null)
    {
        $key = trans($key, $replace, $locale);
        return mb_substr(mb_strtolower($key, 'UTF-8'), 0, 1) . mb_substr($key, 1);
    }
}

if (!function_exists('__L')) {
    function __L($key, $replace = [], $locale = null)
    {
        return transL($key, $replace, $locale);
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
        $lang = substr($locale, 0, 2);
        preg_match('/_([^_]*)$/', $locale, $matches);
        $currency  = $matches[1] ?? 'EUR';
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

if (!function_exists('generateRandomDateInRange')) {
    function generateRandomDateInRange($startDate, $endDate)
    {
        $start = Carbon\Carbon::parse($startDate);
        $end   = Carbon\Carbon::parse($endDate);
        $difference = $end->timestamp - $start->timestamp;
        $randomSeconds = rand(0, $difference);
        return $start->copy()->addSeconds($randomSeconds);
    }
}
