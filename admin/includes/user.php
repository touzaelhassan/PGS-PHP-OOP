<?php

class User
{

  public static function getUsers()
  {
    global $database;
    $query = $database->query("SELECT * FROM users");
    return $query;
  }

  public static function getUserById($user_id)
  {
    global $database;
    $query = $database->query("SELECT * FROM users WHERE user_id = $user_id");
    return $query;
  }
}
