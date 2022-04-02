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
    $this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  }

  public function query($sql)
  {
    $query = mysqli_query($this->connection, $sql);
    return $query;
  }

  private function confirm_query($query)
  {
    if (!$query) {
      die("Query faild !");
    }
  }

  public function escape_string($string)
  {
    $escaped_string = mysqli_escape_string($this->connection, $string);
    return $escaped_string;
  }
}

$database = new Database();

?>