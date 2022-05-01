<?php include './includes/head.php'; ?>

<?php if (!isset($_SESSION["user_id"])) header("location: login.php"); ?>

<?php

if (empty($_GET["user_id"])) {
  header("location: users.php");
}

$user_id = $_GET["user_id"];

$user = User::get_user_by_id($user_id);

if (isset($_POST["update_user"])) {

  if ($user) {
    $user->user_name = $_POST['user_name'];
    $user->user_password = $_POST['user_password'];
    $user->first_name = $_POST['first_name'];
    $user->last_name = $_POST['last_name'];

    $user->set_user_image($_FILES["user_image"]);

    $user->save_user();
  }
}

?>


<?php include './includes/header.php'; ?>

<div class="dashboard">
  <?php include './includes/sidebar.php'; ?>
  <div class="dashboard__container">
    <h4 class="dashboard__title">CREATE USER</h4>
    <div class="dashboard__content">
      <div class="d-flex">
        <form action="" method="POST" class="form__create col-6" enctype="multipart/form-data">
          <div class="form-group mb-3">
            <label class="mb-1">Username</label>
            <input type="text" class="form-control" value="<?php echo $user->user_name ?>" name="user_name">
          </div>
          <div class="form-group mb-3">
            <label class="mb-1">Password</label>
            <input type="password" class="form-control" name="user_password">
          </div>
          <div class="form-group mb-3">
            <label class="mb-1">User Image</label>
            <input type="file" class="form-control" name="user_image">
          </div>
          <div class="form-group mb-3">
            <label class="mb-1">Fisrt Name</label>
            <input type="text" class="form-control" value="<?php echo $user->first_name ?>" name="first_name">
          </div>
          <div class="form-group mb-3">
            <label class="mb-1">Last Name</label>
            <input type="text" class="form-control" value="<?php echo $user->last_name ?>" name="last_name">
          </div>
          <div class="form-group">
            <input type="submit" value="UPDATE USER" class="btn btn-primary" name="update_user">
          </div>
        </form>
        <div class="col-6">
          <img src="<?php echo $user->user_image_path(); ?>" class="ms-5 mt-4 w-25">
        </div>
      </div>
    </div>
  </div>
</div>

<?php include './includes/footer.php'; ?>

<?php include './includes/foot.php'; ?>