<?php
session_start();

if(!isset($_POST['username']) || !isset($_POST['password']))
  die('Your incredentials are incorrect. Please try again.');

if(empty($_POST['username']) || empty($_POST['password']))
  die('You did not input your credentials. Please try again.');

include("Database/Database.class.php");
include("User/User.class.php");

$user = new User();

if($user->login($_POST['username'], $_POST['password'])) {
  header('Location: /');
} else {
  header('Location: /'); // error message
}

?>
