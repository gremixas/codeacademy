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
        if (isset($_GET['id'])) {
            $pet = getPet(getPets($filePath), $_GET['id']);
            if (empty($pet)) {
                echo "Nera gyvuno su tokiu Id";
                die;
            }
        } else {
            echo "Id nereikia?";
            die;
        }
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
        isset($_GET['status']) && $_GET['status'] == 1 ? header("Location: index.php") : null;

        $json = $_GET['old_data'] ?? "";
        $oldData = json_decode($json, true);

        if (isset($_GET['status']) && $_GET['status'] == 1) {
            updateRecord($filePath, (int)$oldData['id'], $oldData['name'], (int)$oldData['age'], $oldData['breed'], $oldData['kind'], (int)$oldData['weight'], (int)$oldData['height']);
            header("Location: index.php");
        }

        ?>
    </div>

    <form action="update_content.php" method="post">
        <input type="hidden" name="id" value="<?= $oldData['id'] ?? $pet['id'] ?>">
        <label>Vardas:</label>
        <input type="text" name="name" value="<?= $oldData['name'] ?? $pet['name'] ?>">
        <label>Amžius:</label>
        <input type="number" name="age" value="<?= $oldData['age'] ?? $pet['age'] ?>">
        <label>Veislė:</label>
        <input type="text" name="breed" value="<?= $oldData['breed'] ?? $pet['breed'] ?>">
        <label>Rūšis:</label>
        <input type="text" name="kind" value="<?= $oldData['kind'] ?? $pet['kind'] ?>">
        <label>Svoris:</label>
        <input type="number" name="weight" value="<?= $oldData['weight'] ?? $pet['weight'] ?>">
        <label>Ūgis:</label>
        <input type="number" name="height" value="<?= $oldData['height'] ?? $pet['height'] ?>">
        <br>
        <input type="submit" class="submit">
    </form>
</body>

</html>