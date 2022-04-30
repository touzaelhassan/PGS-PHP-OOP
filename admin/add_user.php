<?php include './includes/head.php'; ?>

<?php if (!isset($_SESSION["user_id"])) header("location: login.php"); ?>

<?php

if (isset($_POST['create_user'])) {
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
          <input type="text" class="form-control" class="user_name">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" class="user_password">
        </div>
        <div class="form-group">
          <label>Fisrt Name</label>
          <input type="text" class="form-control" class="first_name">
        </div>
        <div class="form-group">
          <label>Last Name</label>
          <input type="text" class="form-control" class="last_name">
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