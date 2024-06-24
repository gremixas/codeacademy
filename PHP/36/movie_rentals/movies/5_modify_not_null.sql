ALTER TABLE
    `movie_rentals`.`movies`
    MODIFY `image` VARCHAR(1000) NOT NULL,
    MODIFY `genre` VARCHAR(20) NOT NULL,
    MODIFY `language` VARCHAR(20) NOT NULL,
    MODIFY `country` VARCHAR(30) NOT NULL;