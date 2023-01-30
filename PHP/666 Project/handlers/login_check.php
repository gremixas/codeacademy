<?php

function loginCheck() {
    $token = $_SESSION['token'] ?? "";
    $user = User::findUserByToken($token);
    
    if (!empty($user)) {
        $_SESSION['first_name'] = $user['first_name'];
        return 1;
    } else {
        $_SESSION['first_name'] = "Username";
        return 0;
    }

}

function adminCheck() {
    $token = $_SESSION['token'] ?? "";
    $user = User::findUserByToken($token);
    
    if (isset($user['admin']) && $user['admin'] === "yes") {
        return 1;
    } else {
        return 0;
    }

}