<?php
session_start();

$get = $_GET;

if (isset($get['action']) && $get['action'] == "remove") {
    echo "removed";
    unset($_SESSION['country']);
    header("Location: select_country.php");
} else {
    echo "What?";
}
