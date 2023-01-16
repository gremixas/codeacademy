<?php

$filePath = __DIR__ . "/pets.json";

function getPets(string $filePath): array {
    return json_decode(file_get_contents($filePath), true) ?? [];
}

function getPet(array $arr, $id): array {
    return array_values(array_filter($arr, fn($pet) => $pet['id'] == $id))[0];
}

function createRecord(string $filePath, array $petInfo): int {
    $pets = getPets($filePath);
    $allIds = array_column($pets, "id");
    $newId = !empty($allIds) ? (max($allIds) + 1) : 1;
    $petInfo['id'] = $newId;
    $pets[] = $petInfo;
    file_put_contents($filePath, json_encode($pets));
    return $newId;
}

function deleteRecord(string $filePath, int $id): int {
    $pets = getPets($filePath);
    $filteredPets = array_values(array_filter($pets, fn($pet) => $pet['id'] != $id));
    file_put_contents($filePath, json_encode($filteredPets));
    return $id;
}

function updateRecord(string $filePath, array $petInfo): int {
    $pets = getPets($filePath);
    $idInFile = -1;
    foreach ($pets as $key => $pet) {
        if ($pet['id'] == $petInfo['id']) {
            $idInFile = $key;
            $pets[$key] = $petInfo;
        }
    }
    file_put_contents($filePath, json_encode($pets));
    return $idInFile;
}

?>