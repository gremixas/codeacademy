<?php

namespace src;

date_default_timezone_set("Europe/Vilnius");

class Inventory {
    public const LOG_FILE_PATH = __DIR__ . "/../logs/log.txt";
    public const INVENTORY_FILE_PATH = __DIR__ . "/../database/inventory.json";

    public function __construct(public array $inventoryData = [])
    {
        if (empty($data)){
            $this->setInventory(); 
        }
    }

    public function checkInventory(string $checkString): void
    {
        $args = explode(",", $checkString);

        foreach ($args as $arg)
        {
            [$id, $quantity] = explode(':', $arg);
            $product = array_values(array_filter($this->inventoryData, fn($product) => $product['product_id'] == $id))[0] ?? [];

            if (empty($product))
            {
                $msg = "product id=" . $id . " is not in the inventory";
                $this->logError($msg);
                throw new InventoryException($msg);
            }
            if ($product['quantity'] < $quantity)
            {
                $msg = "product id=" . $product['product_id'] . " -> " . $product['name'] . " <- only has " . $product['quantity'] . " items in the inventory";
                $this->logError($msg);
                throw new InventoryException($msg);
            }
        }
    }

    public function logError(string $text): string
    {
        $logFile = file_exists(self::LOG_FILE_PATH) ? file_get_contents(self::LOG_FILE_PATH) : "";
        $logEntry = date('Y-m-d H:i:s ') . $text . PHP_EOL;
        file_put_contents(self::LOG_FILE_PATH, $logFile . $logEntry);
        return $text;
    }

    public function setInventory():void
    {
        $this->inventoryData = json_decode(file_get_contents(self::INVENTORY_FILE_PATH), true);
    }
}
