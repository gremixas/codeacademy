<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="save_data.php" method="post">
        <label>First name:
            <input type="text" name="first_name" value="<?php echo $_GET['first_name'] . "mod"?>">
        </label>
        <label>Last name:
            <input type="text" name="last_name" value="<?php echo $_GET['last_name'] . "mod"?>">
        </label>
        <input type="submit">
    </form>
</body>
</html>
