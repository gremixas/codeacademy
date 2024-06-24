const getData = async () => {
    try {
        const response = await fetch('https://boiling-reaches-93648.herokuapp.com/week-3/party')
        if (response.ok) {
            const data = await response.json();
            const theOne = data.filter(item => item.name === 'Kristupas Lapeika')[0];
            if (theOne) {
                postProfile(theOne);
                console.log(theOne.vip);
            } else {
                console.log("Kristupas doesn't exist");
            }
        } else {
            return console.log("Something's wrong...");
        }
    } catch (error) {
        console.log('Error:', error)
    }
}

getData();

function postProfile(user) {
    const profile = document.querySelector('.profile');
    const div = document.createElement('div')
    const name = document.createElement('span');
    name.className = 'name';
    const vip = document.createElement('span');
    vip.className = 'vip';
    name.innerText = `${user.name} ${user.vip ? 'is VIP' : 'is not VIP'}`;
    vip.innerText = user.vip;
    div.appendChild(name);
    profile.append(div, vip);
    profile.appendChild(div);
    profile.appendChild(vip);
}