<?php include './includes/head.php'; ?>

<?php if (!isset($_SESSION["user_id"])) header("location: login.php"); ?>

<?php include './includes/header.php'; ?>

<div class="dashboard">
  <?php include './includes/sidebar.php'; ?>
  <div class="dashboard__container">
    <h4 class="dashboard__title">DASHBOARD</h4>
    <div class="dashboard__content">
      <?php

      $user = new User();

      $user->user_name = "omar";
      $user->user_password = "123456";
      $user->first_name = "Omar";
      $user->last_name = "Medoni";

      $user->update_user(3);

      ?>
    </div>
  </div>
</div>

<?php include './includes/footer.php'; ?>

<?php include './includes/foot.php'; ?>