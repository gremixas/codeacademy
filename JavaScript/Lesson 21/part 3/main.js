const getData = async () => {
    try {
        const response = await fetch('https://boiling-reaches-93648.herokuapp.com/week-3/wedding');
        if (response.ok) {
            const data = await response.json();
            try {
                data.forEach(participant => postParticipant(participant));
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
