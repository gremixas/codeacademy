import fruits from './fruits.json' assert {type: 'json'}

const angliavandeniai = document.querySelector("#angliavandeniai");
const maxBaltymu = document.querySelector("#max-baltymu");
const riebalai = document.querySelector("#riebalai");
const kalorijos = document.querySelector("#kalorijos");
const visiCukrai = document.querySelector("#visi-cukrai");
const rezultatas = document.querySelector("#rezultatas");

angliavandeniai.addEventListener('click', (e) => {
    rezultatas.innerHTML = '<h2>Angliavandeniai TOP 10</h2>';
    rezultatas.innerHTML += fruits
    .sort((a, b) => b.nutritions.carbohydrates - a.nutritions.carbohydrates)
    .filter((item, index) => index < 11)
    .reduce((acc, item) => acc += `<p>${item.name} - ${item.nutritions.carbohydrates}</p>`, '');
});

maxBaltymu.addEventListener('click', (e) => {
    rezultatas.innerHTML = '<h2>Baltymai TOP 10</h2>';
    rezultatas.innerHTML += fruits
    .sort((a, b) => b.nutritions.protein - a.nutritions.protein)
    .filter((item, index) => index < 11)
    .reduce((acc, item) => acc += `<p>${item.name} - ${item.nutritions.protein}</p>`, '');
});

riebalai.addEventListener('click', (e) => {
    rezultatas.innerHTML = '<h2>Riebalu daugiau uz 5</h2>';
    rezultatas.innerHTML += fruits
    .sort((a, b) => b.nutritions.fat - a.nutritions.fat)
    .filter(item => item.nutritions.fat > 5)
    .reduce((acc, item) => acc += `<p>${item.name} - ${item.nutritions.fat}</p>`, '');
});

kalorijos.addEventListener('click', (e) => {
    rezultatas.innerHTML = '<h2>Visu vaisiu kalorijos</h2>';
    rezultatas.innerHTML += fruits
    .sort((a, b) => b.nutritions.calories - a.nutritions.calories)
    .reduce((acc, item) => acc += item.nutritions.calories, 0);
});

visiCukrai.addEventListener('click', (e) => {
    rezultatas.innerHTML = '<h2>Visi cukrai</h2>';
    rezultatas.innerHTML += fruits
    .sort((a, b) => b.nutritions.sugar - a.nutritions.sugar)
    .reduce((acc, item) => acc += `<p>${item.name} - ${item.nutritions.sugar}</p>`, '');
});
