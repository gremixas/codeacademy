import { fetchData } from "../src/crud.js";
const productsContainer = document.querySelector('.products-container');
const filterOptions = document.querySelector('.filter-options');

// country: "New York, NY"
// dsc: "Half Bo Ssäm Dinner for 4-6"
// id: "bo-ssam-dinner-for-4-6"
// img: "https://goldbelly.imgix.net/uploads/showcase_media_asset/image/110906/bo-ssam-dinner-for-4.c4a32e8801e2f0283e0565bbe8493149.jpg?ixlib=react-9.0.2&auto=format&ar=1%3A1"
// name: "Momofuku"
// price: 169
// rate: 4
// type: "burger"

fetchData().then((data) => {
    let cards = '';
    data.forEach(product => {
        cards += `<div class="card">
                        <img class="card-img" src="${product.img}">
                        <h3 class="card-name">${product.name}</h3>
                        <h6 class="card-dsc">${product.dsc}</h6>
                        <span class="card-country">${product.country}</span>
                        <span class="card-price">${product.price}</span>
                    </div>`;
    });
    productsContainer.innerHTML = cards;
    console.log(data)
});
