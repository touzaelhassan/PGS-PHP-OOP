<?php include './classes/database.php'; ?>
<?php include './classes/user.php'; ?>
<?php include './classes/photo.php'; ?>
<?php include './classes/comment.php'; ?>
<?php include './classes/session.php'; ?>

<?php if (!isset($_SESSION["user_id"])) header("location: login.php"); ?>

<?php

$comment_id = $_GET["comment_id"];

$comment = Comment::get_comment_by_id($comment_id);

if ($comment) {
  $comment->delete_comment();
  header("location: comments.php");
}

?>