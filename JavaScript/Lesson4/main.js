const kaina = prompt('Įveskite prekės kainą');
const pristatymas = confirm('Ar reikalingas pristatymas?');

console.log(`Prekės kaina: ${kaina} €`);
if(pristatymas) {
  const miestas = prompt('Į kurį miestą reiks pristatyti?');
  
  if (kaina >= 50 || miestas === 'Vilnius') {
    console.log(`Prekę nemokamai pristatysime į ${miestas} per 1 - 3 dienas.`);
  } else {
    console.log('Pristatymas 20Eur');
    const suma = +kaina + 20;
    console.log(`Iš viso: ${suma}`);
    console.log(`Prekę pristatysime į ${miestas} per 1 - 3 dienas.`);
  }

} else {  
  console.log(`Prekę galite atsiimti nemokamai Vilniuje adresu Gedimino pr. 1a`);    
}
