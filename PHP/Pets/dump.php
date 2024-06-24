<?php
// 1. DUMP

// https://php.watch/versions/8.1/spread-operator-string-array-keys
// Argument unpacking naudojant unpacking/spread operatoriu ...

// Iš kelių kintamųjų padaro verčių masyvą, o masyvą išpakuoja į atskiras vertes.
// Veikia funkcijų skliaustuose, tiek inicijuojant, tiek apibrėžiant funkciją.
// Tai pat masyvų viduje.

// Sukurti helpers.php failą.

// Parašyti 2 funkcijas dump(); ir dd(); - vadinama "dump and die"

// dump() - nieko negrąžina(neturi return).
// Jos paskirtis - išspausdinti perduotus duomenis tokiu būdų:
// pvz.: dump(['Labas','Krabas'], 123, 321, 'Viso gero');

// Atvaizduojama:

//     Array
//     (
//         [0] => Labas
//         [1] => Krabas
//     )
//     123
//     321
//     Viso gero

// Funkcijos argumentų skaičius yra neribotas.
// Tam pasiekti naudokite array unpacking/spread operatorių - ...
// dump() funkcija turi tik vieną parametrą su spread operatoriumi - ...$variables
// Pvz.: dump(...$variables){}

// Parašyktie kodą, kuris išspausdina visus variables duomenis su šiuo html
// "<pre>". print_r() ."</pre>";

// dd() - nieko negrąžina(neturi return).
// dd() funkcija taip pat priima tik 1 kintamąjį su spread operatoriumi.
// Su spread operatoriumi ...$variables
// Ji kviečia dump() ir inicijuoja die() funckiją.

function dump(...$variables): void {
    foreach ($variables as $variable) {
        echo "<pre>" . print_r($variable, true) . "</pre>";
    }
}

function dd(...$variables): void {
    dump(...$variables);
    die();
}

// dump(['Labas','Krabas'], 123, 321, 'Viso gero');
// dd(['Labas','Krabas'], 123, 321, 'Viso gero');