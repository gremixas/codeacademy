
DROP TABLE IF EXISTS `movie_rentals`.`country_movie`;

CREATE TABLE IF NOT EXISTS `movie_rentals`.`country_movie` (
    `country_id` INT UNSIGNED NOT NULL,
    `movie_id` INT UNSIGNED NOT NULL,

    CONSTRAINT `FK_country_movie_countries`
    FOREIGN KEY (`country_id`)
    REFERENCES `countries`(`id`)
    ON UPDATE CASCADE ON DELETE RESTRICT,

    CONSTRAINT `FK_country_movie_movies`
    FOREIGN KEY (`movie_id`)
    REFERENCES `movies`(`id`)
    ON UPDATE CASCADE ON DELETE RESTRICT,

    CONSTRAINT `uc_country_id_movie_id` UNIQUE KEY (`country_id`,`movie_id`)
);