const kvadratas = document.querySelector('.kvadratas');
const mygtukas = document.querySelector('.mygtukas');
let toggle = true;

kvadratas.addEventListener('mouseover', () => changeColor('firebrick'));

kvadratas.addEventListener('mouseout', () => changeColor('black'));

kvadratas.addEventListener('dblclick', () => changeColor('limegreen'));

mygtukas.addEventListener('click', () => {
  toggle = !toggle;
  // toggle? kvadratas.style.display = 'block': kvadratas.style.display = 'none';
  kvadratas.style.display = toggle ? 'block' : 'none';
})

function changeColor(color) {
  kvadratas.style.background = color;
}

