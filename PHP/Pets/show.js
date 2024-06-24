document.querySelector("body").addEventListener("click", (e) => {
    if (e.target.tagName === "BODY") {
        window.location = "index.php"
    }
});