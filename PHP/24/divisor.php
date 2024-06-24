<?php

declare(strict_types=1);

class Divisor
{
    public function __construct(public int $max){
        if ($max < 1) {
            die("Max number has to be bigger");
        }
    }
    public function __invoke($divisor){
        $divisions = [];
        for ($i=0; $i <= $this->max; $i++) { 
            if ($i % $divisor === 0) {
                $divisions[] = $i;
            }
        }
        return $divisions;
    }
}

/*
Sukurkite klasę, kuri masyvo formatu grąžintų visus skaičius nuo 1 iki X, kurie dalijasi iš tam tikro skaičiaus.
Klasė turi būti iškviečiama kaip funkcija, daliklis paduodamas kaip argumentas.
Skaičius X turi būti paduodamas per konstruktorių. Skaičius turi būti teigiamas.
$divisor = new Divisor(1000);
print_r($divisor(10));
[
    10,
    20,
    ...
]
*/
$divisor = new Divisor(1000);
print_r($divisor(10));
