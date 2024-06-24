<?php
// use function CommonMark\Render\HTML;

include_once(__DIR__ . "/pet_functions.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script defer src="main.js"></script>
</head>
<body>
    <main>
        <div class="header">
            <a href="create_pet.php">Įtraukti gyvuną</a>
        </div>
        <section class="cards">
            <?php
            $pets = getPets($filePath);
            foreach ($pets as $pet) {
                echo "<article data={$pet['id']}>
                        <div class=image>
                            <img src='https://loremflickr.com/".rand(600, 680)."/".rand(460, 500)."/animals'>
                            <div class=links>
                                <a href='update_pet.php?id={$pet['id']}'>Update pet</a>
                                <a href='delete_pet.php?id={$pet['id']}'>Delete pet</a>
                            </div>
                        </div>
                        <div class=pet_info>
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
                    </article>";
            }
            ?>
        </section>
    </main>
</body>
</html>
