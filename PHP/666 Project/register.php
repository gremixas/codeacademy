<?php
include_once(__DIR__ . "/app.php");

if ($_SERVER['REQUEST_METHOD'] != "POST") {
    http_response_code("405");
    header("Location: register_form.php");
}

(function () {

    $url = "";

    $errorMsgs = Validate::validateData($_POST);
    $_SESSION['registration_form_data'] = json_encode($_POST);

    if ($errorMsgs) {
        Validate::setErrorMessages($errorMsgs);
        $url = "register_form.php";
    } else {
        // unset($_SESSION['register_form_data']);
        Validate::setSuccessMessage("Registered");
        
        $post = $_POST;
        $post['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $user = new User($post['first_name'], $post['last_name'], $post['email'], $post['password']);
        User::createUser($user);

        $url = "index.php";
    }

    header("Location: $url");
})();

