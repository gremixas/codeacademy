<?php

namespace App;

class Home
{
    public function index()
    {
        $msg = "omg";
        view("home.php", compact('msg'));
    }
}
