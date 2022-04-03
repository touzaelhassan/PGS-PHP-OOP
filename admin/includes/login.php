<?php include "init.php"; ?>

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