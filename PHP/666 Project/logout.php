<?php
include_once(__DIR__ . "/app.php");

if ($_SERVER['REQUEST_METHOD'] != "POST") {
    http_response_code("405");
    header("Location: login_form.php");
}

if ($userLoggedIn && $_GET['logout'] == 1) {
    unset($_SESSION['token']);
    header("location: index.php");
}


