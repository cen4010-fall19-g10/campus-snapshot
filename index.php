<?php
session_start();

include("includes/Database/Database.class.php");
include("includes/User/User.class.php");

$user = new User();
if($user->is_logged_in()) {
    header('Location: incidents.php');
}

$page = array("title"=>"Campus Snapshot: An online platform to report, view, and discuss campus incidents.",
              "styles"=>array("floating-labels.css"));

include('tpl/header.php');
?>

  <body>
    <form class="form-signin" action="includes/process_login.php" method="post">
      <div class="text-center mb-4">
        <!--<img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">-->
        <h1 class="h3 mb-3 font-weight-bold">Campus Snapshot</h1>
        <p>Campus Snapshot is an online platform providing users with the ability to report and discuss incidents on their campus. <a href="register.php">Create an account today!</a></p>
      </div>

      <div class="form-label-group">
        <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Username" required autofocus>
        <label for="inputEmail">Username</label>
      </div>

      <div class="form-label-group">
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <label for="inputPassword">Password</label>
      </div>

      <button class="btn btn-lg btn-primary btn-block mb-3" type="submit">Sign in</button>

      <?php include('tpl/footer.php'); ?>
    </form>
  </body>
</html>
