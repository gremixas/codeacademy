<?php
/*
    1 Array

    Sunaikinkitę visus elementus, kurių reikšmė yra 'error' ir grąžinkite pamodifikuotą masyvą.
    Tikėkitės, kad $products masyvo narių skaičius gali varijuoti, tad naudokite ciklą.
*/

function exercise1(): array
{
    $products = [
        'item_1' => 'desk',
        'item_2' => 'lamp',
        'item_3' => 'error',
        'item_4' => 'sofa',
        'item_5' => 'error',
    ];

    return array_filter($products, fn($product) => $product !== 'error');
}
print_r(exercise1());

/*
2. POWER

Sukurkite funkciją, kuri pakelia skaičių bet kokiu laipsniu.
Funkcija priima skaičių ir laipsnį, kuriuo reikia pakelti
Panaudokite ciklą.
*/
function exercise2(int $number, int $power): int
{
    return $number ** $power;
}
print_r(exercise2(2, 3));

