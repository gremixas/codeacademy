ALTER TABLE `games_and_more`.`games`
DROP COLUMN `score`;

ALTER TABLE `games_and_more`.`games`
ADD COLUMN `score` INT UNSIGNED NULL AFTER `description`,
ADD COLUMN `review` TEXT NULL AFTER `score`;

ALTER TABLE `games_and_more`.`games`
MODIFY `platforms` VARCHAR(50) NOT NULL,
MODIFY `score` FLOAT NULL;

ALTER TABLE `games_and_more`.`games`
CHANGE `platforms` `platforms` VARCHAR(50) NOT NULL,
CHANGE `score` `score` FLOAT NULL;

-- ALTER TABLE `games_and_more`.`games`
-- RENAME COLUMN `platformos` TO `platforms`,
-- RENAME COLUMN `scores` TO `score`;

UPDATE `games_and_more`.`games`
SET `scores` = 9.9, `review` = "nice" 
WHERE `id` IN (1, 5, 7);
