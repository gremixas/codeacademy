SELECT
*
FROM
`games_and_more`.`games`;

SELECT
`name`,
`release_date`,
`developer_id`
FROM
`games_and_more`.`games`;

SELECT
`games`.`name` AS `Game Name`,
`devs`.`name` AS `Developer`
FROM `games_and_more`.`games` AS `games`
JOIN `games_and_more`.`developers` AS `devs` ON `games`.`developer_id` = `devs`.`id`;

