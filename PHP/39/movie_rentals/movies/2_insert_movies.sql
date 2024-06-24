-- Active: 1676911882923@@127.0.0.1@3306@movie_rentals

INSERT INTO
    `movie_rentals`.`movies`(
        `title`,
        `description`,
        `release_date`,
        `runtime`,
        `rating`,
        `image`
    )
VALUES (
        'Titanic',
        'Titanic is a 1997 American epic romance and disaster film directed, written, produced, and co-edited by James Cameron.',
        '1977-11-01',
        195,
        'PG-13',
        'https://play-lh.googleusercontent.com/560-H8NVZRHk00g3RltRun4IGB-Ndl0I0iKy33D7EQ0cRRwH78-c46s90lZ1ho_F1soo'
    ), (
        'Inception',
        'Inception is a 2010 science fiction action film[4][5][6] written and directed by Christopher Nolan, who also produced the film with Emma Thomas, his wife.',
        '2010-07-08',
        148,
        'PG-13',
        'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.imdb.com%2Ftitle%2Ftt1375666%2F&psig=AOvVaw1RTy4irZNCWtCsC9bQQR04&ust=1677092778248000&source=images&cd=vfe&ved=0CBAQjRxqFwoTCKCnrsynp_0CFQAAAAAdAAAAABAE'
    ), (
        'Forrest Gump',
        'Forrest Gump is a 1994 American comedy-drama film directed by Robert Zemeckis and written by Eric Roth. ',
        '1994-06-23',
        142,
        'PG-13',
        'https://m.media-amazon.com/images/M/MV5BZmFkMzc2NTctN2U1Ni00MzE5LWJmMzMtYWQ4NjQyY2MzYmM1XkEyXkFqcGdeQXVyNTIzOTk5ODM@._V1_.jpg'
    ), (
        "Scary Movie",
        "A year after disposing of the body of a man they accidentally killed, a group of dumb teenagers are stalked by a bumbling serial killer.",
        "2000-07-07",
        88,
        "PG-13",
        'https://m.media-amazon.com/images/M/MV5BZmFkMzc2NTctN2U1Ni00MzE5LWJmMzMtYWQ4NjQyY2MzYmM1XkEyXkFqcGdeQXVyNTIzOTk5ODM@._V1_.jpg'
    ), (
        "American Pie",
        "Four teenage boys enter a pact to lose their virginity by prom night.",
        "1999-07-09",
        95,
        "R",
        'https://images.moviesanywhere.com/2afb9a102853b93e2e1784e73bacabdd/8dfec5ad-fddf-45d6-95e6-8b9fb4ff3dd6.jpg'
    ), (
        "Harry Potter and the Deathly Hallows: Part 2",
        "Harry, Ron, and Hermione search for Voldemort's remaining Horcruxes in their effort to destroy the Dark Lord as the final battle rages on at Hogwarts.",
        "2011-07-07",
        130,
        "PG-13",
        'https://sanfranciscoparksalliance.org/wp-content/uploads/2022/05/Harry-Potter.png'
    )