<?php

$filePath = __DIR__ . "/pets.json";

function getPets(string $filePath): array {
    return json_decode(file_get_contents($filePath), true) ?? [];
}

function getPet($arr, $id): array {
    return array_values(array_filter($arr, fn($pet) => $pet['id'] == $id))[0];
}

function createRecord(string $filePath, array $pet_info): int {
    $pets = getPets($filePath);
    $allIds = array_column($pets, "id") ?? [1];
    $newId = !empty($allIds) ? (max($allIds) + 1) : 1;
    $pet_info['id'] = $newId;
    $pets[] = $pet_info;
    file_put_contents($filePath, json_encode($pets));
    return $newId;
}
// createRecord($filePath, ["", 0, "", "", 0, 0]);

function deleteRecord(string $filePath, int $id): int {
    $pets = getPets($filePath);
    $filteredPets = array_values(array_filter($pets, fn($pet) => $pet['id'] != $id));
    file_put_contents($filePath, json_encode($filteredPets));
    return $id;
}

function updateRecord(string $filePath, $pet_info): int {
    $pets = getPets($filePath);
    $idInFile = -1;
    foreach ($pets as $key => $value) {
        if ($value['id'] == $pet_info['id']) {
            $idInFile = $key;
            $pets[$key] = $pet_info;
            file_put_contents($filePath, json_encode($pets));
        }
    }
    return $idInFile;
}

?>