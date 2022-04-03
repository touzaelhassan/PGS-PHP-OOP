<?php

class Session
{
  public $user_id;
  private $signed_in;
  function __construct()
  {
    session_start();
  }
}

$session = new Session();
