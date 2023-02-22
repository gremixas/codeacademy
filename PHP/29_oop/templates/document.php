<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Page</title>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/form.css">
</head>
<body>
    <main>
        <a href="../index.php">Į pradžią</a>
        <a href="./index.php">Žaidimai</a>
        <a href="./create.php">Sukurti žaidimą</a>
        <?= $content ?? "" ?>
    </main>
</body>
</html>