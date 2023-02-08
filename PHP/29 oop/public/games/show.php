<?php

require_once __DIR__ . "/../../autoload/autoloader.php";

use src\Game;

if (isset($_GET['id']) && $_GET['id'] !== "") {
    (new Game)->show($_GET['id']);
} else {
    die("fuck off");
}
