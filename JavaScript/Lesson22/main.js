const body = document.querySelector('body');

const onlyVip = document.createElement('span');
onlyVip.innerText = 'Only VIP';
const checkbox = document.createElement('input');
checkbox.type = 'checkbox';
checkbox.className = 'checkbox';
const label = document.createElement('label');
label.setAttribute('for', 'input')
label.innerText = 'Search:';
const input = document.createElement('input');
input.id = 'input';

const table = document.createElement('table');
const thead = document.createElement('thead');
const tbody = document.createElement('tbody');
const thId = document.createElement('th');
const thImg = document.createElement('th');
const thFirstName = document.createElement('th');
const thLastName = document.createElement('th');
const thCity = document.createElement('th');
const thFavColor = document.createElement('th');
const thVip = document.createElement('th');

thId.innerText = 'ID';
thImg.innerText = 'Pic';
thFirstName.innerText = 'First name';
thLastName.innerText = 'Last name';
thCity.innerText = 'City';
thFavColor.innerText = 'Favourite color';
thVip.innerText = 'VIP';
thead.append(thId, thImg, thFirstName, thLastName, thCity, thFavColor, thVip);
table.append(thead, tbody);
body.append(onlyVip, checkbox, label, input, table);


let data = [];

const getData = async () => {
    try {
        const response = await fetch('https://magnetic-melon-yam.glitch.me');
        if (response.ok) {
            data = await response.json();
            try {
                // console.log(data);
                showData();
            } catch {
                throw new Error("Something's wrong with the data...");
            }
        } else {
            throw new Error(`Oh no... URL must be invalid. Returned with ${response.status}: ${response.statusText}`)
        }
    }
    catch (error) {
        console.log(error);
    }
}

getData();

checkbox.addEventListener('change', showData);
input.addEventListener('input', showData);

function showData() {
    const checked = checkbox.checked;
    const search = input.value
    tbody.innerHTML = '';
    data.filter((item) => !checked || item.vip).filter(item => item.name.toLowerCase().includes(search.toLowerCase())).forEach(item => {
        const tdId = document.createElement('td');
        const tdImg = document.createElement('td');
        const tdFirstName = document.createElement('td');
        const tdLastName = document.createElement('td');
        const tdCity = document.createElement('td');
        const tdFavColor = document.createElement('td');
        const tdVip = document.createElement('td');
        const tr = document.createElement('tr');
        const img = document.createElement('img');
        tdId.innerText = item.id;
        img.src = item.image;
        tdImg.appendChild(img);
        tdFirstName.innerText = item.name.split(' ')[0];
        tdLastName.innerText = item.name.split(' ')[1];
        tdCity.innerText = item.city;
        tdFavColor.innerText = item.fav_color;
        tdVip.innerText = item.vip ? '\u2713' : '\u2212';
        tr.append(tdId, tdImg, tdFirstName, tdLastName, tdCity, tdFavColor, tdVip);
        tbody.appendChild(tr);
    }) 
}
