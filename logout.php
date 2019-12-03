<?php
session_start();

include("includes/User/User.class.php");

$user = new User();
if($user->is_logged_in()) {
    $user->logout();
}

header('Location: index.php');
?>
