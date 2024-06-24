-- Active: 1676911882923@@127.0.0.1@3306@movie_rentals

-- languages task

SELECT
    `m`.`title`,
    JSON_ARRAYAGG(`l`.`name`)
FROM
    `movie_rentals`.`movies` AS `m`
    LEFT JOIN `movie_rentals`.`language_movie` AS `l_m` ON `m`.`id` = `l_m`.`movie_id`
    LEFT JOIN `movie_rentals`.`languages` AS `l` ON `l`.`id` = `l_m`.`language_id`
GROUP BY `m`.`title`;

-- actors

SELECT
    `m`.`title`,
    -- JSON_ARRAYAGG(
        GROUP_CONCAT(
            `a`.`first_name`,
            " ",
            `a`.`last_name`
        -- )
    )
FROM
    `movie_rentals`.`movies` AS `m`
    LEFT JOIN `movie_rentals`.`actor_movie` AS `a_m` ON `m`.`id` = `a_m`.`movie_id`
    LEFT JOIN `movie_rentals`.`actors` AS `a` ON `a`.`id` = `a_m`.`actor_id`
GROUP BY `m`.`title`;

-- genres task

SELECT
    `m`.`title`,
    JSON_ARRAYAGG(`g`.`name`)
FROM
    `movie_rentals`.`movies` AS `m`
    LEFT JOIN `movie_rentals`.`genre_movie` AS `g_m` ON `m`.`id` = `g_m`.`movie_id`
    LEFT JOIN `movie_rentals`.`genres` AS `g` ON `g`.`id` = `g_m`.`genre_id`
GROUP BY `m`.`title`;

-- countries task

SELECT
    `m`.`title`,
    JSON_ARRAYAGG(`c`.`name`)
FROM
    `movie_rentals`.`movies` AS `m`
    LEFT JOIN `movie_rentals`.`country_movie` AS `c_m` ON `m`.`id` = `c_m`.`movie_id`
    LEFT JOIN `movie_rentals`.`countries` AS `c` ON `c`.`id` = `c_m`.`country_id`
GROUP BY `m`.`title`;

-- filmai pagal sali
SELECT
    `c`.`name`,
    JSON_ARRAYAGG(`m`.`title`)
FROM
    `movie_rentals`.`countries` AS `c`
    JOIN `movie_rentals`.`country_movie` AS `c_m` ON `c`.`id` = `c_m`.`country_id`
    JOIN `movie_rentals`.`movies` AS `m` ON `m`.`id` = `c_m`.`movie_id`
GROUP BY `c`.`name`; 

