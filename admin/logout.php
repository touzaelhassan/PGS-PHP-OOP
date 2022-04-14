<?php include './classes/database.php'; ?>
<?php include './classes/user.php'; ?>
<?php include './classes/session.php'; ?>

<?php

$session->logout();
header("location: login.php");

?>