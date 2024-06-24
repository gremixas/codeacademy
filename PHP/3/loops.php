<?php

$then = microtime(true);

for ($i = 0; true; $i++) {
    if ($i == 5) {
        continue;
    }

    echo "$i\n";

    if ($i >= 10) {
        break;
    }
}

$now = microtime(true);
$elapsed = $now - $then;

echo "$elapsed\n";


echo "\nforeach\n";
$arr = [1, 3, 4, 6, 7, 8, 12];

foreach ($arr as $key => $item) {
    echo "$key: $item    ";
}

$first = 'pirmas';

$pirmas = "\n\nVa ko as noriu!\n";

echo $$first;

?>