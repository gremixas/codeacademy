<?php
class Game {
    private const MIN_RATING = 1;
    private const MAX_RATING = 10;

    public function __construct(
        public string $name,
        public string $genre,
        public int $rating,
        public DateTime $date,
        ){
            $this->checkRating();
        }

        private function checkRating(): self {
            if ($this->rating < self::MIN_RATING || $this->rating > self::MAX_RATING) {
                die("Rating must be between " . self::MIN_RATING . " and " . self::MAX_RATING . ".");
            }
            return $this;
        }
}

$mario = new Game("Super Mario", "Arcade", 10, new DateTime("1990-01-01"));

print_r($mario);

