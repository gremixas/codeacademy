UPDATE `movie_rentals`.`movies` AS `movies`
LEFT JOIN `movie_rentals`.`genres` AS `genres` ON `movies`.`genre` = `genres`.`name`
SET `movies`.`genre` = `genres`.`id`;

SELECT
`movies`.`genre`,
`genres`.`id`
FROM `movie_rentals`.`movies` AS `movies`
LEFT JOIN `movie_rentals`.`genres` AS `genres` ON `movies`.`genre` = `genres`.`name`;

ALTER TABLE `movie_rentals`.`movies`
CHANGE `genre` `genre_id` INT UNSIGNED NOT NULL;
