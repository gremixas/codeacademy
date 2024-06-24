ALTER TABLE
    `movie_rentals`.`movies`
    MODIFY `image` VARCHAR(1000) NOT NULL,
    MODIFY `genre` VARCHAR(20) NOT NULL,
    MODIFY `language` VARCHAR(20) NOT NULL,
    MODIFY `country` VARCHAR(30) NOT NULL;

UPDATE `movie_rentals`.`movies` AS `movies`
LEFT JOIN `movie_rentals`.`genres` AS `genres` ON `movies`.`genre` = `genres`.`name`
SET `movies`.`genre` = `genres`.`id`;

-- SELECT
-- `movies`.`genre`,
-- `genres`.`id`
-- FROM `movie_rentals`.`movies` AS `movies`
-- LEFT JOIN `movie_rentals`.`genres` AS `genres` ON `movies`.`genre` = `genres`.`name`;

ALTER TABLE `movie_rentals`.`movies`
CHANGE `genre` `genre_id` INT UNSIGNED NOT NULL;
