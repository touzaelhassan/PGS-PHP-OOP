<?php

class User
{
  public $user_id;
  public $user_name;
  public $first_name;
  public $last_name;

  public function create_user()
  {
    global $database;
    $sql = "INSERT INTO users (user_name, user_password, first_name, last_name) VALUES ('$this->user_name', '$this->user_password', '$this->first_name', '$this->last_name')";
    $query = $database->query($sql);

    if ($query) {
      $this->user_id = $database->insert_id();
      return true;
    } else {
      return false;
    }
  }

  public static function get_users()
  {
    global $database;
    $sql = "SELECT * FROM users";
    $query = $database->query($sql);
    $users =  mysqli_fetch_all($query, MYSQLI_ASSOC);

    $array_of_user_objects = [];

    foreach ($users as $user) {
      $array_of_user_objects[] = self::instantiation($user);
    }

    return $array_of_user_objects;
  }

  public static function get_user_by_id($user_id)
  {
    global $database;
    $sql = "SELECT * FROM users WHERE user_id = $user_id";
    $query = $database->query($sql);
    $user = mysqli_fetch_assoc($query);

    return self::instantiation($user);
  }

  public function update_user()
  {
    global $database;
    $sql = "UPDATE users SET user_name = '$this->user_name', user_password = '$this->user_password', first_name = '$this->first_name', last_name = '$this->last_name' WHERE user_id = $this->user_id ";
    $database->query($sql);

    if (mysqli_affected_rows($database->connection) == 1) {
      return true;
    } else {
      return false;
    }
  }

  public function delete_user()
  {
    global $database;
    $sql = "DELETE FROM users WHERE user_id = $this->user_id";
    $database->query($sql);

    if (mysqli_affected_rows($database->connection) == 1) {
      return true;
    } else {
      return false;
    }
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

  public static function verify_user($user_name, $user_password)
  {
    global $database;
    $sql = "SELECT * FROM users WHERE user_name = '$user_name' AND user_password = '$user_password'";
    $query = $database->query($sql);
    $user = mysqli_fetch_assoc($query);

    if ($user) {
      return self::instantiation($user);
    } else {
      return false;
    }
  }
}
