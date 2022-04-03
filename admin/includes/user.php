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
    $users = mysqli_fetch_all($query, MYSQLI_ASSOC);

    $array_of_users = [];

    foreach ($users as $user) {
      $array_of_users[] = self::instantiation($user);
    }

    return $array_of_users;
  }

  public static function user_verification($user_name, $user_password)
  {
    global $database;
    $user_name = $database->escape_string($user_name);
    $user_password = $database->escape_string($user_password);

    $sql = "SELECT * FROM users user_name = '$user_name' AND user_password = '$user_password'";

    $query = self::do_this_query($sql);

    if (!empty($query)) {
      $db_user = array_shift(($query));
      return $db_user;
    } else {
      return false;
    }
  }

  public static function get_users()
  {
    return self::do_this_query("SELECT * FROM users");
  }

  public static function get_user_by_id($user_id)
  {
    $query = self::do_this_query("SELECT * FROM users WHERE user_id = $user_id");
    if (!empty($query)) {
      $user = array_shift(($query));
      return $user;
    } else {
      return false;
    }
  }

  public static function instantiation($db_user)
  {
    $user = new self;

    foreach ($db_user as $key => $value) {
      if ($user->has_property($key)) {
        $user->$key = $value;
      }
    }

    return $user;
  }

  private function has_property($key)
  {
    $user_properties = get_object_vars($this);
    return array_key_exists($key, $user_properties);
  }
}
