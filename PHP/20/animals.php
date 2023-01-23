<?php

include_once("../dump.php");

class Animal {
    function __construct(
        public string $name = "",
        public string $weight = "",
        public string $height = ""
        ) {
        // $this->name = $name;
        // $this->weight = $weight;
        // $this->height = $height;
        // $this->callMethod();
    }

    public function printPreview(string $review) {
        if ($review === "good") {
            return "$this->name is $review. weights $this->weight and is $this->height height";
        } else {
            return "give some review about this $this->name";
        }
    }
}

$cat = new Animal("cat", "5kg", "35cm");

dump($cat);
dump($cat->printPreview("good"));
dump($cat->printPreview(""));
