<?php

class User
{

  public static function getUsers()
  {
    global $database;
    $query = $database->query("SELECT * FROM users");
    return $query;
  }
}
