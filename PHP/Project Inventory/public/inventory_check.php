<?php

declare(strict_types=1);

require_once __DIR__ . "/../autoload/autoloader.php";

use src\Inventory;
use src\InventoryException;
use src\InputValidation;
use src\InputValidationException;

// const INVENTORY_FILE_PATH = __DIR__ . "/../database/inventory.json";
const INVENTORY_FILE_PATH = __DIR__ . "/../database/inventory2.json";

$checkString = "";
$msg = "nothing happened.";

if (isset($_POST['check']) && $_POST['check'] !== "") {
    $checkString = $_POST['check'];
} else {
    die("POST some check values");
}

try {
    (new InputValidation())->checkSyntax($checkString);
    (new Inventory())->checkInventory($checkString);
    // (new Inventory(json_decode(file_get_contents(INVENTORY_FILE_PATH), true)))->checkInventory($checkString);
    $msg = "all products have the requested quantity in stock";
} catch (InputValidationException $e) {
    $msg = $e->getMessage();
} catch (InventoryException $e) {
    $msg = $e->getMessage();
}

header("Location: index.php?msg=" . $msg);
