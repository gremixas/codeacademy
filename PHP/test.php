<?php
include_once(__DIR__ . "/dump.php");

// echo "veikia";

// $arr['user'][] = "aa";
// $arr['user'][] = "aa";
// $arr['user'][] = "aa";
// $arr['user'][] = "aa";
// dump($arr);
// dump($arr);
// dump($arr);
// dump($arr);
// dump($arr);

$cars = [
    [
        "id" => "3",
        "make" => "Mazda",
        "model" => "MX5",
        "year" => "2016",
        "engine" => "3.6 Petrol",
        "transmission" => "Manual",
        "price" => "159",
        "image" => "miata.png",
    ],
    [
        "id" => "5",
        "make" => "Mazda",
        "model" => "MX5",
        "year" => "2016",
        "engine" => "3.6 Petrol",
        "transmission" => "Manual",
        "price" => "159000",
        "image" => "miataaaa.png",
    ]
];

$newCar = [
    "id" => "5",
    "make" => "Nissan",
    "model" => "Patrol",
    "year" => "1999",
    "engine" => "3.6 Diesel",
    "transmission" => "Auto",
    "price" => "100",
    "image" => "miata.png",
];

// print_r($cars);
// print_r($newCar);
// $cars = array_replace($cars, $newCar);
// print_r("replace");
// print_r($cars);
// print_r($newCar);
// unset($newCar['image']);
// print_r($newCar);

foreach($cars as $car)
{
    if ($car['id'] == 5)
    {
        break;
    }
}

// print_r($car);
