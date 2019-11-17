<?php
session_start();

if(!isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['school_id']))
  die('field was empty');

include("Database/Database.class.php");
include("User/User.class.php");

$user = new User();

try {
  //registers user as non moderator
  $user->register($_POST['username'], $_POST['password'], $_POST['school_id']);
  echo ("Registration worked!");
  $user->login($_POST['username'], $_POST['password']);
  //header('Location: /');
} catch(Exception $exception) {
  echo("Something went wrong!");
  //header('Location: /');
}

?>
