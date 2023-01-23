<?php
include_once(__DIR__ . "/../dump.php");

session_start();
// $_SESSION['pets'] = json_decode(file_get_contents(__DIR__ . "/../Pets/pets.json"), true);
dump($_SESSION);

