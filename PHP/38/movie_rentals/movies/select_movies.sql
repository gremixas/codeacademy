-- Active: 1676911882923@@127.0.0.1@3306@games_and_more
SELECT
`title`,
`language`,
`release_date`,
`image`,
`runtime`
FROM `movie_rentals`.`movies`
WHERE `runtime` < 120 
ORDER BY `release_date` DESC;

-- 3. Parašyti SELECT `movies` užklausą,
-- kuria paimami įrašai su aktoriaus vardu ir pavarde.
-- Rezultate turi matytis. 
-- filmo pavadinimas,
-- filmo data
-- aktoriaus vardas pavardė
-- aktoriaus gimimo data

SELECT 
`movies`.`title`,
`movies`.`release_date`,
CONCAT (`actors`.`first_name`, " ", `actors`.`last_name`),
`actors`.`date_of_birth`
FROM `movie_rentals`.`movies` AS `movies`
LEFT JOIN `movie_rentals`.`actors` AS `actors` ON `movies`.`actor_id` = `actors`.`id`;

