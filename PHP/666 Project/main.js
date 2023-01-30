console.log(userLoggedIn ? "User is logged in." : "no user login...");
console.log(adminLoggedIn ? "Admin is logged in." : "no admin login...");

if (userLoggedIn) {
    document.querySelector(".login-links").remove();    
    document.querySelector(".menu-links-area > .login-links").remove();    
} else {
    document.querySelector(".user-menu").remove();
}

const interval = 3000;
const timeout = 3000;
const myInterval = setInterval(deleteElement, interval);

function deleteElement() {
    const message = document.querySelector(".message");
    if (message === null) {
        clearInterval(myInterval);
        return;
    }
    message.style.opacity = "0";
    setTimeout(() => {
        message.style.display = "none";
    }, 300);
    setTimeout(() => {
        message.remove();
    }, timeout - 100);
}
