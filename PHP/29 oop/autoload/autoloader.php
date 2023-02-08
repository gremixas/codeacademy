<?php

spl_autoload_register(function ($className) {
    require __DIR__. "/../$className.php";
});

function view(string $fileName, array $variables)
{
    (new src\services\Template($fileName, $variables))->render();
}
