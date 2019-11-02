<?php
include("Database.php");
include("User.php");

/* If a field has not been set, die to the user */
if(isset($_POST['username']) == false || isset($_POST['password']) == false || isset($_POST['school_id']) == false)
  die("Error occurred.");

/* If a field is empty, die to the user */
if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['school_id']))
  die("Error occured.");

/* Trim leading and trailing whitespace */
$_username = trim($_POST['username']);
$_password = trim($_POST['password']);

$database = new Database();
$user = new User($database);

/* If the username exists, die to the user */
if($user->exists($_username))
  die('That username exists.');

/* Add the user to the database */
$user->register($_username, $_password, $_POST['school_id']);

/* For vertical prototype purposes, show the usernames */
echo "Registered users: <br/>";
$stmt = $database->getConnection()->query("SELECT * FROM users");
while ($row = $stmt->fetch()) {
    echo $row['username'] . "<br />";
}
?>
