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

foreach($incident->get_all_incidents($user->getSchoolId()) as $i) { ?>

    <table border="1">
        <tr>
            <td>
                <?php echo $i->get_username(); ?>
            </td>
        </tr>

        <tr>
            <td>
                <?php echo "<a href=\"view.php?id=" . $i->get_incident_id() . "\">" . $i->get_title() . "</a>"; ?>
            </td>
        </tr>

        <tr>
            <td>
                <?php echo "<img src=\"user_uploaded_images/" . $i->get_image_name() . "\"></img>"; ?>
            </td>
        </tr>

        <tr>
            <td>
                <?php echo $i->get_description(); ?>
            </td>
        </tr>
    </table>

<?php
}
?>

