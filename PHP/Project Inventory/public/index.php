<?php

declare(strict_types=1);

require_once __DIR__ . "/../autoload/autoloader.php";

use src\Inventory;
use src\InventoryException;
use src\InputValidation;
use src\InputValidationException;

const INVENTORY_FILE_PATH = __DIR__ . "/../database/inventory.json";

// $inventory = new Inventory(json_decode(file_get_contents(INVENTORY_FILE_PATH), true));
$inventory = new Inventory();
$inputvalidation = new InputValidation();

if (isset($_GET['check']) && $_GET['check'] !== "") {
    $checkString = $_GET['check'];
} else {
    $checkString = $_GET['check'] = "1:3,2:2,4:1";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="get">
        <input type="text" name="check" value="<?= $_GET['check'] ?? "" ?>">
        <button type="submit">Check</button>
    </form>
    <div class="message">
        <?php
        try {
            $inputvalidation->checkSyntax($checkString);
            $inventory->checkInventory($checkString);
            echo "all products have the requested quantity in stock" . PHP_EOL;
        } catch (InputValidationException $e) {
            echo $e->getMessage();
        } catch (InventoryException $e) {
            echo $e->getMessage();
        }
        ?>
    </div>
</body>
</html>

<!-- 
2.1 Parašykite įrankį inventoriaus tikrinimui. Inventorių rasite faile "./inventory.json"
Programa turėtų veikti paduodant jai produkto id ir kiekio poras, atskirtas dvitaškiu. Pačios poros atskirtos kableliais:
Pvz.: php -f 2_inventory_checker.php "1:3,2:2,4:1" - reiškia, kad mes norime patikrinti, ar inventoriuje egzistuoja:
- produktas, kurio id yra 1, o kiekis 3
- produktas, kurio id yra 2, o kiekis 2
- produktas, kurio id yra 4, o kiekis 1
Jeigu paduotas produkto id neegzistuoja, arba nepakanka kiekio, į terminalą išspausdinkite pranešimą:
- product "15" is not in the inventory
- product "5" only has 0 items in the inventory
Pakaks spausdinti tik vieną klaidą apie inventoriaus neatitikimus, net jeigu tikrinami keli nevalidūs produktai.
Šalia klaidos pranešimo spausdinimo taip pat, įrašykite pranešimą apie šį įvykį į log'ą (log.txt)
Log'o įrašo formatas: 2020-01-01 15:15:15 product "15" is not in the inventory
Užduočiai įgyvendinti panaudokite exception'us.
Klasė, tikrinanti inventorių, turi mesti exception'us, o ją kviečiantis kodas - gaudyti. Naudokite savo custom
exception'o klasę (pvz.: InventoryException).
Programos kvietimo pavyzdys:
php -f 2_inventory_checker.php "1:3,2:2,5:1"
product "5" only has 0 items in the inventory
php -f 2_inventory_checker.php "1:3,2:2"
all products have the requested quantity in stock


2.2 Patobulinkite 2.1 užduoties įrankį - pridėkite inputo validatorių (atskira klasė)
Šis validatorius turi užfiksuoti, kad šie inputai nėra validūs:
- "q:3,2:2,5:1"
- "-:3,2:2,5:1"
- "3,2:2,5:1"
Kai užfiksuojamas nevalidus inputas, programa turi į komandinę eilutę išspausdinti šį pranešimą:
Invalid input "3,2:2,5:1". Format: id:quantity,id:quantity
Klaidingo inputo atveju į log'ą rašyti pranešimo nereikia.
Svarbu: Abi klasės (inventoriy checkeris ir input validatorius) turi būti kviečiami tame pačiame "try" bloke.
Naudokite savo custom exception'o klasę (pvz.: InputValidationException).
Programos kvietimo pavyzdys:
php -f 2_inventory_checker.php "3,2:2,5:1"
Invalid input "3,2:2,5:1". Format: id:quantity,id:quantity -->
