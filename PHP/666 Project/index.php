<?php
include_once(__DIR__ . "/app.php");
$car = new Car("Mazda", "MX5", "2001", "Petrol", "Manual", "156", "car_images/miata.jpg");
// Car::createCar($car);
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
            <?php
                // for ($i=0; $i < 20; $i++) {
                //     echo "<img class='car-photo' src='https://loremflickr.com/".rand(250, 300)."/".rand(250, 300)."/car'>";
                // }
            // dump($adminLoggedIn);
            echo Car::drawCars($adminLoggedIn);
            ?>
        </div>
    </main>
    <footer id="footer">
        <form action="handlers/upload.php" method="post" enctype="multipart/form-data" > 
            <input type="hidden" name="id" value="555">
            <input id="file" type="file" name="file" /> 
            <button type="submit">submit</button>
        </form>
    </footer>
    <script>
        const userLoggedIn = <?=$userLoggedIn?>;
    </script>
</body>
</html>
