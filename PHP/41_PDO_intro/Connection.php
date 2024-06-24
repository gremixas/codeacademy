<?php

class Connection {
    protected ?\PDO $connection = null;

    public function __construct() {
        $this->open();
    }

    public function getConnection(): \PDO {
            return $this->connection;
    }

    private function open(): void {
        $servername = "localhost";
        $database = "movie_rentals";
        $username = "root";
        $password = "root";

        $dsn = "mysql:host=$servername;dbname=$database";
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES => false
        ];

        try {
            $this->connection = new PDO($dsn, $username, $password, $options);
        } catch(\PDOException $e) {
        echo "Connection failed: " . $e->getMessage() . "\n";
        }

    }
}
