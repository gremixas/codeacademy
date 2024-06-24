<?php

require_once __DIR__ . "/../../vendor/autoload.php";

use App\Game;

(new Game)->store($_POST);

