<?php
session_start();

include("includes/Database/Database.class.php");
include("includes/User/User.class.php");

$user = new User();
if(!$user->is_logged_in()) {
    header('Location: /');
}

?>

<!DOCTYPE html>
<html>
<body>

<form action="includes/process_post.php" method="post" enctype="multipart/form-data">
    Title: <input type="text" name="title">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">

    Description: <input type="text" name="desc">
    <input type="submit" value="Post" name="submit">
</form>

</body>
</html>
