<?php

namespace src;

class Home
{
    public function index()
    {
        $msg = "omg";
        include __DIR__ . "/../templates/home.php";
    }
}
