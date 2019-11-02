<?php
include("DatabaseCredentials.php");

class Database {
  private $conn;

  public function __construct() {

    $databaseCredentials = new DatabaseCredentials();

    try {
      $this->conn = new PDO("mysql:host=" . $databaseCredentials->host . ";dbname=" . $databaseCredentials->db_name, $databaseCredentials->username, $databaseCredentials->password);
    } catch(PDOException $exception) {
      echo "Connection error: " . $exception->getMessage();
    }

  }

  public function getConnection() {
    return $this->conn;
  }

}
?>
