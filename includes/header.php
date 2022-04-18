<header class="header">
  <div class="header__content">
    <div class="logo"><a href="./index.php">PGS</a></div>
    <?php include "./includes/navigation.php"; ?>
    <?php if (isset($_SESSION["user_id"])) { ?>
      <div class="admin__link"><a href="./admin/logout.php">LOGOUT</a></div>
    <?php } else { ?>
      <div class="admin__link"><a href="./admin/login.php">LOGIN</a></div>
    <?php } ?>
    <div class="admin__link"><a href="./admin/index.php">DASHBOARD</a></div>
  </div>
</header>