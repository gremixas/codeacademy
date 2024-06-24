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
    <link rel="stylesheet" href="style.css">
</head>

<body>
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

        if (isset($_GET['status']) && $_GET['status'] == 1) {
            createRecord($filePath, [
                "name" => $oldData['name'],
                "age" =>$oldData['age'],
                "breed" => $oldData['breed'],
                "kind" => $oldData['kind'],
                "weight" => $oldData['weight'],
                "height" => $oldData['height']
            ]);
            header("Location: index.php");
        }

        ?>
    </div>

    <form action="register_content.php" method="post">
        <label>Vardas:</label>
        <input type="text" name="name" value="<?= $oldData['name'] ?? "" ?>">
        <label>Amžius:</label>
        <input type="number" name="age" value="<?= $oldData['age'] ?? "" ?>">
        <label>Veislė:</label>
        <input type="text" name="breed" value="<?= $oldData['breed'] ?? "" ?>">
        <label>Rūšis:</label>
        <input type="text" name="kind" value="<?= $oldData['kind'] ?? "" ?>">
        <label>Srovis:</label>
        <input type="number" name="weight" value="<?= $oldData['weight'] ?? "" ?>">
        <label>Ūgis:</label>
        <input type="number" name="height" value="<?= $oldData['height'] ?? "" ?>">
        <br>
        <input type="submit" class="submit">
    </form>
</body>

</html>