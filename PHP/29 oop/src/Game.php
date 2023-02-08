<?php

namespace src;

const PATH = __DIR__ . "/../database/games.json";

class Game
{
    public function index()
    {
        $games = (new services\JsonData(PATH))->getAll();
        include __DIR__ . "/../templates/games/index.php";
    }

    public function show(int $id)
    {
        $game = (new services\JsonData(PATH))->getOne($id);

        if (empty($game)) {
            die("Game not found.");
        }

        include __DIR__ . "/../templates/games/show.php";
    }
}
