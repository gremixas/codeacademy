SELECT
*
FROM
`movie_rentals`.`movies`;

SELECT
`title`,
`release_date`,
`genre_id`
FROM
`movie_rentals`.`movies`;

SELECT
`movies`.`title` AS `Title`,
`genres`.`name` AS `Genre`
FROM `movie_rentals`.`movies` AS `movies`
JOIN `movie_rentals`.`genres` AS `genres` ON `movies`.`genre_id` = `genres`.`id`;

