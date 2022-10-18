const form = document.querySelector("form");

const NAME_REQUIRED = "Vardo laukas privalomas";
const EMAIL_REQUIRED = "El. pašto laukas privalomas";
const EMAIL_INVALID = "Neteisingai įvestas el. paštas";

form.addEventListener("submit", (event) => {
  event.preventDefault();

  const nameField = form.elements["name"];
  const emailField = form.elements["email"];

  const nameValid = hasValue(nameField, NAME_REQUIRED);
  const emailValid = validateEmail(emailField, EMAIL_REQUIRED, EMAIL_INVALID);

  if (nameValid && emailValid) {
    alert("Duomenys įvesti teisingai");
  }
});

function showMessage(input, message) {
  const msg = input.parentNode.querySelector("small");
  msg.innerText = message;
}

function showError(input, message) {
  showMessage(input, message);
  input.classList.add("error");
  input.classList.remove("success");
}

function showSuccess(input) {
  showMessage(input, "");
  input.classList.add("success");
  input.classList.remove("error");
}

function hasValue(input, message) {
  if (input.value.trim() === "") {
    showError(input, message);
    return false;
  }
  showSuccess(input);
  return true;
}

function validateEmail(input, requiredMsg, invalidMsg) {
  if (!hasValue(input, requiredMsg)) {
    return false;
  }

  const emailRegex =
    /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

  const email = input.value.trim();

  if (!emailRegex.test(email)) {
    showError(input, invalidMsg);
    return false;
  }
  return true;
}



