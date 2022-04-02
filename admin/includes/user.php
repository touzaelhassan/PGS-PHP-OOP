<?php

class User
{

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
}
