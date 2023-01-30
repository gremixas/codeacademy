<?php
include_once(__DIR__ . "/app.php");

if ($_SERVER['REQUEST_METHOD'] != "POST") {
    http_response_code("405");
    header("Location: login_form.php");
}

$_SESSION['login_form_data'] = json_encode($_POST);


(function () {
   
    $url = "";

    $errorMsgs = Validate::validateData($_POST);

    $user = User::findUserByEmail($_POST['email']);
    // dump($_POST['email']);
    // dd($user);

    $passwCheck = password_verify($_POST['password'], $user['password']);

    if (!$passwCheck && !empty($_POST['password']) && !empty($user)) {
        Validate::setErrorMessage("Wrong password.");
    }

    if (empty($user)) {
        Validate::setErrorMessage("Unknown user or e-mail.");
    }

    if ($errorMsgs || !$passwCheck) {
        Validate::setErrorMessages($errorMsgs);
        $url = "login_form.php";
    } else {
        // unset($_SESSION['login_form_data']);
        Validate::setSuccessMessage();

        $_SESSION['token'] = $user['password'];

        // $url = "bookings.php";
        $url = "login_form.php";
    }

    header("Location: $url");
})();

