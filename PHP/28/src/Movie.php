<?php

namespace src;

class Movie
{
    public function __construct(private string $title){}
    public function getMovie()
    {
        return $this->title;
    }
}