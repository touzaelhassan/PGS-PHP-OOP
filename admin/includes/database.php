<?php

class Database
{
  private $connection;

  public function open_database_connection()
  {
    $this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  }
}

$database = new Database();
$database->open_database_connection();
