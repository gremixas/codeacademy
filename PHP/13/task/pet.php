<?php
include_once(__DIR__ . "/dump.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            height: 100vh;
        }

        .box {
            width: 500px;
            min-height: 50px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .green {
            background-color: green;
        }

        .red {
            background-color: red;
        }
        .blue {
            background-color: blue;
        }
        form {
            display: flex;
            flex-direction: column;
            width: 150px;
        }
    </style>
</head>

<body>
    <div>
        <?php
        // $get = $_GET;
        // dump($get);
        ?>
    </div>
    <div>
        <?php
        function message(string $title = '', string $body = '', int $status = 1): string {
            $colors = ["red", "green", "blue"];
            $titles = ["Klaida", "Operacija sekminga", "Info"];
            $json = json_decode($body, true);
            $title = $json ? implode("\n", $json) : "";
            return "<div class='box " . $colors[$status] . "'>
                        <h2>$titles[$status]</h2>
                        <p>$title</p>
                    </div>";
        }
        echo isset($_GET['status']) ? nl2br(message("", $_GET['message'], $_GET['status'])) : "";

        $json = $_GET['old_data'] ?? "";
        $oldData = json_decode($json, true);
        ?>
    </div>

    <form action="register_content.php" method="post">
        <label>name:</label>
        <input type="text" name="name" value="<?= $oldData['name'] ?? "" ?>">
        <label>age:</label>
        <input type="number" name="age" value="<?= $oldData['age'] ?? "" ?>">
        <label>breed:</label>
        <input type="text" name="breed" value="<?= $oldData['breed'] ?? "" ?>">
        <label>weight:</label>
        <input type="number" name="weight" value="<?= $oldData['weight'] ?? "" ?>">
        <label>height:</label>
        <input type="number" name="height" value="<?= $oldData['height'] ?? "" ?>">
        <br>
        <input type="submit">
    </form>
</body>

</html>