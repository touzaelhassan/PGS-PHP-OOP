<?php include "includes/head.php"; ?>

<?php if (isset($_SESSION["user_id"])) header("location: index.php"); ?>

<?php

if (isset($_POST["login"])) {
  $user_name = $_POST["user_name"];
  $user_password = $_POST["user_password"];

  $db_user = User::verify_user($user_name, $user_password);

  if ($db_user) {
    $session->login($db_user);
    header("location: index.php");
  } else {
    $error_message = "Invalid username or password";
  }
}

?>


<?php include "./includes/header.php" ?>

<section class="login">
  <form action="login.php" method="POST" class="login__form">

    <div class="form__title">
      <h2 class="mb-4 text-center">LOGIN</h2>
    </div>
    <?php if (isset($error_message)) : ?>
      <p class="alert alert-danger mb-0"><?php echo $error_message; ?></p>
    <?php endif ?>
    <div class="form-group">
      <label for="user_name">Username</label>
      <input type="text" class="form-control" name="user_name">
    </div>
    <div class="form-group">
      <label for="user_password">Password</label>
      <input type="password" class="form-control" name="user_password">
    </div>
    <div class="form-group">
      <input type="submit" class="form-control text-white bg-dark" name="login">
    </div>
  </form>
</section>

<?php include "./includes/footer.php" ?>