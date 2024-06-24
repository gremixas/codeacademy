<?php

declare(strict_types=1);

class Number {
    public function __construct(private int|float $number){}

    public function getNumber(): int|float {
        return $this->number;
    }

    public function type(){
        return gettype($this->number);
    }
}
class Result {
    public function __construct(
        private mixed $result,
        private int $status = 1,
        ){}

    public function getResult(): mixed {
        return $this->result;
    }
}
class Calculator {
    public function addNumbers(Number $a, Number $b): Result {
        $sum = $a->getNumber() + $b->getNumber();
        return new Result($sum);
    }
}

$number1 = new Number(5);
$number2 = new Number(6.1);
var_dump($number2->type());

$calculator = new Calculator();
var_dump($calculator->addNumbers($number1, $number2));
var_dump($calculator->addNumbers($number1, $number2)->getResult());
