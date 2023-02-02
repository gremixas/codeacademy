<?php

require_once __DIR__ . "/../autoload/autoloader.php";

echo (new src\Movie("The"))->getMovie() . PHP_EOL;

use src\Movie;
echo (new Movie("Matrix"))->getMovie() . PHP_EOL;

use src\Movie as Film;
echo (new Film("The Matrix"))->getMovie() . PHP_EOL;

