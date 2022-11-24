const form = document.querySelector('form');
const input = form.elements.namedItem('name');
const content = document.querySelector(".content");
const storageKey = 'names';

// localStorage.clear();

loadItems();

function loadItems() {
  const names = JSON.parse(localStorage.getItem(storageKey)) || [];
  names.forEach(item => {
    appendItem(item);
  })
}

function appendItem(text) {
  const div = document.createElement('div');
  div.classList.add('card');
  const h2 = document.createElement('h2');
  const button = document.createElement('button');
  button.innerText = 'Delete'
  h2.innerText = text;
  div.append(h2, button);
  content.append(div);
  button.addEventListener('click', () => {
    removeFromStorage(storageKey, text);
    div.remove();
  })
}

function pushToStorage(key, str) {
  let names = getItem();
  names.push(str);
  localStorage.setItem(key, JSON.stringify(names));
}

function removeFromStorage(key, arg) {
  if (!(typeof arg === 'string' || typeof arg === 'number')) return;
  const names = getItem();
  let removed = [];
  if (typeof arg === 'string') removed = names.filter(item => item !== arg);
  if (typeof arg === 'number') removed = names.filter((item, i) => i !== arg);
  localStorage.setItem(key, JSON.stringify(removed));
}

form.addEventListener('submit', (e) => {
//   e.preventDefault();
  const text = input.value;
  const names = getItem();
  if (text && !names.includes(text)) {
    pushToStorage(storageKey, text);
    // appendItem(text);
  }
})

function getItem() {
  return JSON.parse(localStorage.getItem(storageKey)) || [];
}

