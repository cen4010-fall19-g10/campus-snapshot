<?php
session_start();

if(!isset($_POST['comment']))
    die('bad');

if(empty($_POST['comment']))
    die('bad too');

include("Database/Database.class.php");
include("Comment/Comment.class.php");
include("User/User.class.php");

$user = new User();

if(!$user->is_logged_in()) {
    header('Location: /');
}

$comment = new Comment();
$comment->create($_POST['post_id'], $user->getId(), $_POST['comment']);

header('Location: ../view.php?id=' . $_POST['post_id']);

?>