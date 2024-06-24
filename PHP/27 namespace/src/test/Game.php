<?php

namespace src\test;

class Game
{
    public function __construct(public string $name = "")
    {
    }

    public function getTitle()
    {
        return "This is another game class";
    }
}