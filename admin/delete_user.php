<?php include './classes/database.php'; ?>
<?php include './classes/user.php'; ?>
<?php include './classes/photo.php'; ?>
<?php include './classes/session.php'; ?>

<?php if (!isset($_SESSION["user_id"])) header("location: login.php"); ?>

<?php

$user_id = $_GET["user_id"];

$user = User::get_user_by_id($user_id);

if ($user) {
  $user->delete_user();
  header("location: users.php");
}

?>