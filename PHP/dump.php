<?php

function dump(...$variables): void
{
    foreach ($variables as $variable) {
        echo "<pre>" . print_r($variable, true) . "</pre>\n";
    }
}

function dd(...$variables): void
{
    dump(...$variables);
    die();
}
