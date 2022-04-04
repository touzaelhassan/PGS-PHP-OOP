<?php

class DB_Object
{

  // Do This Query Method
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

  // Instantiation Method
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

  // Has Property Method
  private function has_property($key)
  {
    $user_properties = get_object_vars($this);
    return array_key_exists($key, $user_properties);
  }

  // Get All Method
  public static function get_all()
  {
    return self::do_this_query("SELECT * FROM " . self::$db_table . " ");
  }

  // Get By Id Method
  public static function get_by_id($user_id)
  {
    $query = self::do_this_query("SELECT * FROM " . self::$db_table . " WHERE user_id = $user_id");
    if (!empty($query)) {
      $user = array_shift(($query));
      return $user;
    } else {
      return false;
    }
  }
}
