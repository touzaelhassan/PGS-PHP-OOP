<?php

class Session
{
  public $user_id;

  function __construct()
  {
    session_start();
  }

  public function login($db_user)
  {
    $_SESSION["user_id"] = $db_user->user_id;
    $this->user_id = $db_user->user_id;
  }

  public function logout()
  {
    unset($_SESSION["user_id"]);
    unset($this->user_id);
  }
}

?>

<?php $session = new Session(); ?>