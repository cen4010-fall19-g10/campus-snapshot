<?php
session_start();

include("Database/Database.class.php");
include("User/User.class.php");
include("Incident/Incident.class.php");

$user = new User();
$incident = new Incident();

if(!$user->is_logged_in()) {
    header('Location: ../index.php');
}

$title = trim($_POST['title']);
$desc = trim($_POST['desc']);

$target_dir = "../user_uploaded_images/";
$image_name = basename(time() . "_" . $_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . $image_name;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5 * 1048576) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

        $incident->create_incident($user->getId(), $title, $image_name, $desc);
        header('Location: ../index.php');

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
