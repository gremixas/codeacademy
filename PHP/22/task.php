<?php

declare(strict_types=1);

/*
Sukurkite programą skirtą valdyti parkingą. Naudokite objektinį programavimą t.y. klases.
Turbūt pakaks dviejų klasių - Parking ir Car. Duomenys turi būti saugomi faile.
---------------------------------------------
php -f parking.php park_car NKA_123
Car ABC_123 parked!
---------------------------------------------
php -f parking.php park_car FTA_122
Car FTA_122 parked!
---------------------------------------------
php -f parking.php list_cars
Parked cars:
NKA_123
FTA_122
*/

$filePath = __DIR__ . "/storage.json";
$arg1 = isset($argv[1]) && $argv[1] ? $argv[1] : null;
$arg2 = isset($argv[2]) && $argv[2] ? $argv[2] : null;
$agrsSet = $arg1 && $arg2;

class Car {
    public function __construct(public string $carPlate){}
}

class Parking {
    public array $carPlates = [];
    public function parkCar(Car $car){
        $this->carPlates[] = $car->carPlate;
    }

}

$carPlates = readMyFile($filePath);

if ($agrsSet && $arg1 === "park_car") {
    $car = new Car($arg2);
    $parking = new Parking();
    $parking->parkCar($car);
    $carPlates = array_merge($carPlates, $parking->carPlates);
    file_put_contents($filePath, json_encode($carPlates));
    echo "Car {$arg2} parked!\n";
} elseif ($arg1 === "list_cars") {
    if (empty($carPlates)) {
        echo "No cars parked.\n";
    } else {
        echo "Parked cars:\n";
        foreach ($carPlates as $carPlate) {
            echo "{$carPlate}\n";
        }
    }
} else {
    echo "Pateikite tinkamus argumentus. Pvz: \n{$argv[0]} -f park_car NUMBER\n{$argv[0]} -f list_cars";
}

function readMyFile($filePath) {
    if (file_exists($filePath)) {
        $cars = json_decode(file_get_contents($filePath), true) ?? [];
    } else {
        $cars = [];
    }
    return $cars;
}
