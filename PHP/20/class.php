<?php

include_once(__DIR__ . "/../dump.php");

class User {
    
    // Savybes

    private string $firstName;
    public string $lastName;

    // Konstruktas

    function __construct(string $firstName = "", string $lastName = "") {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    // Metodai

    public function fullName () {
        return $this->firstName . " " . $this->lastName;
    }

    public function getInitialName () {
        return substr($this->firstName, 0, 1) . "." . $this->lastName;
    }
}

$andrius = new User("Andrius", "Agafo");
// $andrius = new User();
// $andrius->firstName = "Andrius";
// $andrius->lastName = "Ag";
dump($andrius);
dump($andrius->fullName());
dump($andrius->getInitialName());
