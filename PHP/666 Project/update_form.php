<?php
include_once(__DIR__ . "/app.php");

$carData = [];

if (empty($_GET['id'])) {
    die("ID nereikia?");
} else {
    $carData = Car::findCarById($_GET['id']);
    // dd($carData);
}

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
        <div class="car-update" id="car-list">
            <div class="update-dialog">
                <!-- <h2>Do you really wish to update this car?</h2> -->
                <!-- <br> -->
                <?= Car::drawCarById($_GET['id']) ?>
                <br>
                <form action="update.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?=$carData['id'] ?? ""?>">
                    <label>Make:</label>
                    <input type="text" name="make" value="<?=$carData['make'] ?? ""?>">
                    <label>Model:</label>
                    <input type="text" name="model" value="<?=$carData['model'] ?? ""?>">
                    <label>Year:</label>
                    <input type="text" name="year" value="<?=$carData['year'] ?? ""?>">
                    <label>Engine:</label>
                    <input type="text" name="engine" value="<?=$carData['engine'] ?? ""?>">
                    <label>Transmission:</label>
                    <input type="text" name="transmission" value="<?=$carData['transmission'] ?? ""?>">
                    <label>Price:</label>
                    <input type="text" name="price" value="<?=$carData['price'] ?? ""?>">
                    <input id="file" type="file" name="picture" accept=".jpg,.png"> 
                    <button type="submit">Update</button>
                </form>
            </div>
            <br>
            <div class="messages">
                <?php
                echo Messages::get();
                ?>
            </div>
        </div>
    </main>
    <footer id="footer"></footer>
    <script>
        const userLoggedIn = <?=$userLoggedIn?>;
        const adminLoggedIn = <?=$adminLoggedIn?>;
    </script>
</body>
</html>
