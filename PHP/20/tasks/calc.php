<?php

// Sukurkite klasę NumberCalculator, kuri leistų atlikti įvairius skaičiavimo veiksmus. Ši klasė neturės konstruktoriaus.
// Metodai:
// - addNumber - metodas priims "int" tipo argumentą, return tipas bus "void"
// - calculateSum - metodas grąžins "int" tipo reikšmę, argumentų neturės
// - calculateProduct - product liet. sandauga. Metodas grąžins "int" tipo reikšmę, 
// argumentų neturės
// - calculateAverage - suapvalinkite iki sveiko skaičiaus, į viršų. Metodas grąžins "int" 
// tipo reikšmę, argumentų neturės
// Nepamirškite sudėti tipų argumentams bei return'ams.
// Kodo kvietimo pavyzdys:
// $numberCalculator = new NumberCalculator();
// echo $numberCalculator->calculateSum(); // 0
// $numberCalculator->addNumber(5);
// $numberCalculator->addNumber(7);
// echo $numberCalculator->calculateSum(); // 12

include_once "../../dump.php";

class NumberCalculator {
    public array $number = [];

    public function addNumber($num): void {
        $this->number[] = $num;
    }
    public function calculateSum(): int {
        return array_reduce($this->number, fn($acc, $n) => $acc += $n, 0);
    }
    public function calculateProduct(): int {
        return array_reduce($this->number, fn($acc, $n) => $acc *= $n, 1);
    }
    public function calculateAverage(): float {
        return array_reduce($this->number, fn($acc, $n) => $acc += $n, 0) / count($this->number);
    }
}

$numberCalculator = new NumberCalculator();
echo $numberCalculator->calculateSum() . "\n"; // 0
$numberCalculator->addNumber(5);
$numberCalculator->addNumber(5);
$numberCalculator->addNumber(5);
$numberCalculator->addNumber(5);
$numberCalculator->addNumber(7);
echo $numberCalculator->calculateSum() . "\n"; // 12
echo $numberCalculator->calculateAverage() . "\n"; // 6
echo $numberCalculator->calculateProduct() . "\n"; // 35
