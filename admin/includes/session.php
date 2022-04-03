<?php

class Session
{
  public $user_id;
  private $signed_in = false;
  public $message;

  function __construct()
  {
    session_start();
    $this->check_login();
    $this->check_message();
  }

  public function message($msg = "")
  {
    if (!empty($msg)) {
      $_SESSION["message"] = $msg;
    } else {
      return $this->message;
    }
  }

  public function check_message()
  {
    if (isset($_SESSION["message"])) {
      $this->message = $_SESSION["message"];
      unset($_SESSION["message"]);
    } else {
      $this->message = "";
    }
  }

  public function is_signed_in()
  {
    return $this->signed_in;
  }

  public function login($user)
  {
    if ($user) {
      $this->user_id = $_SESSION["user_id"] = $user->user_id;
      $this->signed_in = true;
    }
  }

  public function logout()
  {
    unset($this->user_id);
    unset($_SESSION["user_id"]);
    $this->signed_in = false;
  }

  private function check_login()
  {
    if (isset($_SESSION["user_id"])) {
      $this->user_id = $_SESSION["user_id"];
      $this->signed_in  = true;
    } else {
      unset($this->user_id);
      $this->signed_in = false;
    }
  }
}

$session = new Session();
