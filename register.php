<?php
session_start();

include("includes/Database/Database.class.php");
include("includes/User/User.class.php");

$user = new User();
if($user->is_logged_in()) {
    header('Location: /');
}

$page = array("title"=>"Campus Snapshot: Register an account.",
              "styles"=>array("form-validation.css"));

include('tpl/header.php');
?>

  <body class="bg-light">
    <div class="container">
      <div class="py-5 text-center">
        <!--<img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">-->
        <h2>Registration</h2>
        <p class="lead">Please enter the information below to create an account.</p>
      </div>

      <div class="row mb-3">
        <div class="col-md-12 order-md-1">
          <h4 class="mb-3">Create an account</h4>
          <form class="needs-validation" action="includes/process_registration.php" method="post" novalidate>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Username</label>
                <input type="text" class="form-control" name="username" id="firstName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid username is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Password</label>
                <input type="password" class="form-control" name="password" id="lastName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid password is required.
                </div>
              </div>
            </div>
            <!--
            <div class="mb-3">
              <label for="username">Username</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">@</span>
                </div>
                <input type="text" class="form-control" id="username" placeholder="Username" required>
                <div class="invalid-feedback" style="width: 100%;">
                  Your username is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" id="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>-->

            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="country">School</label>
                <select class="custom-select d-block w-100" name="school_id" id="country" required>
                  <?php
                    $stmt = Database::connection()->query("SELECT * FROM schools");
                    while ($row = $stmt->fetch()) {
                      echo "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
                    }
                  ?>
                </select>
                <div class="invalid-feedback">
                  Please select a valid country.
                </div>
              </div>
            </div>


            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to Campus Snapshot</button>
          </form>
        </div>
      </div>

      <?php include('tpl/footer.php'); ?>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="tpl/bootstrap/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="tpl/bootstrap/assets/js/vendor/popper.min.js"></script>
    <script src="tpl/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="tpl/bootstrap/assets/js/vendor/holder.min.js"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
  </body>
</html>
