const FetchPromise = new Promise((resolve, reject) => {
    fetch('https://boiling-reaches-93648.herokuapp.com/week-3/wedding')
    .then(response => {
        if(response.ok) {
            resolve(response.json())
        } else {
            throw new Error(`Oh no... URL must be invalid. Returned with ${response.status}: ${response.statusText}`)
        }
    })
    .catch(error => reject(error));
})

FetchPromise
.then(data => {
    try {
        data.forEach(participant => postParticipant(participant));
    } catch {
        throw new Error("Something's wrong with the data...");
    }
})
.catch(error => console.log(error));

function postParticipant(participant) {
    const participants = document.querySelector('.participants');
    const row = document.createElement('tr');
    const name = document.createElement('td');
    name.innerText = participant.name;
    const plusOne = document.createElement('td');
    plusOne.innerText = participant.plusOne ? '\u2713' : '\u2212';
    const attending = document.createElement('td');
    attending.innerHTML = participant.attending ? '\u2713' : '\u2212';
    row.appendChild(name);
    row.appendChild(plusOne);
    row.appendChild(attending);
    participants.appendChild(row);
}
