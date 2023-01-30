<?php
include_once(__DIR__ . "/app.php");

if ($_SERVER['REQUEST_METHOD'] != "GET") {
    http_response_code("405");
}

if ($adminLoggedIn && isset($_GET['id'])) {
    Car::deleteCarById($_GET['id']);
    header("location: index.php");
} else {
    print_r("Who the fuck are you?");
}
