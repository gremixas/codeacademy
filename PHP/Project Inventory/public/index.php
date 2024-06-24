<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="inventory_form.php">Inventory Checker</a>
    <div class="msg">
        <?php
        if (isset($_GET['msg'])) {
            echo $_GET['msg'];
        }
        ?>
    </div>
</body>
</html>