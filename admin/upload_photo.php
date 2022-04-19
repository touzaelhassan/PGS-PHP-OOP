<?php include './includes/head.php'; ?>

<?php if (!isset($_SESSION["user_id"])) header("location: login.php"); ?>



<?php include './includes/header.php'; ?>

<div class="dashboard">
  <?php include './includes/sidebar.php'; ?>
  <div class="dashboard__container">
    <h4 class="dashboard__title">UPLOAD PHOTO</h4>
    <div class="dashboard__content">
      <form action="upload_photo.php" method="POST" enctype="multipart/form-data" class="form__upload">
        <div class="form-group col-6 mb-4">
          <label class="mb-2">Photo Title</label>
          <input type="text" class="form-control" name="photo_title">
        </div>
        <div class="form-group col-6 mb-4">
          <label class="mb-2">Photo</label>
          <input type="file" class="form-control" name="file_upload">
        </div>
        <div class="form-group col-6">
          <input type="submit" class="form-control btn btn-primary" name="upload">
        </div>
      </form>
    </div>
  </div>
</div>

<?php include './includes/footer.php'; ?>

<?php include './includes/foot.php'; ?>