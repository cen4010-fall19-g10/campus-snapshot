<?php
session_start();

include("includes/Database/Database.class.php");
include("includes/Incident/Incident.class.php");
include("includes/Comment/Comment.class.php");
include("includes/User/User.class.php");

$user = new User();
$comment = new Comment();
$incident = new Incident();

if(!$user->is_logged_in()) {
    header('Location: /');
}

$incident = $incident->get_incident($_GET['id']);
?>

    <table border="1">
        <tr>
            <td>
                <?php echo $incident->get_username(); ?>
            </td>
        </tr>

        <tr>
            <td>
                <?php echo $incident->get_title(); ?>
            </td>
        </tr>

        <tr>
            <td>
                <?php echo "<img src=\"user_uploaded_images/" . $incident->get_image_name() . "\"></img>"; ?>
            </td>
        </tr>

        <tr>
            <td>
                <?php echo $incident->get_description(); ?>
            </td>
        </tr>
    </table>

<br />
<form method="post" action="includes/submit_comment.php">
    <input type="hidden" name="post_id" value="<?php echo $_GET['id']; ?>">
    <input type="text" name="comment">
    <input type="submit" value="Post comment">
</form>



<?php
foreach($comment->get_comments($_GET['id']) as $i) { ?>

    <table border="1">
        <tr>
            <td>
                <?php echo $i->get_username(); ?>
            </td>
            <td>
                <?php echo $i->get_comment(); ?>
            </td>
        </tr>
    </table>

    <?php
}
?>