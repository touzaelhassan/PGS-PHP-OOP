<?php include './includes/head.php'; ?>

<?php include './includes/header.php'; ?>

<?php

$users = User::get_users();

foreach ($users as $user) {
  echo $user->user_id;
  echo "<br>";
}

?>

<?php include './includes/footer.php'; ?>

<?php include './includes/foot.php'; ?>