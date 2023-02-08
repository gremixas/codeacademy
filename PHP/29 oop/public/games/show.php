<?php

require_once __DIR__ . "/../../autoload/autoloader.php";

use src\Game;

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    (new Game)->show((int)$_GET['id']);
} else {
    die("fuck off");
}
