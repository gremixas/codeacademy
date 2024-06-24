import { fetchData, postData } from './src/crud.js';

const dataApi = 'https://glistening-grey-gerbera.glitch.me/users';

const dataEl = document.querySelector('#data');
const formEl = document.querySelector('#formElem');

formEl.onsubmit = async (event) => {
    event.preventDefault();
    const idValue = formEl.querySelector('#id').value;
    const nameValue = formEl.querySelector('#name').value;
    const birthdayValue = formEl.querySelector('#birthday').value;
    const data = {
        id: idValue,
        name: nameValue,
        birthday: birthdayValue
    }
    // console.log(data);
    postData(data, dataApi).then(data => displayData(data));
}

function displayData(data) {
    let tableRow = '';
    data.forEach(item => {
        const today = new Date();
        const birthday = new Date(item.birthday);
        const age = today.getFullYear() - birthday.getFullYear();
        tableRow += `<tr>
                        <td>${item.id}</td>
                        <td>${item.name}</td>
                        <td>${!!age ? age : 'Nėra duomenų.'}</td>
                        <td>${!!birthday ? birthday.toLocaleDateString() : 'Nėra duomenų.'}</td>
                    </tr>`
    })
    const tableBody = `<table class="table">
                           <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Vardas</th>
                                    <th scope="col">Amžius</th>
                                    <th scope="col">Gimimo diena</th>
                                </tr>
                            </thead>
                            ${tableRow}
                            </table>`

    dataEl.innerHTML = tableBody;
    console.log(data)
}

function init() {
    fetchData(dataApi).then((data) => {
        if (data) {
            displayData(data);
        }
    });
}

init();