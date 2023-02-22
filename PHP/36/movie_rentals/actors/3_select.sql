--4. Parašyti SELECT užklausą, kuria paimami šie įrašai:

--a. paimti tik šie duomenys -  id, pavardė, vardas.
SELECT
`id`,
`first_name`,
`last_name`
FROM
`movie_rentals`.`actors`;

--b. id, pavardė, vardas turi alias'es ID, Last Name, First Name
SELECT
`id` AS `ID`,
`first_name` AS `First Name`,
`last_name` AS `Last Name`
FROM
`movie_rentals`.`actors`;

--c. paimami tik aktoriai gimę po 1970.
SELECT
`id` AS `ID`,
`first_name` AS `First Name`,
`last_name` AS `Last Name`
FROM
`movie_rentals`.`actors`
WHERE `date_of_birth` > "1970-01-01";

--d. rezultato įrašai surikiuojami pagal pavardę žemėjančia (descending) tvarką. 
SELECT
`id` AS `ID`,
`first_name` AS `First Name`,
`last_name` AS `Last Name`
FROM
`movie_rentals`.`actors`
WHERE `date_of_birth` > "1970-01-01"
ORDER BY `last_name` DESC;

--e. rezultatas ribojamas iki 3 įrašų. 
SELECT
`id` AS `ID`,
`first_name` AS `First Name`,
`last_name` AS `Last Name`
FROM
`movie_rentals`.`actors`
WHERE `date_of_birth` > "1970-01-01"
ORDER BY `last_name` DESC
LIMIT 3;

