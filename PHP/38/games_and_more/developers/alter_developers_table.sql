-- Active: 1676911955202@@127.0.0.1@3306@games_and_more
UPDATE `games_and_more`.`games` AS `g`
LEFT JOIN `games_and_more`.`developers` AS `d` ON `g`.`developer` = `d`.`name`
SET `g`.`developer` = `d`.`id`;

ALTER TABLE `games_and_more`.`games`
CHANGE `developer` `developer_id` INT UNSIGNED NOT NULL;