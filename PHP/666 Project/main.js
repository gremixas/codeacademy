console.log(userLoggedIn ? "User is logged in." : "no login...");

if (userLoggedIn) {
    document.querySelector(".login-links").remove();    
    document.querySelector(".menu-links-area > .login-links").remove();    
} else {
    document.querySelector(".user-menu").remove();
}

// const interval = 3000;
// let timeout = 3000;
// const myInterval = setInterval(deteleElement, interval);

// function deteleElement() {
//     const message = document.querySelector(".message");
//     if (message === null) {
//         clearInterval(myInterval);
//         return;
//     }
//     message.style.opacity = "0";
//     setTimeout(() => {
//         message.style.display = "none";
//     }, 300);
//     setTimeout(() => {
//         message.remove();
//     }, timeout - 100);
//     // timeout = timeout + interval;
// }


// let photo = document.getElementById("image-file").files[0];
// let formData = new FormData();
     
// formData.append("photo", photo);
// fetch('/car_images', {method: "POST", body: formData});

