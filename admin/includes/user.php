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
