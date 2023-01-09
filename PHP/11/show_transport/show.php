<?php
function findVehicle(int $id): array {
    $filePath = __DIR__ . "/transport.json";
    $vehicles = json_decode(file_get_contents($filePath), true);
    $vehicle = array_filter(array_filter($vehicles, fn($vehicle) => $vehicle['id'] === $id));
    return $vehicle;
}

if (isset($_GET['id']) && $_GET['id']) {
    $vehicle = findVehicle($_GET['id']);
    if (isset($vehicle) && $vehicle) {
        foreach ($vehicle[$_GET['id'] - 1] as $property) {
            echo "<h2>".$property."</h2>";
        }
    } else {
        echo "<h2>Transport not found</h2>";
    }
}

