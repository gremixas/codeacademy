<?php

namespace App;

const PATH = __DIR__ . "/../database/games.json";

class Game
{
    public function index()
    {
        $games = (new services\JsonData(PATH))->getAll();
        view("games/index.php", compact('games'));
    }

    public function show(int $id)
    {
        $game = (new services\JsonData(PATH))->getOne($id);

        if (empty($game)) {
            die("Game not found.");
        }

        view("games/show.php", compact('game'));
    }

    public function create()
    {
        view("games/create.php");
    }

    public function store(array $data = [])
    {
        (new services\JsonData(PATH))->createRecord($data);
        header("Location: index.php");
    }
}
