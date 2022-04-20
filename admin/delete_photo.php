<?php include './classes/database.php'; ?>
<?php include './classes/user.php'; ?>
<?php include './classes/photo.php'; ?>
<?php include './classes/session.php'; ?>

<?php if (!isset($_SESSION["user_id"])) header("location: login.php"); ?>

<?php

$photo_id = $_GET["photo_id"];

$photo = Photo::get_photo_by_id($photo_id);

if ($photo) {
  $photo->delete_photo();
  header("location: photos.php");
}

?>