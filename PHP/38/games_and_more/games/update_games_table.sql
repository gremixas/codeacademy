-- Active: 1676911955202@@127.0.0.1@3306@movie_rentals

UPDATE
 `games_and_more`.`games`
SET
  `score` = 8.0,
  `review` = 'Nice'
WHERE `id` IN (1,7,5);

UPDATE
 `games_and_more`.`games`
SET
  `score` = 8.5,
  `review` = 'Nice plus'
WHERE `id` = 2;

UPDATE
 `games_and_more`.`games`
SET
  `score` = 9,
  `review` = 'Very Nice'
WHERE `id` = 3;

UPDATE
 `games_and_more`.`games`
SET
  `score` = 0,
  `review` = 'NOT REVIEWED'
WHERE `score` = 1;
