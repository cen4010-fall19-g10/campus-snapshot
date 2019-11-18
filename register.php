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
      <head>
    <title>Campus Snapshot</title>
    <link rel="stylesheet" type="text/css" href="tpl/css/register.css">
  </head>
  </head>

  <body>
      <div class="wrapper">
      <nav id="header" style="height: 100px;">
         <div class="wrapper">
            <div class="logo">
                <img class="logo-fau" src="tpl/css/index-images/campus_snapshot5.png" width="1000" height="200">
            </div>
         </div>
    </nav> 
  <form method="post" action="includes/process_registration.php">
       <div class="boxed">
        Username: <input type="text" name="username" />
        <br />
    </div>
     <div class="boxed2">
        Password: <input type="password" name="password" />
        <br />
    </div>
      <div class="register">
        School: <select name="school_id">
                <?php
                  $stmt = Database::connection()->query("SELECT * FROM schools");
                  while ($row = $stmt->fetch()) {
                    echo "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
                  }
                ?>
              </select>
      <br />
      </div>
      
      <input type="submit" value="Register">

  </form>
      </div>

  </body>
  </html>

