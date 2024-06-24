<?php
$post = $_POST;

if (isset($post)) {
    // print_r($_POST);
    header("Location: form.php?first_name={$post['first_name']}&last_name={$post['last_name']}");
}
