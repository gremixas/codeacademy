<?php

require_once __DIR__ . "/Connection.php";

class Movie {

    protected ?\PDO $connection = null;

    public function __construct() {
        $this->connection = (new Connection())->getConnection();
    }
    public function showAll(): array {
        return $this->connection->query("SELECT * FROM `movie_rentals`.`movies`")->fetchAll();
    }
    
    public function showSingle(int $id): array {
        $sql = "SELECT * FROM `movie_rentals`.`movies` AS `m` WHERE `m`.`id` = ? LIMIT 1";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    
    public function insert(array $movie): void {
        $sql = "INSERT INTO `movie_rentals`.`movies`
                    (`title`, `description`, `release_date`, `runtime`, `rating`, `image`)
                VALUES
                    (:title, :description, :release_date, :runtime, :rating, :image)";

        $stmt = $this->connection->prepare($sql);

        extract($movie);

        try {
            $stmt->execute([
                "title" => $title,
                "description" => $description,
                "release_date" => $release_date,
                "runtime" => $runtime,
                "rating" => $rating,
                "image" => $image
            ]);
            echo "Movie added.";
        } catch(\PDOException $e) {
            echo "INSERT failed: " . $e->getMessage() . "\n";
        }

    }
}