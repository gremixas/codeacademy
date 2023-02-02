<?php

spl_autoload_register(function ($className) {
    echo $className . PHP_EOL;
    // die();
    require __DIR__. "\\..\\$className.php";
});

// require_once __DIR__ . "/../src/Game.php";
// require_once __DIR__ . "/../src/test/Game.php";

// use src\Game as GameOne;
// use src\test\Game as GameTwo;

// $game = new GameOne("Zaidimas");
// $game2 = new GameTwo("Geiiimas");

$game = new src\Game("Zaidimas");
$game2 = new src\test\Game("Geiiimas");



print_r($game->getTitle() . PHP_EOL);
print_r($game2->getTitle() . PHP_EOL);
