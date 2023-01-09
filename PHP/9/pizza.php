<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza's</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <h2>Picu lentele</h2>
    <table>
        <thead>
            <th>Nuotrauka</th>
            <th>Pavadinimas</th>
            <th>Kaina</th>
            <th>Ingridientai</th>
        </thead>
        <tbody>
            <?php
            require_once "json_functions.php";
            $filePath = __DIR__ . "/pizzas.json";
            $pizzas = jsonToArray($filePath);
            foreach ($pizzas as $pizza) {
                echo "<tr>
                        <td>
                            <img src='{$pizza['image']}'>
                        </td>
                        <td>{$pizza['name']}</td>
                        <td>{$pizza['price']}</td>
                        <td>" . implode("<br>", $pizza['ingredients']) . "</td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>