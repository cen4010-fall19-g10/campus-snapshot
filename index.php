<?php
session_start();

include("includes/Database/Database.class.php");
include("includes/User/User.class.php");

$user = new User();
if($user->is_logged_in()) {
    header('Location: incidents.php');
}
?>

<html>
  <head>
    <title>Campus Snapshot</title>
  </head>

  <body>

  <form method="post" action="includes/process_login.php">
      Username: <input type="text" name="username" />
      <br />
      Password: <input type="password" name="password" />
      <br />

      <input type="submit" value="Login">
  </form>

  </body>
  </html>
