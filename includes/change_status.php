<?php
session_start();

if(!isset($_GET['id']))
    die('bad');

include("Database/Database.class.php");
include("Incident/Incident.class.php");
include("Comment/Comment.class.php");
include("User/User.class.php");

$user = new User();

if(!$user->is_logged_in()) {
    header('Location: /');
}

$incident_id = $_GET['id'];
$incident = new Incident();
$incident = $incident->get_incident($incident_id);

if($incident->get_username() == $user->getUsername()) {
    $incident->toggle_status();
    header('Location: ../view.php?id=' . $incident->get_incident_id());
}

?>