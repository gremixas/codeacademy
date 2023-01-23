<?php

include_once("../dump.php");

class Fruit {
    public string $name; 
    public string $color; 
    public string $taste;
    
    function __construct(string $name = "", string $color = "", string $taste = "") {
        $this->name = $name;
        $this->color = $color;
        $this->taste = $taste;
    }

    public function printPreview(string $review) {
        if ($review === "good") {
            return "$this->color $this->name is $review and tastes $this->taste";
        } else {
            return "give some review about this $this->name";
        }
    }
}

$banana = new Fruit("banana", "yellow", "banana-ish");

dump($banana);
dump($banana->printPreview("good"));
dump($banana->printPreview(""));
