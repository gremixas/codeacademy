<?php

require_once __DIR__ . "/../dump.php";
require_once __DIR__ . "/Connection.php";

$connection = (new Connection())->getConnection();


// $title = "Titanic";

// $sql = "SELECT * FROM `movie_rentals`.`movies` AS `m` WHERE `m`.`title` = :title LIMIT 1";

// $stmt = $connection->prepare($sql);
// $stmt->execute([
//     'title' => $title
// ]);

// $sql = "SELECT * FROM `movie_rentals`.`movies` AS `m` WHERE `m`.`title` = ? LIMIT 1";

// $stmt = $connection->prepare($sql);
// $stmt->execute([
//     $title
// ]);

// $movies = $stmt->fetch();
// dump($movies);

function getAllMovies(\PDO $connection): array {
    return $connection->query("SELECT * FROM `movie_rentals`.`movies`")->fetchAll();
}
dump(getAllMovies($connection));

function getSingleMovie(\PDO $connection, int $id): array {
    $sql = "SELECT * FROM `movie_rentals`.`movies` AS `m` WHERE `m`.`id` = ? LIMIT 1";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch();
}
dump(getSingleMovie($connection, 6));




// $movies = $conn->query("
//             SELECT
//             `movies`.`id` AS `ID`,
//             `movies`.`title` AS `Title`,
//             `movies`.`release_date` AS `Realease date`,
//             `movies`.`description` AS `Description`,
//             TIME_FORMAT(SEC_TO_TIME(`movies`.`runtime` * 60),'%H:%i') AS `Runtime`,
//             `movies`.`rating` AS `Rating`,
//             `movies`.`image` AS `Image`,
//             (
//                 SELECT
//                 JSON_ARRAYAGG(
//                     JSON_OBJECT(
//                         'id',`a`.`id`,
//                         'first_name',`a`.`first_name`,
//                         'last_name',`a`.`last_name`,
//                         'date_of_birth',`a`.`date_of_birth`,
//                         'created_at',`a`.`created_at`,
//                         'updated_at',`a`.`updated_at`,
//                         'deleted_at',`a`.`deleted_at`
//                     )
//                 )
//                 FROM `movie_rentals`.`actor_movie` AS `am`
//                 JOIN `movie_rentals`.`actors` AS `a` ON `a`.`id` = `am`.`actor_id`
//                 WHERE `am`.`movie_id` = `movies`.`id`
//                 GROUP BY `am`.`movie_id`
//             ) AS `Actors`,
//             (
//                 SELECT
//                 JSON_ARRAYAGG(
//                     JSON_OBJECT(
//                         'id',`c`.`id`,
//                         'name',`c`.`name`,
//                         'created_at',`c`.`created_at`,
//                         'updated_at',`c`.`updated_at`,
//                         'deleted_at',`c`.`deleted_at`
//                     )
//                 )
//                 FROM `movie_rentals`.`country_movie` AS `cm`
//                 JOIN `movie_rentals`.`countries` AS `c` ON `c`.`id` = `cm`.`country_id`
//                 WHERE `cm`.`movie_id` = `movies`.`id`
//                 GROUP BY `cm`.`movie_id`
//             ) AS `Countries`,
//             (
//                 SELECT
//                 JSON_ARRAYAGG(
//                     JSON_OBJECT(
//                         'id',`l`.`id`,
//                         'name',`l`.`name`,
//                         'created_at',`l`.`created_at`,
//                         'updated_at',`l`.`updated_at`,
//                         'deleted_at',`l`.`deleted_at`
//                     )
//                 )
//                 FROM `movie_rentals`.`language_movie` AS `lm`
//                 JOIN `movie_rentals`.`languages` AS `l` ON `l`.`id` = `lm`.`language_id`
//                 WHERE `lm`.`movie_id` = `movies`.`id`
//                 GROUP BY `lm`.`movie_id`
//             ) AS `Languages`,
//             (
//                 SELECT
//                 JSON_ARRAYAGG(
//                     JSON_OBJECT(
//                         'id',`g`.`id`,
//                         'name',`g`.`name`,
//                         'created_at',`g`.`created_at`,
//                         'updated_at',`g`.`updated_at`,
//                         'deleted_at',`g`.`deleted_at`
//                     )
//                 )
//                 FROM `movie_rentals`.`genre_movie` AS `cm`
//                 JOIN `movie_rentals`.`genres` AS `g` ON `g`.`id` = `cm`.`genre_id`
//                 WHERE `cm`.`movie_id` = `movies`.`id`
//                 GROUP BY `cm`.`movie_id`
//             ) AS `Genres`
//             FROM `movie_rentals`.`movies` AS `movies`;
//         ")->fetchAll();
// dump(json_decode($movies[0]['Languages'], true)[0]['name']);


