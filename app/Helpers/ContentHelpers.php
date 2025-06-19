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
