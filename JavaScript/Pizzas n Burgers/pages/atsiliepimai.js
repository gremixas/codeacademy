import { loadItems, pushToStorage, removeFromStorage, getItem, storageKey } from '../src/localStorage.js'

const textArea = document.querySelector('#tekstas');
const formElement = document.querySelector('form');
const posts = document.querySelector('.posts');

formElement.addEventListener('submit', (e) => {
    e.preventDefault();
    pushToStorage(storageKey, textArea.value);
    renderFeedbacks();
})

function renderFeedbacks() {
    const lsItems = loadItems(storageKey);
    lsItems.forEach(element => {
        posts.innerHTML += `<p>${element}</p>`;
    });
}

renderFeedbacks();