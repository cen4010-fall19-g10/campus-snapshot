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

$pageId = "index";
$pageTitle = "Incidents | Campus Snapshot";
include('tpl/tpl_head.php');
?>

<main role="main">

    <div class="container">
        <div id="left-column">
            <?php foreach($incident->get_all_incidents($user->getSchoolId()) as $i) { ?>
                <div class="left-column-card">
                    <div id="username"><?php echo $i->get_username(); ?></div>
                    <div id="content"><?php echo "<a href=\"view.php?id=" . $i->get_incident_id() . "\">" . $i->get_title() . "</a>"; ?></div>
                    <div id="content"><?php echo "<img src=\"user_uploaded_images/" . $i->get_image_name() . "\"></img>"; ?></div>
                    <div class="tags"><?php echo $i->get_description(); ?></div>
                </div>
            <?php } ?>

            <?php if(sizeof($incident->get_all_incidents($user->getSchoolId())) == 0) { ?>
                <div class="left-column-card">
                    There are no incidents to display.
                </div>
            <?php } ?>
        </div>


        <div id="right-column">
            <div class="right-column-card">
                <div id="card-title">Advertisement</div>
                <img height="100%" width="100%" src="https://www.designyourway.net/diverse/beerads/Amstel-beer.jpg" />
            </div>

            <div class="right-column-card">
                <?php include('tpl/tpl_foot.php'); ?>
            </div>
        </div>
    </div>

</main>

</body>

