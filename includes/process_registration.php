<?php
session_start();

if(!isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['school_id']))
  header('Location: /');

include("Database/Database.class.php");
include("User/User.class.php");

$user = new User();

try {

  $user->register($_POST['username'], $_POST['password'], $_POST['school_id']);
  $user->login($_POST['username'], $_POST['password']);
  header('Location: /');
} catch(Exception $exception) {
  header('Location: /');
}

?>
