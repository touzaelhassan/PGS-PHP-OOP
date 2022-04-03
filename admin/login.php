<?php include "includes/head.php"; ?>

<?php

if ($session->is_signed_in()) {
  redirect("index.php");
}

?>

<?php

if (isset($_POST["login"])) {

  $user_name = trim($_POST["user_name"]);
  $user_password = trim($_POST["user_password"]);

  $db_user = User::user_verification($user_name, $user_password);

  if ($db_user) {
    $session->login($db_user);
    redirect("index.php");
  } else {
    $error_mesage = "Invalid username or password";
  }
} else {
  $user_name = "";
  $user_password = "";
}

?>

<?php include "./includes/header.php" ?>

<section class="login">
  <form action="login.php" method="POST" class="login__form">
    <div class="form__title">
      <h2 class="mb-4 text-center">LOGIN</h2>
    </div>
    <?php if (isset($error_mesage)) {
      echo "<p class='text-center alert alert-danger'>$error_mesage</p>";
    } ?>
    <div class="form-group">
      <label for="user_name">Username</label>
      <input type="text" class="form-control" value="<?php echo htmlentities($user_name) ?>" name="user_name">
    </div>
    <div class="form-group">
      <label for="user_password">Password</label>
      <input type="password" class="form-control" value="<?php echo htmlentities($user_password) ?>" name="user_password">
    </div>
    <div class="form-group">
      <input type="submit" class="form-control text-white bg-dark" name="login">
    </div>
  </form>
</section>

<?php include "./includes/footer.php" ?>