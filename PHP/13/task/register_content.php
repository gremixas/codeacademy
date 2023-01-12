<?php
// 1.3. register_contest.php yra funkcija validateData(), kuri priima $_POST perduotų duomenų
// masyvą ir patikrina, ar duomenys visi duomenys užpildyti.

// Funkcija grąžina "stringa".

// processData() panaudoja validateData(), kad patikrintų visi laukai užpildyti.
// Jei iš validateData() gaunamas pranešimas, kad kažkas neužpildyta,tekstas perduodamas
// kaip žinutė atgal į formą: "Neužpildyti duomenys: name, age";

include_once(__DIR__ . "/dump.php");

$post = $_POST;

function validateData($data): array {
    $errorMsg = [];
    foreach ($data as $key => $value) {
        if (!$value) {
            $errorMsg[$key] = "Neuzpildytas laukelis: $key";
        }
    }
    return $errorMsg;
}

function processData($post): void {

    $oldData = json_encode($post);

    $status = 1;
    $message = json_encode(["Viskas OK"]);
    $err = validateData($post);
    if (!empty($err)) {
        $status = 0;
        $message = json_encode($err);
    }
    header("Location: pet.php?status=$status&message=$message&old_data=$oldData");
}

processData($post);

