<?php

namespace src;

class Game
{
    public function __construct(public string $name = "")
    {
    }

    public function getTitle()
    {
        return $this->name;
    }
}