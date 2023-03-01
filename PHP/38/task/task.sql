-- 1. Sukurti `movie_rentals`.`languages`

CREATE TABLE IF NOT EXISTS `movie_rentals`.`languages`(
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `name` VARCHAR(50) NOT NULL,
    `abbr` VARCHAR(2) NOT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `deleted_at` TIMESTAMP NULL DEFAULT NULL
);

-- 2. Užpildyti `movie_rentals`.`languages`:

INSERT INTO `movie_rentals`.`languages`
(`name`,`abbr`)
VALUES
('english','en'),
('german','de'),
('spanish', 'es'),
('lithuanian', 'lt'),
('french', 'fr'),
('japanese', 'jp');

-- 3. Parašyti SQL tarpinei lentelei `movie_rentals`.`language_movie` sukurti.

-- Šioje lentelėje turi būti tik 2 stulpeliai:
--     `language_id` skaičius, ne minusas, ne null
--     `movie_id`  skaičius, ne minusas, ne null.

CREATE TABLE IF NOT EXISTS `movie_rentals`.`language_movie`(
    `language_id` INT UNSIGNED NOT NULL,
    `movie_id` INT UNSIGNED NOT NULL
);

-- Susaistyti šios lentelės svetimus raktus:
--     `language_id` su `languages`
--     `movie_id` su `movies.`

ALTER TABLE `movie_rentals`.`language_movie`
ADD CONSTRAINT `FK_language_id_languages`
FOREIGN KEY (`language_id`)
REFERENCES `languages`(`id`)
ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE `movie_rentals`.`language_movie`
ADD CONSTRAINT `FK_movie_id_movies`
FOREIGN KEY (`movie_id`)
REFERENCES `movies`(`id`)
ON UPDATE CASCADE ON DELETE RESTRICT;

-- Saitus galima uždėti CREATE operacijos metu arba po to, su ALTER operacija.

-- movie_id - tai filmas, language_id - tai kalba.
-- Vienas filmas gali turėti daug kalbų, viena kalba - daug filmų.

-- 4. INSERT komanda įveskite duomenis į tarpinę lentelę `movie_rentals`.`language_movie`
-- pvz.: (1,1),(3,1),(1,2),(5,2),(2,3),(1,3),(4,3);

INSERT INTO `movie_rentals`.`language_movie`
(`language_id`, `movie_id`)
VALUES
(1,1),(3,1),(1,2),(5,2),(2,3),(1,3),(4,3);

-- Negali būtį identiškų svetimų raktų verčių porų.

-- 5. Parašyti SELECT užklausą su dviem JOIN, kuria sujungiamos lentelės `movies`->`language_movie`->`language`.

-- Sujungimui naudoti 2 JOIN per `id` ,`movie_id`, `language_id`

-- SELECT turi grąžinti filmo pavadinimą ir kalbas
-- SELECT užklausą reikia grupuoti su GROUP BY pagal filmo `title`. - rašoma užklausos gale
-- SELECT kalbos stulpelį agreguoti su JSON_ARRAYAGG() funkciją. - rašomas kaip vienas iš atrenkamų stulpelių, padaromas masyvas

-- Rezultatas su JOIN

SELECT
`m`.`title`,
-- JSON_ARRAYAGG(`l_m`.`language_id`)
JSON_ARRAYAGG(`l`.`name`)
FROM
`movie_rentals`.`movies` AS `m`
JOIN
`movie_rentals`.`language_movie` AS `l_m` ON `m`.`id` = `l_m`.`movie_id`
JOIN
`movie_rentals`.`languages` AS `l` ON `l`.`id` = `l_m`.`language_id`
GROUP BY `m`.`title`;


-- Rezultatas su LEFT JOIN

SELECT
`m`.`title`,
JSON_ARRAYAGG(`l`.`name`)
FROM
`movie_rentals`.`movies` AS `m`
JOIN
`movie_rentals`.`language_movie` AS `l_m` ON `m`.`id` = `l_m`.`movie_id`
LEFT JOIN
`movie_rentals`.`languages` AS `l` ON `l`.`id` = `l_m`.`language_id`
GROUP BY `m`.`title`;

