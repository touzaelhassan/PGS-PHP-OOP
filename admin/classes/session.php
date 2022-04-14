<?php

class Session
{
  public $user_id;
  private $signed_in = false;

  function __construct()
  {
    session_start();
  }

  public function login($user)
  {
    $_SESSION["user_id"] = $user->user_id;
    $this->user_id = $user->user_id;
    $this->signed_in = true;
  }

  public function logout()
  {
    unset($_SESSION["user_id"]);
    unset($this->user_id);
    $this->signed_in = false;
  }

  public function is_user_signed_in()
  {
    return $this->signed_in;
  }
}

?>

<?php $session = new Session(); ?>