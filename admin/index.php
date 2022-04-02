<?php include './includes/head.php'; ?>


<?php

$sql = "SELECT * FROM users ";
$query = $database->query($sql);
$users = mysqli_fetch_all($query, MYSQLI_ASSOC);

echo "<pre>";
print_r($users);
echo "</pre>";

?>

<?php include './includes/header.php'; ?>

<?php include './includes/footer.php'; ?>

<?php include './includes/foot.php'; ?>