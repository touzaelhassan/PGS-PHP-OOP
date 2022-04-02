<?php include './includes/head.php'; ?>

<?php include './includes/header.php'; ?>

<?php

// $user = new User();
// $query = $user->getUsers();
$query = User::getUsers();
$users = mysqli_fetch_all($query, MYSQLI_ASSOC);

echo "<pre>";
print_r($users);
echo "</pre>";

?>

<?php include './includes/footer.php'; ?>

<?php include './includes/foot.php'; ?>