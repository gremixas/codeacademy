<?php

namespace App\services;

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

    public function createRecord(array $post)
    {
        $data = file_get_contents($this->filePath);
        $dataArr = json_decode($data, true);
        $index = array_column($dataArr, 'id');
        $index = max($index) + 1;
 
        if (isset($post)) {
            $post['id'] = $index;
            $dataArr[] = $post;
        }
 
        $dataToJson = json_encode($dataArr);
        file_put_contents($this->filePath, $dataToJson);
    }
}
