<?php

namespace src;

const PATH = __DIR__ . "/../database/games.json";

class Game
{
    public function index()
    {
        $games = (new services\JsonData(PATH))->getAll();
        (new services\Template("games/index.php", compact('games')))->render();
    }

    public function show(int $id)
    {
        $game = (new services\JsonData(PATH))->getOne($id);

        if (empty($game)) {
            die("Game not found.");
        }

        (new services\Template("games/show.php", compact('game')))->render();
    }
}
