'use strict';

const mygtuks = document.querySelector('.mygtuks');
const content = document.querySelector('.content');

let a = 0;

function bigger() {
    setTimeout(() => {
        content.style.fontSize = a + 'px'
        if (window.getComputedStyle(document.querySelector('.content')).fontSize === '98px') {
            smaller();
            content.innerText = 'bouncing';
        }
        a++;
        if (a < 100) {
            bigger();
        }
    }, 20);
}

function smaller() {
    setTimeout(() => {
        content.style.fontSize = a + 'px';
        a--;
        if (a > 60) {
            smaller();
        }
    }, 20);
}

mygtuks.onclick = function() {
    bigger();
}

