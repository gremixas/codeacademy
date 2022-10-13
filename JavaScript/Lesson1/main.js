
// const workingPeople = 1761463;
// const budget = 8487300000;
// const salary = prompt('Iveskite bazinio uzmokescio dydi');
// const lotsOfMoney = salary * workingPeople;

// const answer = ((lotsOfMoney * 100) / budget).toFixed(2);

// console.log('Biudzetas', budget);
// console.log('Uzdirbti pinigai', lotsOfMoney);
// console.log('Uzdirbti pinigai sudaro tiek proc. biudzeto:', answer, '%');

// fonoSpalva = prompt('iveskite fono spalvos pavadinima');

// // document.write('tekstas');

// window.onload = function(){
//     var output = document.getElementById('output');
//     // console.log(output);
//     // output.innerHTML = "test";
//     output.style.background = fonoSpalva;
//   };

// let vardas = 'Nobody';
// const birthDay = 'Balandzio 23';
// vardas = prompt('Ivesk varda', 'Andrius');
// console.log(vardas, 'yra gimes', birthDay);

// console.log('Hello World');
// alert('I love JavaScript');
// confirm('Ready to learn more?');


// const skaicius = prompt('Ivesk skaiciu:');

// if (skaicius > 0 && skaicius < 11)
// {
//     console.log(skaicius);
// }


for (let index = 2; index < 11; index++) {
    if (index % 2 === 0) {
        console.log(`ìndex yra ${index}`);
    }
}


const browser = 'Edge';

if (browser === 'Edge') {
    console.log('you have Edge');
} else if (browser === 'Chrome' || browser === 'Firefox' || browser === 'Safari' || browser === 'Opera') {
    console.log('ok we support this');
} else {
    console.log('we hope for the best');
}

