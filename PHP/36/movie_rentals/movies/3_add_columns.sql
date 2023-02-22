ALTER TABLE
    `movie_rentals`.`movies`
ADD
    COLUMN `image` VARCHAR(1000) NULL AFTER `rating`,
ADD
    COLUMN `genre` VARCHAR(50) NULL AFTER `image`,
ADD
    COLUMN `language` VARCHAR(50) NULL AFTER `genre`,
ADD
    COLUMN `country` VARCHAR(50) NULL AFTER `language`;