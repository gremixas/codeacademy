<?php
include_once(__DIR__ . "/users_functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;900&display=swap" rel="stylesheet">
</head>
<body>
    <main>
        <div class="current-users">
            <?=
                showUsers(getUsers($filePath));
            ?>
        </div>
        <div class="status-display">
            <?php
            function message(string $title = '', string $body = '', int $status = 1): string {
                $colors = ["red", "green", "blue"];
                $titles = ["Klaida", "Operacija sėkminga", "Info"];
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
                    "first_name" => $oldData['first_name'],
                    "last_name" => $oldData['last_name'],
                    "age" =>$oldData['age'],
                    "country" => $oldData['country'],
                ]);
                header("Location: add_user_form.php");
            }

            ?>
        </div>
        <section>
            <form action="add_user.php" method="post">
                <label>Vardas:</label>
                <input typ`e="text" name="first_name" value="<?= $oldData['first_name'] ?? "" ?>">
                <label>Pavardė:</label>
                <input type="text" name="last_name" value="<?= $oldData['last_name'] ?? "" ?>">
                <label>Amžius:</label>
                <input type="number" name="age" value="<?= $oldData['age'] ?? "" ?>">
                <label>Šalis:</label>
                <input type="text" name="country" value="<?= $oldData['country'] ?? "" ?>">
                <br>
                <button type="submit" class="submit">Pateikti</button>
            </form>
        </section>
    </main>
</body>
</html>
