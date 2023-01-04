<?php

// $globalVar = '123';
// function myFirstFunction () {
//     global $globalVar;
//     return $globalVar;
//     $localVar1 = '1';
//     $localVar2 = '2';
//     $localVar3 = '3';
// }
// echo myFirstFunction();
// echo $localVar1;

// function one() {
//     function oneAndAHalf () {
//         return '123';
//     }
// }
// one();
// echo oneAndAHalf();

// $two = 0;
// function two() {
//     global $two;
//     $two++;
//     echo "two\t$two\n";
//     usleep(100000);
//     three();
// }
// function three() {
//     global $two;
//     $two += 2;
//     echo "three\t$two\n";
//     usleep(100000);
//     two();
// }
// two();//infinite loop between functions

// function test() {
//     return "123";
// }
// $viensDuTrys = test();

// echo $viensDuTrys;

// function fullName($firstName, $lastName):string {
//     return "$firstName $lastName\n";
// }
// echo fullName(2, 1);
// echo fullName(true, false);
// echo fullName('Jonas', 'Petraitis');

declare(strict_types = 1);

function myCar(string $make, string $model, int $year = 0) {
    return $year > 1900 && $year <= date("Y") ? "$make: $model ($year)\n" : "$make: $model\n";
}
echo myCar("Mazda", "MX5", 2001);
echo myCar("Opel", "Manta");
echo myCar("Toyota", "MR2", (int)"2000");
echo myCar(model: "Passat", year: (int)"2015", make: "VW");

$asdf = fn($x, $y) => "\n{$x}456$y\n";
echo $asdf(123, 789);

function echoMore($whatToEcho) {
    echo "\n*$whatToEcho*\n";
}
// echoMore("Pompastika!");

function lotsOfNewLines($howMany) {
    $newLines = "";
    for ($i = 0; $i < $howMany; $i++) {
        $newLines .= "\n";
    }
    return $newLines;
}
// echo "\nAll I need is" . lotsOfNewLines(5) . "more newLines.\n";

// Editos
// for ($i = 1; $i < 91; $i++) {
//     if ($i % 5 == 0) {
//         if ($i % 2) {
//             echo "*\n";
//         } else {
//             echo "$i\n";
//         }
//     } elseif ($i % 2) {
//         echo "* |";
//     } else {
//         echo $i < 9 ? "$i |" : "$i|";
//     }
// }

echo date("Y");
echo "\n";
echo time();
echo "\n";
echo date_diff(date_create(), date_create('1937-12-22'))->y;