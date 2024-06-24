import { postData } from "./src/crud.js";

const dataApi = 'https://robust-safe-crafter.glitch.me/';

const httpRegex = /^https?:\/\/(?:www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b(?:[-a-zA-Z0-9()@:%_\+.~#?&\/=]*)$/;

const img = document.querySelector('#image');
const price = document.querySelector('#price');
const description = document.querySelector('#description');
const city = document.querySelector('#select');
const form = document.querySelector('form');
const errorOutput = document.querySelector('.error-msg');

form.addEventListener('submit', e => {
    e.preventDefault();
    const imageUrl = img.value;
    const priceValue = price.value;
    const desciptionText = description.value;
    const citySelected = city.value;

    if(!httpRegex.test(imageUrl)) return errorOutput.innerText = 'Invalid image URL.';
    if(!+priceValue || (priceValue != +priceValue)) return errorOutput.innerText = 'Invalid price.';
    if(!desciptionText) return errorOutput.innerText = 'Tell everyone something about your house.';
    if(!citySelected) return errorOutput.innerText = 'Select a city.';

    const data = {
        image: imageUrl,
        city: citySelected,
        price: priceValue,
        description: desciptionText
    }

    postData(data, dataApi).then(() => errorOutput.innerText = 'Successfully added!').then(() => setTimeout(() => window.location.href = 'index.html', 3000));

})
