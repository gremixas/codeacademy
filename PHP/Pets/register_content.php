<?php

include_once(__DIR__ . "/dump.php");
include_once(__DIR__ . "/pet_functions.php");

$post = $_POST;

function processData($post): void {

    $oldData = json_encode($post);

    $status = 1;
    $message = json_encode(["Viskas OK"]);
    $err = validateData($post);
    if (!empty($err)) {
        $status = 0;
        $message = json_encode($err);
    }
    header("Location: create_pet.php?status=$status&message=$message&old_data=$oldData");
}

processData($post);

function validateData($data): array {
    $errorMsg = [];
    foreach ($data as $key => $value) {
        if (!$value) {
            $errorMsg[$key] = "Neuzpildytas laukelis: $key";
        }
    }
    return $errorMsg;
}
