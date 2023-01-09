<?php
/*
4 RANDOM USER

Sukurti 2 php failus  lucky_user.php, randomizer.php.
lucky_user.php turi linką pavadinimu "Pick User", kuris veda į kitą failą randomizer.php.

randomizer.php turi funkciją, kuri yra iškviečiama iškarto.

Funkcijoje yra useriu masyvas, sudarytas iš vardų:

[
    'Virgis',
    'Algis',
    'Laura',
    'Matas',
    'Toma',
    'Rasa',
    'Liudas',
    'Edmis'
]

Funkcija atsitiktiniu būtų ištraukia iš masyvo vardą ir jį grąžina.

Funkcija inicijuojama ir jos rezultatas priskiriamas kintamajam $result, ir perduodamas į header() funkciją,
kuri automatiškai grąžina į lucky_user.php, su parametru name.
PVZ.: header("Location: lucky_user.php?name=$result");

lucky_user.php faile yra php kodas, kuris analizuoja ar urle yra parametras name, jei yra -
atvaizduoja jo išrinktą vardą.

*/

if(isset($_GET['name']) && $_GET['name']) {
    echo "<h2>".$_GET['name']."</h2>";
} else {
    echo "<a href=randomizer.php>Pick User</a>";
}