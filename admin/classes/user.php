<?php

class User
{
  public static function get_users()
  {
    global $database;
    $sql = "SELECT * FROM users";
    $query = $database->query($sql);
    return mysqli_fetch_all($query, MYSQLI_ASSOC);
  }

  public static function get_user_by_id($user_id)
  {
    global $database;
    $sql = "SELECT * FROM users WHERE user_id = $user_id";
    $query = $database->query($sql);
    return mysqli_fetch_assoc($query);
  }
}
