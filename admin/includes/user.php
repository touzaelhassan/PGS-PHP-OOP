<?php

class User extends DB_Object
{

  protected static $db_table = "users";
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

    $sql = "SELECT * FROM users WHERE user_name = '$user_name' AND user_password = '$user_password' ";

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

  public function create()
  {
    global $database;

    $this->user_name = $database->escape_string($this->user_name);
    $this->user_password = $database->escape_string($this->user_password);
    $this->first_name = $database->escape_string($this->first_name);
    $this->last_name = $database->escape_string($this->last_name);

    $sql = "INSERT INTO users (user_name, user_password, first_name, last_name) VALUES ('$this->user_name', '$this->user_password' ,'$this->first_name', '$this->last_name')";

    if ($database->query($sql)) {
      $this->user_id = $database->insert_id();
      return true;
    } else {

      return false;
    }
  }

  public function update()
  {
    global $database;

    $this->user_id = $database->escape_string($this->user_id);
    $this->user_name = $database->escape_string($this->user_name);
    $this->user_password = $database->escape_string($this->user_password);
    $this->first_name = $database->escape_string($this->first_name);
    $this->last_name = $database->escape_string($this->last_name);

    $sql = "UPDATE users SET user_name = '$this->user_name', user_password = '$this->user_password', first_name='$this->first_name', last_name='$this->last_name' WHERE user_id= $this->user_id";

    $database->query($sql);
    return (mysqli_affected_rows($database->connection) == 1) ? true : false;
  }

  public function delete()
  {
    global $database;
    $this->user_id = $database->escape_string($this->user_id);
    $sql = "DELETE FROM users WHERE user_id = $this->user_id";
    $database->query($sql);
    return (mysqli_affected_rows($database->connection) == 1) ? true : false;
  }
}
