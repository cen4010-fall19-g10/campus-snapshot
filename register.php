<?php
session_start();

include("includes/Database/Database.class.php");
include("includes/User/User.class.php");

$user = new User();
if($user->is_logged_in()) {
    header('Location: /');
}

?>

<html>
  <head>
    <title>Campus Snapshot</title>
  </head>

  <body>

  <form method="post" action="includes/process_registration.php">

      Username: <input type="text" name="username" />
      <br />
      Password: <input type="password" name="password" />
      <br />
      School: <select name="school_id">
                <?php
                  $stmt = Database::connection()->query("SELECT * FROM schools");
                  while ($row = $stmt->fetch()) {
                    echo "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
                  }
                ?>
              </select>
      <br />
      <input type="submit" value="Register">

  </form>

  </body>
  </html>
