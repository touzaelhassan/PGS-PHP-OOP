<?php include './includes/head.php'; ?>

<?php include './includes/header.php'; ?>

<?php

$query = User::get_user_by_id(1);
$db_user = mysqli_fetch_assoc($query);

$user = new User();

$user->user_id = $db_user["user_id"];
$user->user_name = $db_user["user_name"];
$user->user_password = $db_user["user_password"];
$user->first_name = $db_user["first_name"];
$user->last_name = $db_user["last_name"];

echo "<pre>";
print_r($user);
echo "</pre>";

?>

<?php include './includes/footer.php'; ?>

<?php include './includes/foot.php'; ?>