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
      $array_of_users[] = static::instantiation($user);
    }

    return $array_of_users;
  }

  // Instantiation Method
  public static function instantiation($db_user)
  {
    $calling_class = get_called_class();
    $user = new $calling_class;

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
    return static::do_this_query("SELECT * FROM " . static::$db_table . " ");
  }

  // Get By Id Method
  public static function get_by_id($id)
  {
    $query = static::do_this_query("SELECT * FROM " . static::$db_table . " WHERE user_id = $id");
    if (!empty($query)) {
      $user = array_shift(($query));
      return $user;
    } else {
      return false;
    }
  }
}
