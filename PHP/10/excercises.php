<?php

function exercise2(): void
{
    $vehicles = [
        [
            'type' => 'passenger car',
            'name' => 'Honda Civic',
            'weight' => 1550
        ],
        [
            'type' => 'airplane',
            'name' => 'Boeing 737',
            'weight' => 41410
        ],
        [
            'type' => 'airplane',
            'name' => 'Cessna DC-6',
            'weight' => 1300
        ],
        [
            'type' => 'truck',
            'name' => 'Volvo FH16',
            'weight' => 12500
        ],
        [
            'type' => 'truck',
            'name' => 'MB Actros',
            'weight' => 13000
        ],
        [
            'type' => 'passenger car',
            'name' => 'VW Golf',
            'weight' => 1450
        ],
    ];
    $vehicleNames = "";
    foreach ($vehicles as $vehicle) {
        $vehicleNames .= $vehicle['name'] . "\n";
    }
    $filePath = __DIR__ . "/vehicles.txt";
    file_put_contents($filePath, $vehicleNames);
}
exercise2();
function exercise3(): array
{
    /*
    Perskaitykite visus tr. priemonių pavadinimus iš failo vehicles.txt,
    sudėkite juos į masyva ir grąžinkite iš funkcijos.
    [
        'Honda Civic',
        'Boeing 737',
        ...
    ]
    */
    $filePath = __DIR__ . "/vehicles.txt";
    $vehicles = file_get_contents($filePath);
    $explode = explode("\n", $vehicles);
    return array_filter($explode);
}
// print_r(exercise3());

function exercise4(): void
{
    $vehicles = [
        [
            'type' => 'passenger car',
            'name' => 'Honda Civic',
            'weight' => 1550
        ],
        [
            'type' => 'airplane',
            'name' => 'Boeing 737',
            'weight' => 41410
        ],
        [
            'type' => 'airplane',
            'name' => 'Cessna DC-6',
            'weight' => 1300
        ],
        [
            'type' => 'truck',
            'name' => 'Volvo FH16',
            'weight' => 12500
        ],
        [
            'type' => 'truck',
            'name' => 'MB Actros',
            'weight' => 13000
        ],
        [
            'type' => 'passenger car',
            'name' => 'VW Golf',
            'weight' => 1450
        ],
    ];
    $filePath = __DIR__ . "/vehicles.json";
    file_put_contents($filePath, json_encode($vehicles));
}
// exercise4();

function exercise5(): array
{
    echo "\nexercise5\n";
    $filePath = __DIR__ . "/vehicles.json";
    return json_decode(file_get_contents($filePath), true);
}
// print_r(exercise5());

function exercise6(): array
{
    $newVehicle = [
        'type' => 'plane',
        'name' => 'Airbus A320',
        'weight' => 39500,
    ];
 
    /*
    Perskaitykite failo vehicles_database.json turinį, paverskite jį į masyvą ir grąžinkite iš funkcijos.
    */
 
    /*
    Žingsniai:
    - perskaitykite failo vehicles_database.json turinį
    - paverskite turinį į masyvą
    - į masyvą pridėkite naują elementą ($newVehicle)
    - vėl išsaugokite visą masyvą faile vehicles_database.json
    */

    $filePath = __DIR__ . "/vehicles.json";
    $vehicles = json_decode(file_get_contents($filePath), true);
    array_push($vehicles, $newVehicle);
    file_put_contents($filePath, json_encode($vehicles));
    return $vehicles;
}
// print_r(exercise6());

