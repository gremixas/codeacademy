<?php
/*
Parašyti klasę Hotel. Ji turi konstruktorių, kuris priima private array $data - privačią savybę masyvą.
Instancijuoti klasę ir sukurti objektą. Perduoti duomenų masyvą:
[
    'name' => 'Amberton',
    'stars' => 4,
    'address' => 'Naujojo Sodo g. 1A, 92118 Klaipėda',
    'phone' => '(8-46) 404372',
    'breakfast' => true,
    'parking' => true,
    'pool' => true,
]
 
$hotel = new Hotel($data);
 
Pritaikykite reikiamą magišką metodą kad suveiktų tokios operacijos:
 
echo $hotel->stars;
echo $hotel->phone;
echo $hotel->address;
 
Pritaikykite reikiamą magišką metodą kad suveiktų tokia operacija:
 
$hotel->stars = 5;
 
*/
class Hotel {
    public function __construct(private array $data = []){}

    public function __get($name) {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }
}

$data = [
    'name' => 'Amberton',
    'stars' => 4,
    'address' => 'Naujojo Sodo g. 1A, 92118 Klaipėda',
    'phone' => '(8-46) 404372',
    'breakfast' => true,
    'parking' => true,
    'pool' => true,
];

$hotel = new Hotel($data);

echo $hotel->phone;
echo "\n";
echo $hotel->address;
echo "\n";
echo $hotel->stars;
echo "\n";

$hotel->stars = 5;
echo $hotel->stars;

