<?php include './includes/head.php'; ?>

<?php include './includes/header.php'; ?>

<?php

$user = User::get_user_by_id(1);

echo "<pre>";
print_r($user);
echo "</pre>";

?>

<?php include './includes/footer.php'; ?>

<?php include './includes/foot.php'; ?>