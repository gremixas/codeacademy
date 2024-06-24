<?php

$filePath = __DIR__ . "/transport.json";

$vehicles = json_decode(file_get_contents($filePath), true);

foreach ($vehicles as $vehicle) {
    echo "<a href=show.php?id=" . $vehicle['id'] . ">" . $vehicle['name'] . "</a><br>";
}

