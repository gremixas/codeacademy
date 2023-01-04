<?php
//5/3
function exercise1(): int
{
    /*
    Pasinaudodami masyvo operatoriumi paimkite elementą, kurio reikšmė yra 99 ir grąžinkite tą reikšmę iš funkcijos.
    */
    $numbers = [
        [0, 1],
        [1, 0, 2],
        [
            0,
            [
                0, 1, 99
            ],
        ],
    ];
    return $numbers[2][1][2];
}
print_r(exercise1());
echo "\n";
//5/4
function exercise2(): int
{
    /*
    Pasinaudodami masyvo operatoriumi [] paimkite elementą, kurio reikšmė yra 99 ir grąžinkite tą reikšmę iš funkcijos.
    */

    $numbers = [
        'first' => [0, 1],
        'third' => [1, 0, 2],
        'fourth' => [
            'value_1' => 0,
            'value_2' => [
                'zero' => 0, 'one' => 1, 'ninetynine' => 99
            ],
        ],
    ];
    return $numbers['fourth']['value_2']['ninetynine'];
}
print_r(exercise2());
echo "\n";
//5/8
function exercise3(): array
{
    /*
    Sunaikinkitę visas reikšmes, kurios dalijasi 2 ir grąžinkite masyvą
    Turėtumėte gauti masyvą: ['one' => 1, 'three' => 3, 'five' => 5]
    */

    $numbers = ['ninety' => 90, 'one' => 1, 'two' => 2, 'three' => 3, 'four' => 4, 'five' => 5];
    foreach ($numbers as $number => $value) {
        if ($value % 2 == 0) {
            unset($numbers[$number]);
        }
    }
    return $numbers;
}
print_r(exercise3());
echo "\n";
//5/9
function exercise4(int $start, int $end): void
{
    /*
    Išspausdinkite skaičius nuo $start iki $end pasinaudodami ciklu.
    Jeigu $start yra daugiau nei $end, funkcija nieko nespausdina.
    */
    // if ($start < $end) {
        for ($i=$start; $i <= $end; $i++) { 
            echo "$i\n";
        }
    // }
}
exercise4(8, 5);//nieko
exercise4(5, 8);//5678
echo "\n";
//6/6
function exercise5(): int
{
    /*
    Suskaičiuokite ir grąžinkite bendrą užsakymo sumą.
    Prekėms, kurių pavadinimai nurodyti masyve $lowPriceItems, taikykite kainą 'priceLow'.
    Kitoms prekėms taikykite kainą 'priceRegular'. Panaudokite ciklus ir PHP fn in_array()
   
    */

    $lowPriceItems = ['t-shirt', 'shoes'];

    $orderItems = [
        [
            'name' => 't-shirt',
            'priceRegular' => 15,
            'priceLow' => 13,
            'quantity' => 3,
        ],
        [
            'name' => 'coat',
            'priceRegular' => 74,
            'priceLow' => 60,
            'quantity' => 6,
        ],
        [
            'name' => 'shirt',
            'priceRegular' => 25,
            'priceLow' => 20,
            'quantity' => 2,
        ],
        [
            'name' => 'shoes',
            'priceRegular' => 115,
            'priceLow' => 100,
            'quantity' => 1,
        ],
    ];
    $sum = 0;
    foreach ($orderItems as $item) {
        if (in_array($item['name'], $lowPriceItems)) {
            $sum += $item['priceLow'] * $item['quantity'];
        } else {
            $sum += $item['priceRegular'] * $item['quantity'];
        }
    }
    return $sum;
}
echo exercise5();
echo "\n";
