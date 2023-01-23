<?php
session_start();

$post = $_POST;

if (isset($post['country']) && $post['country'] != "") {
    $_SESSION['country'] = $post['country'] ?? "";
    header("Location: select_country.php");
} else {
    echo "What?";
}
