UPDATE `movie_rentals`.`movies` AS `m` 
JOIN `movie_rentals`.`genres` AS `g` ON `m`.`genre` = `g`.`name`
SET `m`.`genre` = `g`.`id`;

-- change movies genre column name to genre_id
ALTER TABLE `movie_rentals`.`movies`
CHANGE `genre` `genre_id` INT UNSIGNED NOT NULL;
