<?php
include_once(__DIR__ . "/app.php");

if ($_SERVER['REQUEST_METHOD'] != "GET") {
    http_response_code("405");
}

if (!adminCheck()) {
    print_r("Who the fuck are you?");
    header("location: login_form.php");
}

if (!isset($_GET['id'])) {
    die("ID nereikia?");
} else {
    $imageFile = Car::findCarById($_GET['id'])['image'];
    unlink(__DIR__ . "/car_images\/" . $imageFile);
    Car::deleteCarById($_GET['id']);
    Validate::setSuccessMessage("Deleted.");
    header("location: index.php");
}
