<?php

class User
{
  public function get_users()
  {
    global $database;
    $sql = "SELECT * FROM users";
    $query = $database->query($sql);
    return mysqli_fetch_all($query, MYSQLI_ASSOC);
  }
}
