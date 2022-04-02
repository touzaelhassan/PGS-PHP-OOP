<?php

class User
{

  public $user_id;
  public $user_name;
  public $user_password;
  public $first_name;
  public $last_name;

  public static function do_this_query($sql)
  {
    global $database;
    $query = $database->query($sql);
    return $query;
  }

  public static function get_users()
  {
    return self::do_this_query("SELECT * FROM users");
  }

  public static function get_user_by_id($user_id)
  {
    return self::do_this_query("SELECT * FROM users WHERE user_id = $user_id");
  }

  public static function instantiation($db_user)
  {
    $user_object = new self;

    $user_object->user_id = $db_user["user_id"];
    $user_object->user_name = $db_user["user_name"];
    $user_object->user_password = $db_user["user_password"];
    $user_object->first_name = $db_user["first_name"];
    $user_object->last_name = $db_user["last_name"];

    return $user_object;
  }
}
