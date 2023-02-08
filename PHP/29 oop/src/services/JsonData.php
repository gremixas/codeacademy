<?php

namespace src\services;

class JsonData
{
    public function __construct(public string $filePath = "")
    {
    }

    public function getAll(): array
    {
        return json_decode(file_get_contents($this->filePath), true);
    }

    public function getOne(int $id): array
    {
        $games = json_decode(file_get_contents($this->filePath), true);
        return array_values(array_filter($games, fn ($game) => $game['id'] == $id))[0] ?? [];
    }
}
