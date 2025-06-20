<?php

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
