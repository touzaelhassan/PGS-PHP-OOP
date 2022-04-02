<?php include './includes/head.php'; ?>

<?php include './includes/header.php'; ?>

<?php

$query = User::get_user_by_id(1);
$db_user = mysqli_fetch_assoc($query);

$user = User::instantiation($db_user);

echo "<pre>";
print_r($user);
echo "</pre>";

?>

<?php include './includes/footer.php'; ?>

<?php include './includes/foot.php'; ?>