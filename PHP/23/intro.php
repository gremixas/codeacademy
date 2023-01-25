<?php

declare(strict_types=1);

class Transport {
    public function __construct(
        public string $make,
        public string $model,
        public string $fuel,
        public string $date,
    ){}

    public function getMakeModel(): string {
        return $this->make . "/" . $this->model . "\n";
    }

    public function getAge() {
        return date_diff(date_create(), date_create($this->date))->format("%y years or %a days old") . "\n";
    }
}

class Automobile extends Transport {
    public function __construct(
        string $make,
        string $model,
        string $fuel,
        string    $date,
        public int    $wheels,
        )
    {
        parent::__construct($make, $model, $fuel, $date);
    }
}

// $camaro = new Automobile("Chevrolet", "Camaro", "Petrol", "2019-05-01", 4);
// print_r($camaro);
// print_r($camaro->getAge());
// echo $camaro->getMakeModel();

class Truck extends Automobile {
    public function __construct(
        string $make,
        string $model,
        string $fuel,
        string $date,
        int $wheels,
        public string $type,
        )
    {
        parent::__construct($make, $model, $fuel, $date, $wheels);
    }
}

$daf = new Truck("DAF", "MF Truck", "Diesel", "2015-02-01", 6, "lorry");
print_r($daf);
print_r($daf->getAge());
echo $daf->getMakeModel();
