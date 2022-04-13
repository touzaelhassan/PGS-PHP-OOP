<?php

class User
{
  public $user_id;
  public $user_name;
  public $first_name;
  public $last_name;

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

  public static function instantiation($db_user)
  {
    $user_object = new self;
    $user_object->user_id = $db_user['user_id'];
    $user_object->user_name = $db_user['user_name'];
    $user_object->first_name = $db_user['first_name'];
    $user_object->last_name = $db_user['last_name'];
    return $user_object;
  }
}
