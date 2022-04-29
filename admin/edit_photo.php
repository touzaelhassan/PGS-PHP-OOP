<?php include './includes/head.php'; ?>

<?php if (!isset($_SESSION["user_id"])) header("location: login.php"); ?>

<?php

if (empty($_GET["photo_id"])) {
  header("location: photos.php");
} else {
  $photo_id = $_GET['photo_id'];
  $photo = Photo::get_photo_by_id($photo_id);


  if (isset($_POST["update-photo"])) {
    if ($photo) {
      $photo->photo_title = $_POST['photo_title'];
      $photo->photo_caption = $_POST['photo_caption'];
      $photo->photo_alternate_text = $_POST['photo_alternate_text'];
      $photo->photo_description = $_POST['photo_description'];

      $photo->save_photo();
      header("location: photos.php");
    }
  }
}

?>


<?php include './includes/header.php'; ?>

<div class="dashboard">
  <?php include './includes/sidebar.php'; ?>
  <div class="dashboard__container">
    <h4 class="dashboard__title">UPDATE PHOTO</h4>
    <div class="dashboard__content">
      <form action="" method="POST" class="edit__form">
        <div class="form__inputs">
          <div class="form-group">
            <input type="text" name="photo_title" value="<?php echo $photo->photo_title; ?>" class="form-control">
          </div>
          <div class="form-group">
            <label>Caption</label>
            <input type="text" name="photo_caption" value="<?php echo $photo->photo_caption; ?>" class="form-control">
          </div>
          <div class="form-group">
            <label>Alternate Text</label>
            <input type="text" name="photo_alternate_text" value="<?php echo $photo->photo_alternate_text; ?>" class="form-control">
          </div>
          <div class="form-group">
            <label>Description</label>
            <textarea name="photo_description" class="form-control" cols="30" rows="10"><?php echo $photo->photo_description; ?></textarea>
          </div>
        </div>
        <div class="photo__info">
          <div class="photo__info__title">
            <h4>Save</h4>
          </div>
          <div class="photo__info__content">
            <p><span>Uploaded On :</span><span>April 29, 2022 @ 22:13</span></p>
            <p><span>Photo Id :</span><span>13</span></p>
            <p><span>Filename :</span><span>image.jpg</span></p>
            <p><span>File Type :</span><span>JPG</span></p>
            <p><span>File Size :</span><span>4345242</span></p>
          </div>
          <div class="photo__info__btns">
            <input type="submit" name="update-photo" value="update" class="btn btn-success btn-sm">
            <a href="./delete_photo.php?photo_id=<?php echo $photo->photo_id; ?>" class="btn btn-danger btn-sm">DELETE</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include './includes/footer.php'; ?>

<?php include './includes/foot.php'; ?>