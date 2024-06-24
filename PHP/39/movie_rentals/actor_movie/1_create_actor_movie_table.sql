
DROP TABLE IF EXISTS `movie_rentals`.`actor_movie`;

CREATE TABLE IF NOT EXISTS `movie_rentals`.`actor_movie` (
    `actor_id` INT UNSIGNED NOT NULL,
    `movie_id` INT UNSIGNED NOT NULL,

    CONSTRAINT `FK_actor_movie_actors`
    FOREIGN KEY (`actor_id`)
    REFERENCES `actors`(`id`)
    ON UPDATE CASCADE
    ON DELETE RESTRICT,

    CONSTRAINT `FK_actor_movie_movies`
    FOREIGN KEY (`movie_id`)
    REFERENCES `movies`(`id`)
    ON UPDATE CASCADE
    ON DELETE RESTRICT,

    CONSTRAINT `UC_actor_id_movie_id` UNIQUE KEY (`actor_id`,`movie_id`)
);