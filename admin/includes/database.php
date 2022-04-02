<?php require_once "new_config.php"; ?>

<?php

class Database
{
  public $connection;

  function __construct()
  {
    $this->open_database_connection();
  }

  public function open_database_connection()
  {
    $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  }

  public function query($sql)
  {
    $query = $this->connection->query($sql);
    return $query;
  }

  private function confirm_query($query)
  {
    if (!$query) {
      die("Query faild !" . $this->connection->error);
    }
  }

  public function escape_string($string)
  {
    $escaped_string = $this->connection->real_escape_string($string);
    return $escaped_string;
  }

  public function the_insert_id()
  {
    return $this->connection->insert_id;
  }
}

$database = new Database();

?>