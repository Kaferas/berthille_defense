<?php

if (!function_exists('current_url')) {
    function current_url()
    {
        $url = explode("/", url()->full());
        return $url[3] ?? $url[2];
    }
}
