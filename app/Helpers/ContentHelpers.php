<?php

if (!function_exists('replaceAbsoluteUrlsWithRelative')) {
    function replaceAbsoluteUrlsWithRelative(string $html): string
    {
        $baseUrl = rtrim(url('/'), '/') . '/';
        // Remplacer toutes les occurrences de $baseUrl par "/"
        return str_replace($baseUrl, '/', $html);
    }
}
