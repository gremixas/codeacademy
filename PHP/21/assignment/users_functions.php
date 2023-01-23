<?php

include_once(__DIR__ . "/../../dump.php");

$filePath = __DIR__ . "/users.json";

function processData($post): void {

    $oldData = json_encode($post);

    $status = 1;
    $message = json_encode(["Viskas OK"]);
    $err = validateData($post);
    if (!empty($err)) {
        $status = 0;
        $message = json_encode($err);
    }
    header("Location: add_user_form.php?status=$status&message=$message&old_data=$oldData");
}

function validateData($data): array {
    $errorMsg = [];
    foreach ($data as $key => $value) {
        if (!$value) {
            $errorMsg[$key] = "Neužpildytas laukelis: $key";
        }
    }
    return $errorMsg;
}

function createRecord(string $filePath, array $userInfo): int {
    $users = getUsers($filePath);
    $allIds = array_column($users, "id");
    $newId = !empty($allIds) ? (max($allIds) + 1) : 1;
    $userInfo['id'] = $newId;
    $users[] = $userInfo;
    file_put_contents($filePath, json_encode($users));
    return $newId;
}

function getUsers(string $filePath): array {
    return json_decode(file_get_contents($filePath), true) ?? [];
}

function showUsers(array $arr): string {
    $output = "";
    foreach ($arr as $user) {
        $output .= "<div class='user'>
                        <img class='profile_photo' src='https://loremflickr.com/".rand(200, 300)."/".rand(200, 300)."/human+face'>
                        <span class='full_name'>{$user['first_name']} {$user['last_name']}</span>
                        <div class='user_info_line'>
                            <span>Amžius:</span>
                            <span class='age'>{$user['age']}</span>
                        </div>
                        <div class='user_info_line'>
                            <span>Šalis:</span>
                            <span class='country'>{$user['country']}</span>
                        </div>
                    </div>";
    }
    return $output;
}