const articles = document.querySelectorAll("article");

articles.forEach(article => {
    article.addEventListener("click", (e) => {
        window.location = "show_pet.php?id=" + e.currentTarget.attributes.data.value;
    })
});
