<?php
include_once(__DIR__ . "/app.php");

if ($_SERVER['REQUEST_METHOD'] != "POST") {
    http_response_code("405");
}

if (!adminCheck()) {
    print_r("Who the fuck are you?");
    header("location: login_form.php");
}

if (!isset($_POST['id'])) {
    die("ID nereikia?");
}

(function () {
    $url = "update_form.php?id=" . $_POST['id'];

    /* Get the name of the file uploaded to Apache */
    $file = $_FILES['picture']['name'];
    $extension = pathinfo($file)['extension'];
    $updateImage = false;
    // If extension is wrong - set error message, else - move to directory
    if ($extension !== "jpg" && $extension !== "png") {
        // Validate::setErrorMessage("Invalid filetype. must be JPG or PNG");
    } else {
        /* Prepare to save the file upload to the upload folder */
        $location = __DIR__ . "/car_images/car" . $_POST['id'] . ".$extension";
        // dump($location);
        /* Permanently save the file upload to the upload folder */
        if ( move_uploaded_file($_FILES['picture']['tmp_name'], $location) ) {
            $updateImage = true;
        //     echo '<p>The HTML5 and php file upload was a success!</p>'; 
        // } else { 
        //     echo '<p>The php and HTML5 file upload failed.</p>'; 
        }
    }

    $errorMsgs = Validate::validateData($_POST);
    if ($errorMsgs) {
        Validate::setErrorMessages($errorMsgs);
    }

    $car = [
        'id' => $_POST['id'],
        'make' => $_POST['make'],
        'model' => $_POST['model'],
        'year' => $_POST['year'],
        'engine' => $_POST['engine'],
        'transmission' => $_POST['transmission'],
        'price' => $_POST['price'],
        'image' => pathinfo($location)['basename'],
    ];

    if(!$updateImage) {
        unset($car['image']);
    }

    if (empty($_SESSION['messages'])) {
        Car::updateCar($car);
    }

    header("location: $url");

})();