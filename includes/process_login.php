<?php
session_start();

if(!isset($_POST['username']) || !isset($_POST['password']))
  die('Bad');

if(empty($_POST['username']) || empty($_POST['password']))
  die('Bad');

include("Database/Database.class.php");
include("User/User.class.php");

$user = new User();

if($user->login($_POST['username'], $_POST['password'])) {
  header('Location: ../index.php');
} else {
  header('Location: ../index.php'); // error message
}

?>
