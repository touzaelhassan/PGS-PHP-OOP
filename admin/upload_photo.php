<?php include './includes/head.php'; ?>

<?php if (!isset($_SESSION["user_id"])) header("location: login.php"); ?>

<?php

if (isset($_POST["upload"])) {

  $photo_title = $_POST["photo_title"];

  $photo = new Photo();

  $photo->photo_title = $photo_title;
  $photo->set_photo($_FILES["file_upload"]);

  if ($photo->save_photo()) {
    $message = "Photo uploaded successfully";
  } else {
    $message = join("<br>", $photo->custom_errors);
  }
}

?>

<?php include './includes/header.php'; ?>

<div class="dashboard">
  <?php include './includes/sidebar.php'; ?>
  <div class="dashboard__container">
    <h4 class="dashboard__title">UPLOAD PHOTO</h4>
    <div class="dashboard__content">
      <form action="upload_photo.php" method="POST" enctype="multipart/form-data" class="form__upload">
        <?php if (isset($message)) : ?>
          <p><?php echo $message; ?></p>
        <?php endif ?>
        <div class="form-group col-6 mb-4">
          <label class="mb-2">Photo Title</label>
          <input type="text" class="form-control" name="photo_title">
        </div>
        <div class="form-group col-6 mb-4">
          <label class="mb-2">Photo</label>
          <input type="file" class="form-control" name="file_upload">
        </div>
        <div class="form-group col-6">
          <input type="submit" value="UPLOAD" class="form-control btn btn-primary" name="upload">
        </div>
      </form>
    </div>
  </div>
</div>

<?php include './includes/footer.php'; ?>

<?php include './includes/foot.php'; ?>