<?php

// 1. Duomenų bazėje sukurti lentelę "movies", kuri turės tokius stulpelius:

// id,
// title
// description
// release_date - data
// runtime - trukmė minutėmis
// rating - amerikoniškas reitingas (MPAA)
// created_at
// updated_at
// deleted_at

// 3. Įvesti 5 filmų įrašus naudojat INSERT užklausą. Naudokite 1 užklausą.

// 4. Parašyti ALTER užklausą, kad pridėti papildomus stulpelius:
// image
// genre
// language 
// country 

// Visų stulpelių duomenų tipai tekstiniai. 

// 5. Parašyti UPDATE užklausas, kad užpildyti visus naujai sukurtus stulpelius kiekvienam įrašui. 5 update 5 įrašams :)
// Naudoti realius duomenis, jokiu 'aaa','bbbb';  

// 6. Parašyti MODIFY užklausą, kad 4 punkte sukurtų stulpelių atributus NULL pakeisti į NOT NULL.

// 7. PARAŠYTI SELECT užklausą:

// a. paimti duomenis -  title, language, release_date, image.
// b. paimti tik tuos filmus, kurių trukmė mažiau nei 2val.
// c. rezultato įrašai surikiuojami pagal release_date,  naujausi viršuje.