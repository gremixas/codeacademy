<?php
function randomizer():void {
    $users = [
        'Virgis',
        'Algis',
        'Laura',
        'Matas',
        'Toma',
        'Rasa',
        'Liudas',
        'Edmis'
    ];
    $result = $users[array_rand($users, 1)];
    header("Location: lucky_user.php?name=$result");
}
randomizer();
