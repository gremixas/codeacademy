<?php

declare(strict_types=1);

// Visur sudėkite reikiamus parametrų bei return tipus

/*
1. Parašykite funkciją 'dividesBy5', kuri priimtų int tipo skaičių ir grąžintų jo dalybos iš 5 liekaną.
*/
function dividesBy5($number):int {
    return $number % 5;
}
echo dividesBy5(9);
echo "\n";
/*
2. Parašykite funkciją 'arrayPrinter', kuri priimtų array tipo parametrą ir
išspausdintų kiekvieną masyvo elementą naujoje eilutėje.

Funkcijos kvietimas: arrayPrinter(['some text', 'another text'])
Funkcija grąžina: funkcija nieko negrąžina - ji tik išspausdina masyvą į terminalą:
'some text'
'another text'
...
*/
function arrayPrinter($arr):string {
    $buf = "";
    foreach($arr as $item) {
        $buf .= "$item\n";
    }
    return $buf;
}
echo arrayPrinter([1, 2, 3]);
/*
3. Parašykite funkciją 'stringEnhancer', kuri grąžintų pakeistą tekstą.

Funkcijos kvietimas: stringEnhancer('some text', '##')
Funkcija grąžina: '##some text##'

Funkcijos kvietimas: stringEnhancer('some text')
Funkcija grąžina: '**some text**'
*/
function stringEnhancer($text, $modifier = "**"):string {
    return "$modifier$text$modifier\n";
}
echo stringEnhancer('some text', '##');//'##some text##'
echo stringEnhancer('some text');//'**some text**'
/*
4. Parašykite funkciją 'stringModifier', kuri pamodifikuotų paduotą string tipo kintamąjį.

Funkcijos kvietimas:
$x = 'some text';
stringModifier($x, '##');
echo $x; // '##some text##'

Funkcija grąžina: funkcija nieko negrąžina

*/
function stringModifier(&$variable, $modifier = ""):void {
    $variable = "$modifier$variable$modifier";
}
$x = 'some text';
stringModifier($x, '##');
echo $x; // '##some text##'
echo "\n";
/*
5. Parašykite funkciją 'textReplicator', kuri grąžintų 'padaugintą' tekstą.

Funkcijos kvietimas:
textReplicator('some_text', 3);

Funkcija grąžina: 'some_text-some_text-some_text'

Funkcijos kvietimas:
textReplicator('some_text', null);

Funkcija grąžina: 'some_text'
*/
function textReplicator($text, $repeat):string {
    $buf = "";
    if ($repeat > 1) {
        for ($i = 0; $i < $repeat; $i++){
            $buf .= $i < $repeat - 1 ? "$text-" : $text;
        }
        return "$buf\n";
    } else {
        return "$text\n";
    }
}
echo textReplicator('some_text', 3);//'some_text-some_text-some_text'
echo textReplicator('some_text', 2);//'some_text-some_text'
echo textReplicator('some_text', 1);//'some_text'
echo textReplicator('some_text', null);//'some_text'
/*
6. Paverskite funkciją 'textReplicator', į veikiančią anoniminę funkciją.
*/
$textReplicator2 = function($text, $repeat):string {
    $buf = "";
    if ($repeat > 1) {
        for ($i = 0; $i < $repeat; $i++){
            $buf .= $i < $repeat - 1 ? "$text-" : $text;
        }
        return "$buf\n";
    } else {
        return "$text\n";
    }
};
echo $textReplicator2('some_text', 3);//'some_text-some_text-some_text'
echo $textReplicator2('some_text', null);//'some_text'
/*
7. Parašykite funkciją, kuri spausdintų šią struktūrą. Funkcijai turi būti paduodama skaičius, kuris nurodys
kiek lygių turi būti spausdinama. Pavyzdžio atveju, tas skaičius yra 5.
    1
   222
  33333
 4444444
555555555
*/
function christmasTree($howTall):void {
    for ($i = 1; $i <= $howTall; $i++){
        for ($j = 1; $j < $howTall + $i; $j++) {
            if ($j >= $howTall - $i + 1) {
                echo $i;
            } else {
                echo " ";
            }
        }
        echo "\n";
    }
}
christmasTree(5);
/*
8. Parašykite funkciją, kuri leistų vartotojui spėti, kokį random skaičių sugeneravo scriptas. Atspėjus, outputas turi
informuoti, kiek spėjimų buvo padaryta.
Input'ui iš vartotojo gauti naudokite funkciją 'readline' - https://www.php.net/manual/en/function.readline.php
Atsitiktiniam skaičiui generuoti naudokite funkciją 'rand' - https://www.php.net/manual/en/function.rand.php

Kvietimo pavyzdys:
php -f exercises.php

Įveskite galimų skaičių intervalo galq: 10
Spėkite skaičių: 5
Aukščiau!

Spėkite skaičių: 9
Žemiau!

Spėkite skaičių: 8
Teisingai! Panaudota spėjimų - 2
*/
function guessingGame():void {
    $maxNum = readline("Įveskite galimų skaičių intervalo galą: ");
    $random = rand(1, (int)$maxNum);
    $input = null;
    $wrongAnswers = 0;
    while($input != $random) {
        $wrongAnswers++;
        $input = readline("Spėkite skaičių: ");
        if ($input < $random) {
            echo "Aukščiau!\n";
        } else if ($input > $random) {
            echo "Žemiau!\n";
        }
    }
    echo "Teisingai! Panaudota spėjimų - $wrongAnswers\n"; 
}
guessingGame();
