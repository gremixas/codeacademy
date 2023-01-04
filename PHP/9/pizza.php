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
            $pizzas = [
                [
                    'name' => 'BAHAMOS',
                    'price' => 8.00,
                    'image' => 'https://www.pipita.lt/wp-content/uploads/elementor/thumbs/Bahamos-pow4immdb2560xq0j3i7ii9sl367zg1jodee45iczk.png',
                    'ingredients' => [
                        'Pomidorų padažas',
                        'sūris',
                        'kumpis',
                        'ananasai',
                        'bananai',
                        'karis',
                        'raudonėlis',
                    ],
                ],
                [
                    'name' => 'MEXICANO',
                    'price' => 10.00,
                    'image' => 'https://www.pipita.lt/wp-content/uploads/2022/05/Asset-3@4x.png',
                    'ingredients' => [
                        'Pomidorų padažas',
                        'mėsos faršas',
                        'konservuota paprika',
                        'svogūnai',
                        'raudonėlis',
                    ]
                ],
                [
                    'name' => 'TRADICINĖ',
                    'price' => 9.00,
                    'image' => 'https://www.pipita.lt/wp-content/uploads/2022/05/Asset-6@4x.png',
                    'ingredients' => [
                        'Pomidorų padažas',
                        'sūris',
                        'kumpis',
                        'bekonas',
                        'mėsos faršas',
                        'svogūnai',
                        'žali pipirai',
                        'raudonėlis'
                    ],
                ],
                [
                    'name' => 'CIAO CIAO',
                    'price' => 9.00,
                    'image' => 'https://www.pipita.lt/wp-content/uploads/2022/05/pica.png',
                    'ingredients' => [
                        'Pomidorų padažas',
                        'sūris',
                        'pievagrybiai',
                        'jautienos filė',
                        'beane padažas',
                        'raudonėlis'
                    ],
                ],
                [
                    'name' => 'HAWAI',
                    'price' => 8.00,
                    'image' => 'https://www.pipita.lt/wp-content/uploads/2022/05/Asset-4@4x.png',
                    'ingredients' => [
                        'Pomidorų padažas',
                        'sūris',
                        'kumpis',
                        'ananasai',
                        'raudonėlis',
                    ],
                ],
            ];
            foreach ($pizzas as $pizza) {
                // $ingredients = "";
                // foreach ($pizza['ingredients'] as $ingredient) {
                //     $ingredients .= "{$ingredient}<br>";
                // }
                echo "<tr>
                        <td>
                            <img src='{$pizza['image']}'>
                        </td>
                        <td>{$pizza['name']}</td>
                        <td>{$pizza['price']}</td>
                        <td>".implode("<br>", $pizza['ingredients'])."</td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
