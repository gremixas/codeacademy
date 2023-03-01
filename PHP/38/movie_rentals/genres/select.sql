-- Active: 1676911955202@@127.0.0.1@3306@games_and_more
SELECT 
`movies`.`title`,
`movies`.`release_date`,
`genres`.`name` AS `genre`,
`genres`.`id` AS `genre_id`
FROM `movie_rentals`.`movies` AS `movies`
LEFT JOIN `movie_rentals`.`genres` AS `genres` ON `movies`.`genre_id` = `genres`.`id`;