SELECT
    `title`,
    `language`,
    `release_date`,
    `image`
FROM `movie_rentals`.`movies`;

SELECT
    `title`,
    `language`,
    `release_date`,
    `image`
FROM `movie_rentals`.`movies`
WHERE `runtime` >= 120;

SELECT
    `title`,
    `language`,
    `release_date`,
    `image`
FROM `movie_rentals`.`movies`
WHERE `runtime` >= 120
ORDER BY `release_date` DESC;
