<?php
include_once(__DIR__ . "/app.php");

if ($_SERVER['REQUEST_METHOD'] != "POST") {
    // dd($_SERVER['REQUEST_METHOD']);
    echo "<h2>a jopsichmat</h2>";
    http_response_code("405");
    exit();
}

(function () {

    // dump($_POST);

    $url = "";

    $errorMsgs = validateData($_POST);

    if ($errorMsgs) {
        setErrorMessages($errorMsgs);
        $url = "login_form.php";
    } else {
        setSuccessMessage();
        $url = "login_form.php";
        $_SESSION['authenticated'] = 1;
        $url = "admin_page.php";
    }

    header("Location: $url");
})();

function validateData(array $data): array {
    $errorMsg = [];
    foreach ($data as $key => $value) {
        if (!$value) {
            $errorMsg[$key] = "Neuzpildytas laukelis: $key";
        }
    }
    return $errorMsg;
}

function setErrorMessages(array $messages): void {
    foreach ($messages as $message) {
        $_SESSION['messages'][] = [
            'status' => 0,
            'title' => 'Operacija nepavyko!',
            'body' => $message
        ];
    }
}

function setSuccessMessage(): void {
    $_SESSION['messages'][] = [
        'status' => 1,
        'title' => 'Operacija sėkminga!',
    ];
}

