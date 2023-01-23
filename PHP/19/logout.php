<?php

include_once(__DIR__ . "/app.php");

(function () {
    if ($_GET['logout'] ?? false) {
        unset($_SESSION['authenticated']);
        // dd($_SESSION);
        echo "logout'as";
        header("Location: admin_page.php");
    }
})();

