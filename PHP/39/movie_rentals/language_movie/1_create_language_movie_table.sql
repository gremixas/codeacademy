
DROP TABLE IF EXISTS `movie_rentals`.`language_movie`;

CREATE TABLE IF NOT EXISTS `movie_rentals`.`language_movie`(
    `language_id` INT UNSIGNED NOT NULL,
    `movie_id` INT UNSIGNED NOT NULL,

    CONSTRAINT `FK_language_movie_languages`
    FOREIGN KEY (`language_id`)
    REFERENCES `languages`(`id`)
    ON UPDATE CASCADE ON DELETE RESTRICT,

    CONSTRAINT `FK_language_movie_movies`
    FOREIGN KEY (`movie_id`)
    REFERENCES `movies`(`id`)
    ON UPDATE CASCADE ON DELETE RESTRICT,

    CONSTRAINT `uc_language_id_movie_id` UNIQUE KEY (`language_id`,`movie_id`)
);
