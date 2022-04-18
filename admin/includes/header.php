  <header class="header">
    <div class="header__content">
      <div class="logo"><a href="../index.php">PGS</a></div>
      <?php if (isset($_SESSION["user_id"])) { ?>
        <div class="admin__link"><a href="./logout.php">LOGOUT</a></div>
      <?php } else { ?>
        <div class="admin__link"><a href="./login.php">LOGIN</a></div>
      <?php } ?>
      <div class="home__page__link"><a href="../index.php">HOMEPAGE</a></div>
    </div>
  </header>