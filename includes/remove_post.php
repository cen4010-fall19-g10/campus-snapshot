<?php

session_start();

include("Database/Database.class.php");
include("User/User.class.php");
include("Incident/Incident.class.php");

$user = new User();
$incident = new Incident();
$incident_id = $_POST['incidentid'];
if(!$user->is_logged_in()) {
    die('log in please :^)');
}

if(!$user->isModerator())
{
    echo("User does not have permission to remove incidents.");
}
else {
    $incident->delete_incident($incident_id);
    echo("Incident removed.");
}

?>
