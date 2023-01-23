<?php
/*
Sukurkite klasę, kuri skaičiuotų keturkampio plotą, perimetrą ir įstrižainę.
Klasės pavadinimas: Rectangle
Į konstruktorių paduodama: int $length, int $width
Metodai:
- calculateArea()
- calculatePerimeter()
- calculateDiagonal()
Metodai turi grąžinti suapvalintą (į viršų) int tipo reikšmę. Pridėkite return tipą metodams.
*/

include_once "../../dump.php";

class Rectangle {
    public function __construct(
        public int $length = 1,
        public int $width = 1
        ) {}
    public function calculateArea() {
        return "Area:\t\t" . $this->length * $this->width;
    }
    public function calculatePerimeter() {
        return "Perimeter:\t" . ($this->length + $this->width) * 2;
    }
    public function calculateDiagonal() {
        return "Diagonal:\t" . number_format(sqrt(($this->length ** 2) + ($this->width ** 2)), 2);
    }
}

$rectangle = new Rectangle(3, 5);

dump($rectangle->calculateArea());
dump($rectangle->calculatePerimeter());
dump($rectangle->calculateDiagonal());
