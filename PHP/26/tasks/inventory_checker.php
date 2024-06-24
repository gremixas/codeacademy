<?php

declare(strict_types=1);

date_default_timezone_set("Europe/Vilnius");

$inventoryFilePath = __DIR__ . "/inventory.json";

class InventoryException extends \Exception{}
class InputValidationException extends \Exception{}

class Inventory {
    public string $logFilePath = __DIR__ . "/log.txt";

    public function checkInventory(array $data): void
    {
        global $argv;
        
        $args = explode(",", $argv[1]);

        foreach ($args as $arg)
        {
            [$id, $quantity] = explode(':', $arg);
            $product = array_values(array_filter($data, fn($product) => $product['product_id'] == $id))[0] ?? [];

            if (empty($product))
            {
                throw new InventoryException("product id=" . $id . " is not in the inventory");
            }
            if ($product['quantity'] < $quantity)
            {
                throw new InventoryException("product id=" . $product['product_id'] . " -> " . $product['name'] . " <- only has " . $product['quantity'] . " items in the inventory");
            }
        }
        echo "all products have the requested quantity in stock" . PHP_EOL;
    }

    public function logError(string $text): string
    {
        $logFile = file_exists($this->logFilePath) ? file_get_contents($this->logFilePath) : "";
        $logEntry = date('Y-m-d H:i:s ') . $text . PHP_EOL;
        file_put_contents($this->logFilePath, $logFile . $logEntry);
        return $text;
    }
}

class InputValidation {
    public function checkSyntax(): void
    {
        global $argv;
        $chkPar = $argv[1] ?? "";
        $args = explode(",", $chkPar);
        foreach ($args as $arg)
        {
            $variables = explode(':', $arg);
            $id = $variables[0] ?? null;
            $quantity = $variables[1] ?? null;

            if (!is_numeric($id) || !is_numeric($quantity))
            {
                throw new InputValidationException("Invalid input " . $chkPar . ". Format: id:quantity,id:quantity");
            }
        }
    }
}

$inventory = new Inventory();
$inputvalidation = new InputValidation();

try {
    $inputvalidation->checkSyntax();
    $inventory->checkInventory(json_decode(file_get_contents($inventoryFilePath), true));
} catch (InputValidationException $e) {
    echo $e->getMessage();
} catch (InventoryException $e) {
    echo $inventory->logError($e->getMessage());
}


/*
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
*/

/*
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
Invalid input "3,2:2,5:1". Format: id:quantity,id:quantity
*/