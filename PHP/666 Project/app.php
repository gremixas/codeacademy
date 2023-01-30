<?php
declare(strict_types=1);

const CARS_FILE_PATH = __DIR__ . "/db/cars.json";
const USERS_FILE_PATH = __DIR__ . "/db/users.json";

if (session_status() === 1) {
    session_start();
} else {
    session_destroy();
    session_start();
}

include_once(__DIR__ . "/../dump.php");
include_once(__DIR__ . "/handlers/message.php");
include_once(__DIR__ . "/handlers/user.php");
include_once(__DIR__ . "/handlers/car.php");
include_once(__DIR__ . "/handlers/database.php");
include_once(__DIR__ . "/handlers/login_check.php");
include_once(__DIR__ . "/handlers/validate.php");

$userLoggedIn = loginCheck();
$adminLoggedIn = adminCheck();
// dump($userLoggedIn);
// dump($adminLoggedIn);

$currentUserName = $_SESSION['first_name'];

