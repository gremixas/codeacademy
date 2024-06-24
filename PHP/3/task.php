<?php

$lyginiai = "lyginiai: ";
$nelyginiai = "nelyginiai: ";
$countTo = 20;
$oddOrEven = "nelyginiai";
$oddArr = [];
$evenArr = [];

for ($i = 1; $i <= $countTo; $i++) {
    if ($i % 2) {
        $nelyginiai .= $i;
        $oddOrEven = "nelyginiai";
        array_push($oddArr, $i);
    } else {
        $lyginiai .= $i;
        $oddOrEven = "lyginiai";
        array_push($evenArr, $i);
    }
    if ($i != $countTo && $i != $countTo - 1) {
        $$oddOrEven .= ", ";
    }
}

echo "\n$nelyginiai;\n$lyginiai.\n";


$oddStr = '';
$evenStr = '';

foreach ($oddArr as $key => $value) {
    $oddStr .= $value;
    if (count($oddArr) - 1 != $key) {
        $oddStr .= ", ";
    }
}

foreach ($evenArr as $key => $value) {
    $evenStr .= $value;
    if (count($evenArr) - 1 != $key) {
        $evenStr .= ", ";
    }
}

echo "\nnelyginiai: $oddStr;\nlyginiai: $evenStr.\n"

?>