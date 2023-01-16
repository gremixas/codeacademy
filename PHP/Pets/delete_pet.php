<?php
include_once(__DIR__ . "/dump.php");
include_once(__DIR__ . "/pet_functions.php");
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
    <?php
    if (isset($_GET['id'])) {
        $pet = getPet(getPets($filePath), $_GET['id']);
        if (empty($pet)) {
            echo "Nera gyvuno su tokiu Id";
            die;
        } else {
            deleteRecord($filePath, (int)$_GET['id']);
            echo "<h2>Istrinta.</h2>";
            header("Location: index.php");
        }
    } else {
        echo "Id nereikia?";
        die;
    }
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        deleteRecord($filePath, (int)$_GET['id']);
        header("Location: index.php");
    }
    ?>
</body>
</html>