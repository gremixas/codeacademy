<?php

class Connect
{
    private string $serverName = "127.0.0.1";
    private string $userName = "root";
    private string $userPassword = "Kotletas2021";
    private string $dbName = "games_and_more";
    public function __construct()
    {}
    public function connect(){
        try {
            $con = new \PDO("mysql:host=$this->serverName;dbname=$this->dbName", $this->userName, $this->userPassword, array(\PDO::ATTR_PERSISTENT => true));
            $con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $con;
        }
        catch (\PDOException $e)
        {
            echo "Error" . $e->getMessage();
        }
    }
}

(new Connect)->connect();