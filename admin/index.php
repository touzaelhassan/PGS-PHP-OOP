<?php include './includes/head.php'; ?>

<?php if (!$session->is_user_signed_in()) header("location: login.php"); ?>

<?php include './includes/header.php'; ?>

<div class="dashboard">
  <?php include './includes/sidebar.php'; ?>
  <div class="dashboard__container">
    <h4 class="dashboard__title">DASHBOARD</h4>
    <div class="dashboard__content">

    </div>
  </div>
</div>

<?php include './includes/footer.php'; ?>

<?php include './includes/foot.php'; ?>