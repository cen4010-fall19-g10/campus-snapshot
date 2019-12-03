<?php
session_start();

include("includes/Database/Database.class.php");
include("includes/Comment/Comment.class.php");
include("includes/Incident/Incident.class.php");
include("includes/User/User.class.php");

$user = new User();
$incident = new Incident();

if(!$user->is_logged_in()) {
    header('Location: /');
}

$incident = $incident->get_incident($_GET['id']);

$page = array("title"=>$incident->get_title() . " | Campus Snapshot",
         "styles"=>array());

include('tpl/header.php');
?>

<body class="bg-light">

    <?php include('tpl/navbar.php'); ?>

    <div class="container">
        <div class="py-4 text-center"></div>

        <div class="row">
            <div class="col-md-8 order-md-1">

              <div class="card p-3">
                <h4 class="mb-0"><?php echo $incident->get_title(); ?></h4>
                <p class="text-muted mb-0">By: <?php echo $incident->get_username(); ?></p>
                <p class="text-muted mb-0">Posted: <?php echo date('Y-m-d H:i:s', $incident->get_timestamp()); ?></p>
                  <p class="text-muted mb-1">Status: <?php echo $incident->statusToString(); ?>
                      <?php if($user->getUsername() == $incident->get_username()) { ?>
                      <a href="includes/change_status.php?id=<?php echo $incident->get_incident_id(); ?>">(Toggle)</a>
                  <?php } ?>
                  </p>

                  <div class="row">
                    <div class="col-md-12 mb-3">
                        <img class="img-fluid w-100" src="user_uploaded_images/<?php echo $incident->get_image_name(); ?>" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mb-2">
                      <?php echo $incident->get_description(); ?>
                    </div>
                </div>
              </div>
              <!-- End Incident -->

                              <hr class="mb-2">

                          <h4 class="mb-3">Discussion</h4>

                          <div class="row">
                            <div class="col-md-9 mb-3">
                              <form class="needs-validation" action="includes/submit_comment.php" method="post" novalidate>
                                <input type="hidden" name="post_id" value="<?php echo $_GET['id']; ?>">

                              <input type="text" name="comment" class="form-control" id="cc-expiration" placeholder="Type a comment" required>
                              <div class="invalid-feedback">
                                Valid comment is required.
                              </div>
                            </div>
                            <div class="col-md-3 mb-3">
                              <button class="btn btn-primary btn-md btn-block" type="submit">Submit</button>
                            </form>
                            </div>
                          </div>

                          <?php foreach($incident->get_comments() as $comment) { ?>
                          <div class="row">
                            <div class="col-md-12 mb-3">
                              <div class="card p-2">
                                  <p class="p-2 mb-0"><?php if($comment->is_official()) { echo "<b>" . $comment->get_username() . " (Verified Campus Official) </b>"; } else { echo $comment->get_username(); } echo " says: " . $comment->get_comment() ?></p>
                              </div>
                            </div>
                          </div>
                        <?php } ?>

            </div>

            <div class="col-md-4 order-md-2 mb-4">
                <form class="card p-2">
                  <?php include('tpl/footer.php'); ?>
                </form>
            </div>
        </div>
    </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
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
