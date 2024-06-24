const myForm = document.querySelector('form');

myForm.addEventListener('submit', (event) => {
    event.preventDefault();
    const userName = myForm.elements['username'];
    const email = myForm.elements['email'];
    const userNameValid = nameValidation(userName);
    const emailValid = emailValidation(email);

    if (userNameValid && emailValid) {
        // window.location.href = 'http://www.google.com';
        alert('Registracija sekminga!');
    }
})

function nameValidation(inputElement) {
    if (!hasValue(inputElement)) {
        return false;
    }
    showMessage(inputElement.parentNode, 'Valid.');
    return true;
}

function emailValidation(inputElement) {
    const re = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/;

    if (!hasValue(inputElement)) {
        return false;
    }

    if (!inputElement.value.match(re)) {
        showMessage(inputElement.parentNode, 'Invalid email.');
        return false;
    }
    showMessage(inputElement.parentNode, 'Valid.');
    return inputElement.value.match(re);
}

function hasValue(inputElement) {
    if (inputElement.value === '') {
        showMessage(inputElement.parentNode, 'Required field.');
        return false;
    }
    return true;
}

function showMessage(parentElement, msg) {
    parentElement.querySelector('small').innerText = msg; 
}
