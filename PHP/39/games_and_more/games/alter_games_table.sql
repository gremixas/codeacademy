-- Active: 1676911882923@@127.0.0.1@3306@games_and_more

-- dev move
-- ALTER TABLE `games_and_more`.`games` DROP COLUMN `score`;

ALTER TABLE `games_and_more`.`games` 
ADD COLUMN `score` INT UNSIGNED NULL AFTER `description`,
ADD COLUMN `review` TEXT NULL AFTER `score`;

-- MODIFY keičiami stulpelio atributai, bet ne pavadinimas
ALTER TABLE `games_and_more`.`games`
MODIFY `platforms` VARCHAR(500) NOT NULL,
MODIFY `score` FLOAT NOT NULL;


ALTER TABLE `games_and_more`.`games`
ADD CONSTRAINT `FK_games_developers`
FOREIGN KEY (`developer_id`)
REFERENCES `developers`(`id`)
ON UPDATE CASCADE ON DELETE RESTRICT;

-- CHANGE keičiamas ir pavadinimas ir atributai
-- ALTER TABLE `games_and_more`.`games`
-- CHANGE `platforms` `platforms` VARCHAR(500) NOT NULL,
-- CHANGE `score` `score` FLOAT NULL;

-- RENAME keičiamas tik stulpelio pavadinimas

-- ALTER TABLE `games_and_more`.`games`
-- RENAME COLUMN `platformos` TO `platforms`,
-- RENAME COLUMN `scores` TO `score`;