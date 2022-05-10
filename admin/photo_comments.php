<?php include './includes/head.php'; ?>

<?php if (!isset($_SESSION["user_id"])) header("location: login.php"); ?>

<?php
if (isset($_GET['photo_id'])) {
  $photo_id = $_GET['photo_id'];
} else {
  header('location: photos.php');
}
?>

<?php $comments = Comment::get_comments_photo_id($photo_id); ?>

<?php include './includes/header.php'; ?>

<div class="dashboard">
  <?php include './includes/sidebar.php'; ?>
  <div class="dashboard__container">
    <h4 class="dashboard__title comments"><span>COMMENTS</span></h4>
    <div class="dashboard__content">
      <table class="table table-bordered table__comments">
        <thead>
          <tr>
            <th>Comment Id</th>
            <th>Photo Id</th>
            <th>Comment Author</th>
            <th>Comment Body</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($comments as $comment) : ?>
            <tr>
              <td><?php echo $comment->comment_id; ?></td>
              <td><?php echo $comment->photo_id; ?></td>
              <td><?php echo $comment->comment_author; ?></td>
              <td><?php echo $comment->comment_body; ?></td>
              <td><a href="delete_photo_comment.php?comment_id=<?php echo $comment->comment_id;  ?>" class="btn btn-danger btn-sm">DELETE</a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php include './includes/footer.php'; ?>

<?php include './includes/foot.php'; ?>