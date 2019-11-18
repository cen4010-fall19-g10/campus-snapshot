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
    <link rel="stylesheet" type="text/css" href="tpl/css/index.css">
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

  <form method="post" action="includes/process_login.php">
    <div class="boxed">
        Username: <input type="text" name="username" />
        <br />
    </div>
     <div class="boxed2">
        Password: <input type="password" name="password" />
        <br />
    </div>
      <div class="login">
        <input type="submit" value="Login" width="20" length="30">
    </div>
  </form>
      </div>

  </body>
  </html>
