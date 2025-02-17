-- Active: 1676911882923@@127.0.0.1@3306@movie_rentals

DROP TABLE IF EXISTS `movie_rentals`.`genres`;
CREATE TABLE
    IF NOT EXISTS `movie_rentals`.`genres` (
        `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
        `name` VARCHAR(50) NOT NULL,
        `description` VARCHAR(255) NULL,
        `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        `deleted_at` TIMESTAMP NULL DEFAULT NULL
    )