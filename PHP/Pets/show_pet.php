<?php
include_once(__DIR__ . "/dump.php");
include_once(__DIR__ . "/pet_functions.php");

if (isset($_GET['id'])) {
    $pet = getPet(getPets($filePath), $_GET['id']);
    if (empty($pet)) {
        die;
    }
} else {
    die;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?=
    "<article>
        <img src='https://loremflickr.com/".rand(460, 500)."/".rand(460, 500)."'/animals'>
        <div>
            <h3>{$pet['name']}</h3>
            <div class=row>
                <span>Amžius:</span><span>{$pet['age']}</span>
            </div>
            <div class=row>
                <span>Veislė:</span><span>{$pet['breed']}</span>
            </div>
            <div class=row>
                <span>Rūšis:</span><span>{$pet['kind']}</span>
            </div>
            <div class=row>
                <span>Srovis:</span><span>{$pet['weight']}</span>
            </div>
            <div class=row>
                <span>Ūgis:</span><span>{$pet['height']}</span>
            </div>
        </div>
        <a href='update_pet.php?id={$pet['id']}'>Update pet</a>
        <a href='delete_pet.php?id={$pet['id']}'>Delete pet</a>
    </article>";
    ?>
</body>
</html>

