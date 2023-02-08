<?php

namespace src;

class Home
{
    public function index()
    {
        $msg = "omg";
        view("home.php", compact('msg'));
        // (new services\Template("home.php", compact('msg')))->render();
    }
}
