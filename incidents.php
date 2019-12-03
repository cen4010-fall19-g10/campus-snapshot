<?php
session_start();

include("includes/Database/Database.class.php");
include("includes/Incident/Incident.class.php");
include("includes/User/User.class.php");

$user = new User();
$incident = new Incident();

if(!$user->is_logged_in()) {
    header('Location: /');
}

$page = array("title"=>"Feed | Campus Snapshot",
         "styles"=>array());

include('tpl/header.php');

$incidents = $incident->get_all_incidents($user->getSchoolId())
?>

<body class="bg-light">


    <?php include('tpl/navbar.php'); ?>

    <div class="container">
        <div class="py-4 text-center"></div>

        <div class="row">
            <div class="col-md-8 order-md-1">

                <?php if(empty($incidents)) { ?>
                    <p class="text-muted text-center p-3">There are no active incidents to display.</p>
                <?php } ?>

              <!-- Begin Incident -->
              <?php foreach($incidents as $i) { ?>

                <div class="card p-3">
                <h4 class="mb-0"><a href="view.php?id=<?php echo $i->get_incident_id(); ?>"><?php echo $i->get_title(); ?></a></h4>
                <p class="text-muted mb-0">By: <?php echo $i->get_username(); ?></p>
                <p class="text-muted mb-0">Posted: <?php echo date('Y-m-d H:i:s', $i->get_timestamp()); ?></p>
                    <p class="text-muted mb-1">Status: <?php echo $i->statusToString(); ?></p>

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <img class="img-fluid w-100" src="user_uploaded_images/<?php echo $i->get_image_name(); ?>" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mb-2">
                        <?php echo $i->get_description(); ?>
                    </div>
                </div>
              </div>

                <hr class="mb-3">

              <?php } ?>
              <!-- End Incident -->
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
