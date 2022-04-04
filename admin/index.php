<?php include './includes/head.php'; ?>


<?php

if (!$session->is_signed_in()) {
  redirect("login.php");
}

?>

<?php include './includes/header.php'; ?>

<div class="dashboard">
  <?php include './includes/sidebar.php'; ?>
  <div class="dashboard__content">
    <?php

    $user = User::get_user_by_id(2);
    $user->user_name = "omab";
    $user->update();

    echo "<pre>";
    print_r($user);
    echo "</pre>";
    ?>
  </div>
</div>

<?php include './includes/footer.php'; ?>

<?php include './includes/foot.php'; ?>