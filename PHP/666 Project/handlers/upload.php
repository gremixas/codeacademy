<?php

if (empty($_POST['id'])) {
    die("ID nereikia?");
}

/* Get the name of the file uploaded to Apache */
$filename = $_FILES['file']['name'];
$extension = pathinfo($filename)['extension'];
// die($extension);

/* Prepare to save the file upload to the upload folder */
// $location = __DIR__ . "/../car_images/" . $filename . ".$extension";
$location = __DIR__ . "/../car_images/" . $_POST['id'] . ".$extension";

/* Permanently save the file upload to the upload folder */
if ( move_uploaded_file($_FILES['file']['tmp_name'], $location) ) { 
    echo '<p>The HTML5 and php file upload was a success!</p>'; 
} else { 
    echo '<p>The php and HTML5 file upload failed.</p>'; 
}


// $uploads_dir = '/../car_images';

// foreach ($_FILES["pictures"]["error"] as $key => $error) {
//     if ($error == UPLOAD_ERR_OK) {
//         $tmp_name = $_FILES["pictures"]["tmp_name"][$key];
//         // basename() may prevent filesystem traversal attacks;
//         // further validation/sanitation of the filename may be appropriate
//         $name = basename($_FILES["pictures"]["name"][$key]);
//         move_uploaded_file($tmp_name, "$uploads_dir/$name");
//     }
// }

?>