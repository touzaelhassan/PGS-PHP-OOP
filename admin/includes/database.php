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
}

$database = new Database();

if ($database->connection) {
  echo "database connected successfuly";
}
?>