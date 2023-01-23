document.querySelector("a[href='remove_country.php?action=remove']").addEventListener("click", (e) => {
    confirm("Ar tikrai?") ? null : e.preventDefault();
});
