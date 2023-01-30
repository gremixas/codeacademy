<?php
include_once(__DIR__ . "/app.php");

if ($_SERVER['REQUEST_METHOD'] != "POST") {
    http_response_code("405");
}

if (!adminCheck()) {
    print_r("Who the fuck are you?");
    header("location: login_form.php");
}

$_SESSION['add_car_form_data'] = json_encode($_POST);

(function () {
    $url = "add_car_form.php";

    $freeId = Car::freeId();

   /* Get the name of the file uploaded to Apache */
    $file = $_FILES['picture']['name'];
    $extension = pathinfo($file)['extension'];
    $location = "";
    // If extension is wrong - set error message, else - move to directory
    if ($extension !== "jpg" && $extension !== "png") {
        Validate::setErrorMessage("Invalid filetype. must be JPG or PNG");
    } else {
        /* Prepare to save the file upload to the upload folder */
        $location = __DIR__ . "/car_images/car" . $freeId . ".$extension";
        // dd($location);
    }

    $errorMsgs = Validate::validateData($_POST);
    if ($errorMsgs) {
        Validate::setErrorMessages($errorMsgs);
    }

    /* Permanently save the file upload to the upload folder */
    if (move_uploaded_file($_FILES['picture']['tmp_name'], $location)) {
    //     echo '<p>The HTML5 and php file upload was a success!</p>'; 
    } else { 
        // echo '<p>The php and HTML5 file upload failed.</p>'; 
        Validate::setErrorMessage("Image file upload failed.");
    }
    // dd(pathinfo($location)['basename']);
    if (empty($_SESSION['messages'])) {
        $car = new Car(
            (string)$freeId,
            $_POST['make'],
            $_POST['model'],
            $_POST['year'],
            $_POST['engine'],
            $_POST['transmission'],
            $_POST['price'],
            pathinfo($location)['basename'],
        );
        // dd($car);
        Car::createCar($car);
        Validate::setSuccessMessage("Car added.");
        $url = "index.php";
    }

    header("location: $url");

})();