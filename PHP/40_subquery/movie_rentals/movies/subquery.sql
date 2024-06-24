--Jevgenijaus
SELECT `movies`.`title` AS `Title`, (
        SELECT
            JSON_ARRAYAGG(`languages`.`name`) AS `Languages`
        FROM
            `movie_rentals`.`movies` AS `m`
            LEFT JOIN `movie_rentals`.`language_movie` AS `lan_m` ON `movies`.`id` = `lan_m`.`movie_id`
            LEFT JOIN `movie_rentals`.`languages` AS `languages` ON `languages`.`id` = `lan_m`.`language_id`
        WHERE
            `m`.`id` = `movies`.`id`
        GROUP BY
            `movies`.`id`
    ) AS `Languages`, (
        SELECT
            JSON_ARRAYAGG(
                CONCAT(
                    `actors`.`first_name`,
                    ' ',
                    `actors`.`last_name`
                )
            ) AS `Full Name`
        FROM
            `movie_rentals`.`movies` AS `m`
            LEFT JOIN `movie_rentals`.`actor_movie` AS `a_m` ON `movies`.`id` = `a_m`.`movie_id`
            LEFT JOIN `movie_rentals`.`actors` AS `actors` ON `actors`.`id` = `a_m`.`actor_id`
        WHERE
            `m`.`id` = `movies`.`id`
        GROUP BY
            `movies`.`id`
    ) AS `Actors`, (
        SELECT
            JSON_ARRAYAGG(`genres`.`name`) AS `Genre`
        FROM
            `movie_rentals`.`movies` AS `m`
            LEFT JOIN `movie_rentals`.`genre_movie` AS `gen_m` ON `movies`.`id` = `gen_m`.`movie_id`
            LEFT JOIN `movie_rentals`.`genres` AS `genres` ON `genres`.`id` = `gen_m`.`genre_id`
        WHERE
            `m`.`id` = `movies`.`id`
        GROUP BY
            `movies`.`id`
    ) AS `Genres`, (
        SELECT
            JSON_ARRAYAGG(`countries`.`name`) AS `Countrys`
        FROM
            `movie_rentals`.`movies` AS `m`
            LEFT JOIN `movie_rentals`.`country_movie` AS `coun_m` ON `movies`.`id` = `coun_m`.`movie_id`
            LEFT JOIN `movie_rentals`.`countries` AS `countries` ON `countries`.`id` = `coun_m`.`country_id`
        WHERE
            `m`.`id` = `movies`.`id`
        GROUP BY
            `movies`.`id`
    ) AS `Countries`
FROM
    `movie_rentals`.`movies` AS `movies`;

-- select movies where actor_id = 3
SELECT
*
FROM `movie_rentals`.`movies` AS `movies`
WHERE `movies`.`id` IN (
    SELECT
    `am`.`movie_id`
    FROM `movie_rentals`.`actor_movie` AS `am`
    WHERE `am`.`actor_id` = 3
);
--same shit, almost
SELECT
*
FROM `movie_rentals`.`movies` AS `movies`
JOIN `movie_rentals`.`actor_movie` AS `am` ON `movies`.`id` = `am`.`movie_id`
WHERE `am`.`actor_id` = 3;


SELECT
`movies`.`id` AS `ID`,
`movies`.`title` AS `Title`,
`movies`.`release_date` AS `Realease date`,
`movies`.`description` AS `Description`,
TIME_FORMAT(SEC_TO_TIME(`movies`.`runtime` * 60),'%H:%i') AS `Runtime`,
`movies`.`rating` AS `Rating`,
`movies`.`image` AS `Image`,
(
    SELECT
    JSON_ARRAYAGG(
        JSON_OBJECT(
            'id',`actors`.`id`,
            'first_name',`actors`.`first_name`,
            'last_name',`actors`.`last_name`,
            'date_of_birth',`actors`.`date_of_birth`,
            'created_at',`actors`.`created_at`,
            'updated_at',`actors`.`updated_at`,
            'deleted_at',`actors`.`deleted_at`
        )
    )
    FROM `movie_rentals`.`actor_movie` AS `am`
    JOIN `movie_rentals`.`actors` ON `actors`.`id` = `am`.`actor_id`
    WHERE `am`.`movie_id` = `movies`.`id`
    GROUP BY `am`.`movie_id`
) AS `Actors`,
(
    SELECT
    JSON_ARRAYAGG(
        JSON_OBJECT(
            'id',`countries`.`id`,
            'name',`countries`.`name`,
            'created_at',`countries`.`created_at`,
            'updated_at',`countries`.`updated_at`,
            'deleted_at',`countries`.`deleted_at`
        )
    )
    FROM `movie_rentals`.`country_movie` AS `cm`
    JOIN `movie_rentals`.`countries` ON `countries`.`id` = `cm`.`country_id`
    WHERE `cm`.`movie_id` = `movies`.`id`
    GROUP BY `cm`.`movie_id`
) AS `Countries`,
(
    SELECT
    JSON_ARRAYAGG(
        JSON_OBJECT(
            'id',`languages`.`id`,
            'name',`languages`.`name`,
            'created_at',`languages`.`created_at`,
            'updated_at',`languages`.`updated_at`,
            'deleted_at',`languages`.`deleted_at`
        )
    )
    FROM `movie_rentals`.`language_movie` AS `lm`
    JOIN `movie_rentals`.`languages` ON `languages`.`id` = `lm`.`language_id`
    WHERE `lm`.`movie_id` = `movies`.`id`
    GROUP BY `lm`.`movie_id`
) AS `Languages`,
(
    SELECT
    JSON_ARRAYAGG(
        JSON_OBJECT(
            'id',`genres`.`id`,
            'name',`genres`.`name`,
            'created_at',`genres`.`created_at`,
            'updated_at',`genres`.`updated_at`,
            'deleted_at',`genres`.`deleted_at`
        )
    )
    FROM `movie_rentals`.`genre_movie` AS `cm`
    JOIN `movie_rentals`.`genres` ON `genres`.`id` = `cm`.`genre_id`
    WHERE `cm`.`movie_id` = `movies`.`id`
    GROUP BY `cm`.`movie_id`
) AS `Genres`
FROM `movie_rentals`.`movies` AS `movies`;

