<?php
session_start();


include("includes/User/User.class.php");

$user = new User();
if(!$user->is_logged_in()) {
    header('Location: /');
}

?>

<!DOCTYPE html>
<html>
<body>
  <form method="post" action="includes/set_inactive.php">

      Enter ID of incident to be set inactive:<input type="text" name="incidentid" />
      <br />
      <input type="submit" value="Remove">
  </form>


</body>
</html>
