import { fetchData, postData } from './src/crud.js';

const dataApi = 'https://robust-safe-crafter.glitch.me/';

function buttonsRender(data, city) {
    const filterButtons = document.querySelector('.filter-buttons');
    const citiesButtonsArray = data.reduce((acc, house) => {
        !acc.includes(house.city) ? acc.push(house.city) : house.city;
        return acc;
    }, []);  
    filterButtons.innerHTML = '';
    citiesButtonsArray.forEach((location, index) => {
        if(index < 6 ) {
            const button = document.createElement('button');
            button.type = 'button';
            button.className = 'btn';
            button.innerText = location;
            if(location === city) button.classList.add('btn-active');
            button.addEventListener('click', () => filterHousesByCity(data, location));
            filterButtons.appendChild(button);
        }
    })
}

function cardsRender(data) {
    const content = document.querySelector('.content');
    // const card = document.querySelector('.card');
    let housesCards = '';
    data.forEach(house => {
        housesCards += `<div class="card">
                            <img class="picture" src="${house.image}">
                            <div class="container">
                                <h2 class="price">${house.price}&euro;</h2>
                                <span class="location">${house.city}</span>
                                <p class="description">${house.description}</p>
                            </div>
                        </div>`;
    });
    content.innerHTML = housesCards;
}

function filterHousesByCity (data, city) {
    buttonsRender(data, city);
    cardsRender(data.filter(house => house.city === city));
}

function init() {
    fetchData(dataApi).then((data) => {
        if (data) {
            buttonsRender(data);
            cardsRender(data);
        }
    });
}

init();