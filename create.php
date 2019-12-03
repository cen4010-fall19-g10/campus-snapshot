<?php
session_start();

include("includes/Database/Database.class.php");
include("includes/User/User.class.php");

$user = new User();
if(!$user->is_logged_in()) {
    header('Location: /');
}

$page = array("title"=>"Create an Incident | Campus Snapshot",
              "styles"=>array());

include('tpl/header.php');
?>

  <body class="bg-light">

    <?php include('tpl/navbar.php'); ?>

    <div class="container">
      <div class="py-4 text-center"></div>

      <div class="row mb-3">
        <div class="col-md-12 order-md-1">
          <h4 class="mb-3">Create an Incident</h4>
          <form class="needs-validation" action="includes/process_post.php" method="post" enctype="multipart/form-data" novalidate>
            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="firstName">Title</label>
                <input type="text" class="form-control" name="title" id="firstName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid username is required.
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label for="username">Description</label>
              <div class="input-group">
                <textarea class="form-control rounded-1" name="desc" id="exampleFormControlTextarea1" rows="8" maxlength="350"></textarea>
                <div class="invalid-feedback" style="width: 100%;">
                  Your username is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Image</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                  <input type="file" name="fileToUpload" class="custom-file-input" id="inputGroupFile01"
                    aria-describedby="inputGroupFileAddon01">
                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
              </div>
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Create</button>
          </form>
        </div>
      </div>

      <?php include('tpl/footer.php'); ?>
    </div>
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
