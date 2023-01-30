<?php
include_once(__DIR__ . "/app.php");
$oldData = json_decode($_SESSION['registration_form_data'], 1);

if ($userLoggedIn) {
    header("location: index.php");
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
        <div class="register-form-section">
            <h2>Register</h2>
            <form class="register-form" action="register.php" method="POST">
                <label>Name:</label>
                <input typ`e="text" name="first_name" value="<?= $oldData['first_name'] ?? "" ?>">
                <label>Surname:</label>
                <input type="text" name="last_name" value="<?= $oldData['last_name'] ?? "" ?>">
                <label>E-mail:</label>
                <input type="email" name="email" value="<?= $oldData['email'] ?? "" ?>">
                <label>Password:</label>
                <input type="password" name="password" value="<?= $oldData['password'] ?? "" ?>">
                <button type="submit" class="submit">Submit</button>
            </form>
            <div class="register-messages">
                <?= Messages::get() ?>
            </div>
        </div>
    </main>
    <footer id="footer"></footer>
    <script>
        const userLoggedIn = <?=$userLoggedIn?>;
        
        const interval = 3000;
        let timeout = 3000;
        const myInterval = setInterval(deteleElement, interval);

        function deteleElement() {
            const message = document.querySelector(".message");
            if (message === null) {
                clearInterval(myInterval);
                return;
            }
            message.style.opacity = "0";
            setTimeout(() => {
                message.style.display = "none";
            }, 300);
            setTimeout(() => {
                message.remove();
            }, timeout - 100);
            // timeout = timeout + interval;
        }
    </script>
</body>
</html>
