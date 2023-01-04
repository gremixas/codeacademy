<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .square {
            height: 100px;
            width: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            font-weight: 800;
            text-transform: capitalize;
        }
        .red {
            background-color: red;
        }
        .blue {
            background-color: blue;
        }
        .green {
            background-color: green;
        }
    </style>
</head>
<body>
    <?php
    $class = "red";
    $text = "raudona";
    require "square.php";
    $class = "blue";
    $text = "mėlyna";
    require "square.php";
    $class = "green";
    $text = "žalia";
    require "square.php";

    require_once "functions.php";
    ?>
    <h1><?=theBestBite("spider")?></h1>
    <h2><?=theBestBite("rat")?></h2>
    <h3><?=theBestBite("mouse")?></h3>
</body>
</html>