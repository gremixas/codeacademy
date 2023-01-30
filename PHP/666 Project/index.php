<?php
include_once(__DIR__ . "/app.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rent</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Unbounded&display=swap" rel="stylesheet">
    <script defer src="./main.js"></script>
</head>
<body>
    <?php
    include_once(__DIR__ . "/header.php");
    ?>
    <main>
        <div class="banner">
            <div class="banner-text">Premium cars just for you</div>
        </div>
        <div class="car-list" id="car-list">
            <?= Car::drawCars($adminLoggedIn) ?>
        </div>
    </main>
    <footer id="footer">
        <?php
        include_once(__DIR__ . "/footer.php");
        ?>
    </footer>
    <script>
        const userLoggedIn = <?=$userLoggedIn?>;// transport PHP variable to JS
        const adminLoggedIn = <?=$adminLoggedIn?>;// Shitty solution? IDK... Probably.
    </script>
</body>
</html>
