<?php include './includes/head.php'; ?>

<?php if (!isset($_SESSION["user_id"])) header("location: login.php"); ?>

<?php

$user = new User();

if (isset($_POST['create_user'])) {
  if ($user) {
    $user->user_name = $_POST['user_name'];
    $user->user_password = $_POST['user_password'];
    $user->first_name = $_POST['first_name'];
    $user->last_name = $_POST['last_name'];

    $user->set_user_image($_FILES["user_image"]);
    $user->upload_image();
    $user->create_user();
  }
}

?>


<?php include './includes/header.php'; ?>

<div class="dashboard">
  <?php include './includes/sidebar.php'; ?>
  <div class="dashboard__container">
    <h4 class="dashboard__title">CREATE USER</h4>
    <div class="dashboard__content">
      <form action="" method="POST" class="form__create" enctype="multipart/form-data">
        <div class="form-group">
          <label>Username</label>
          <input type="text" class="form-control" name="user_name">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" name="user_password">
        </div>
        <div class="form-group">
          <label>User Image</label>
          <input type="file" class="form-control" name="user_image">
        </div>
        <div class="form-group">
          <label>Fisrt Name</label>
          <input type="text" class="form-control" name="first_name">
        </div>
        <div class="form-group">
          <label>Last Name</label>
          <input type="text" class="form-control" name="last_name">
        </div>
        <div class="form-group">
          <input type="submit" value="CREATE USER" class="btn btn-primary" name="create_user">
        </div>
      </form>
    </div>
  </div>
</div>

<?php include './includes/footer.php'; ?>

<?php include './includes/foot.php'; ?>