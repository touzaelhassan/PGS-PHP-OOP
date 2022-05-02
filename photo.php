<?php include "./includes/head.php"; ?>

<?php

if (isset($_POST["add_comment"])) {
  echo "Hello From Photo Page";
}

?>

<?php include "./includes/header.php"; ?>

<div class="">
  <h1>PHOTO</h1>
  <div class="comments">
    <form action="" method="POST" class="comments__form">
      <div class="form-group">
        <label>Author</label>
        <input type="text" class="form-control" name="comment_author">
      </div>
      <div class="form-group">
        <label>Comment</label>
        <textarea name="comment_body" class="form-control" cols="30" rows="10"></textarea>
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-primary" value="ADD COMMENT" name="add_comment">
      </div>
    </form>
    <div class="comments__content"></div>
  </div>
</div>

<?php include "./includes/footer.php"; ?>

<?php include "./includes/foot.php"; ?>