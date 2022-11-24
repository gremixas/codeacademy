const getData = async () => {
    try {
        const response = await fetch('https://randomuser.me/api/');
        if (response.ok) {
            const data = await response.json();
            if (data !== undefined) {
                let user = [];
                user.fullName = data.results[0].name.first + ' ' + data.results[0].name.last;
                user.age = data.results[0].dob.age;
                user.email = data.results[0].email;
                user.picture = data.results[0].picture.large;
                postProfile(user);
            } else {
                console.log("No data...");
            }
        } else {
            console.log("Something's wrong...");
        }
    }
    catch (error) {
        console.log(error);
    }
}

getData();

function postProfile(user) {
    const profile = document.querySelector('.profile');
    const div = document.createElement('div')
    const img = document.createElement('img');
    img.src = user.picture;
    img.alt = user.fullName;
    const name = document.createElement('span');
    name.className = 'name';
    const age = document.createElement('span');
    age.className = 'age';
    const email = document.createElement('span');
    email.className = 'email';
    name.innerText = user.fullName;
    age.innerText = `${user.age} years old`;
    email.innerText = user.email;
    div.appendChild(name);
    div.appendChild(age);
    profile.appendChild(img);
    profile.appendChild(div);
    profile.appendChild(email);
}
