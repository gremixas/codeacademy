<?php
// 2. PING PONG
// Sukurti 2 failius ping.php ir pong.php.
// Failas ping.php turi nuorodą į pong.php, su parametru ping=1
// Failas pong.php turi kodą, kuris tikrina ar $_GET masyvas turi
// "ping" parametrą. Jei "ping" parametras yra, pong.php automatiškai
// grąžina atgal į ping.php, naudodama funkciją header(), kurioje nurodo
// adresą ir parametrą pong=1.
// Funkcija header() sukuria GET užklausą į nurodytą adresą.
// Pvz.: header("Location somepage.php?param=1");
// ping.php turi kodą, kuris tikrina ar url'e yra parametras "pong".
// Jei parametras yra, tuomet išspaudina tekstą "PONG!" ir atvaizduoja
// nuorodą "reset", kuri panaikinta parametrus url'e ir grąžina puslapį
// į pradinę būseną.


if (isset($_GET['pong']) && $_GET['pong'] === "1") {
    echo "PONG!<br>";
    echo "<a href=ping.php>reset</a><br>";
} else {
    echo "<a href=pong.php?ping=1>pong</a><br>";
}