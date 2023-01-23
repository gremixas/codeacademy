<?php

include_once(__DIR__ . "/app.php");

// dump($_SESSION['authenticated']);

if (!($_SESSION['authenticated'] ?? false)) {
    echo "nera autentifikacijos!";
    header("Location: login_form.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <section>
            <header>
                <a href="logout.php?logout=1">Atsijungti</a>
                <h2>Hi bičas.</h2>
            </header>
        </section>
    </main>
</body>
</html>