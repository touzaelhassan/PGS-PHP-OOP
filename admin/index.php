<?php include './includes/head.php'; ?>

<?php include './includes/header.php'; ?>

<?php

$query = User::getUserById(1);
$user = mysqli_fetch_assoc($query);

echo "<pre>";
print_r($user);
echo "</pre>";

?>

<?php include './includes/footer.php'; ?>

<?php include './includes/foot.php'; ?>