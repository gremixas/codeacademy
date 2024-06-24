UPDATE `games_and_more`.`games` AS `g`
LEFT JOIN `games_and_more`.`developers` AS `d` ON `g`.`developer` = `d`.`name`
SET `g`.`developer` = `d`.`id`;

SELECT
`g`.`developer`,
`d`.`id`
FROM `games_and_more`.`games` AS `g`
LEFT JOIN `games_and_more`.`developers` AS `d` ON `g`.`developer` = `d`.`name`;

ALTER TABLE `games_and_more`.`games`
CHANGE `developer` `developer_id` INT UNSIGNED NOT NULL;
