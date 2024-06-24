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
    <?php
    include_once __DIR__ . "message.php";
    // session_start();
    // foreach ($_SESSION['message'] as $key => $value) {
    //     echo "$key: $value<br>";
    // }
    echo message();
    ?>
    <br>
    <a href="message_writer.php?type=success">Success</a>
    <a href="message_writer.php?type=failed">Failed</a>
    <a href="message_writer.php?type=info">Info</a>
    <a href="message_writer.php?type=reset">Reset</a>
</body>
</html>
