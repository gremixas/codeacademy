<?php

$filePath = __DIR__ . "/pets.json";

function getPets(string $filePath): array {
    return json_decode(file_get_contents($filePath), true) ?? [];
}

function getPet($arr, $id): array {
    return array_values(array_filter($arr, fn($pet) => $pet['id'] == $id))[0];
}

function createRecord(string $filePath, string $name, int $age, string $breed, string $kind, int $weight, int $height): int {
    $pets = getPets($filePath);
    $allIds = array_reduce($pets, function ($acc, $pet) {
        $acc[] = $pet['id'];
        return $acc;
    });
    $newId = max($allIds) + 1;
    $newPet = [
        "id" => $newId,
        "name" => $name,
        "age" => $age,
        "breed" => $breed,
        "kind" => $kind,
        "weight" => $weight,
        "height" => $height
    ];
    array_push($pets, $newPet);
    print_r($pets);
    file_put_contents($filePath, json_encode($pets));
    return $newId;
}

function deleteRecord(string $filePath, int $id): int {
    $pets = getPets($filePath);
    $filteredPets = array_values(array_filter($pets, fn($pet) => $pet['id'] != $id));
    file_put_contents($filePath, json_encode($filteredPets));
    return $id;
}

function updateRecord(string $filePath, int $id, string $name, int $age, string $breed, string $kind, int $weight, int $height): int {
    $pets = getPets($filePath);
    $idInFile = -1;
    foreach ($pets as $key => $value) {
        if ($value['id'] == $id) {
            $idInFile = $key;
            $pets[$key]['name'] = $name;
            $pets[$key]['age'] = $age;
            $pets[$key]['breed'] = $breed;
            $pets[$key]['kind'] = $kind;
            $pets[$key]['weight'] = $weight;
            $pets[$key]['height'] = $height;
            file_put_contents($filePath, json_encode($pets));
        }
    }
    return $idInFile;
}

?>