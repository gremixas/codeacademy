<?php

$filepath = __DIR__ . "/fruits.json";
$file = file_get_contents($filepath);
$json = json_decode($file, true);
// print_r($json);

$myFruit = array(
    [
        "genus" => "Magic",
        "name" => "Abracadabra",
        "family" => "Mushroom",
    ]
);
// print_r($myFruit);

$new = array_merge($json, $myFruit);
print_r($new);

$filepath = __DIR__ . "/added-fruits.json";
file_put_contents($filepath, json_encode($new, true));

// print_r(file_get_contents("https://www.fruityvice.com/api/fruit/all"));
