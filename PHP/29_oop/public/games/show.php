<?php

require_once __DIR__ . "/../../vendor/autoload.php";

use App\Game;

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    (new Game)->show((int)$_GET['id']);
} else {
    die("fuck off");
}
