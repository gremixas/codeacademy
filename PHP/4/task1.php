<?php

$howMuch = 10;

for ($i = $howMuch; $i > 0; $i--) {
    for ($j = 0; $j < $howMuch; $j++) {
        if ($i <= $j) {
            echo "*";
        } else {
            echo "-";
        }
    }
    for ($k = $howMuch; $k >= 0; $k--) {
        if ($i > $k) {
            echo "-";
        } else {
            echo "*";
        }
    }
    echo "\n";
}
