<?php
include("includes/Database/Database.class.php");
$database = new Database();
?>

<html>
  <head>
    <title>Campus Snapshot (Vertical Prototype)</title>
  </head>

  <body>

  <form method="post" action="includes/process_registration.php">

  Username: <input type="text" name="username" />
  <br />
  Password: <input type="password" name="password" />
  <br />
  School:
          <select name="school_id">
            <?php
              $stmt = $database->getConnection()->query("SELECT * FROM schools");
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
