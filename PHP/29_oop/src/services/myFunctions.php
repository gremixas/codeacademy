<?php

use App\services\Template;

if (!function_exists("view")) {
    function view(string $fileName, array $variables = [])
    {
        (new Template($fileName, $variables))->render();
    }
}
