<?php
if(!isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['school_id']))
  header('Location: /');

include("Database/Database.class.php");
include("User.class.php");

$db = new Database();
$user = new User($db);

try {

  $user->register($_POST['username'], $_POST['password'], $_POST['school_id']);

  /* For vertical prototype purposes, show the usernames */
  echo "Registered users: <br/>";
  $stmt = $db->getConnection()->query("SELECT * FROM users");
  while ($row = $stmt->fetch()) {
      echo $row['username'] . "<br />";
  }

} catch(Exception $e) {
  echo $e->getMessage();
  echo "<br />Please try again by clicking <a href=\"/\">here</a>";
}

?>
