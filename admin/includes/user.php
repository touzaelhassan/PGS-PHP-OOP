<?php

class User
{


  public function getUsers()
  {
    global $database;
    $query = $database->query("SELECT * FROM users");
    return $query;
  }
}
