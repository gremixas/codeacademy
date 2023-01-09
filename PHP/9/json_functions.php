<?php

require_once "data.php";
function arrayToJsonFile(array $arr): void
{
    $filePath = __DIR__ . "/pizzas.json";
    file_put_contents($filePath, json_encode($arr));
}
arrayToJsonFile($pizzas);

function jsonToArray(string $filePath): array
{
    return json_decode(file_get_contents($filePath), true);
}
