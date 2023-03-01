ALTER TABLE `movie_rentals`.`movies`
ADD CONSTRAINT `FK_movies_actors`
FOREIGN KEY (`actor_id`)
REFERENCES `actors`(`id`)
ON UPDATE CASCADE ON DELETE RESTRICT;
