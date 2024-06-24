SELECT
*
FROM
`games_and_more`.`games`
WHERE `id`=7;

SELECT
`name`,
`release_date`
FROM
`games_and_more`.`games`;

SELECT
`name` AS `title`,
`release_date` AS `date`
FROM
`games_and_more`.`games`;

SELECT
`id`,
`name`,
`release_date`
FROM
`games_and_more`.`games`
WHERE `id` > 3
ORDER BY `name` DESC;

