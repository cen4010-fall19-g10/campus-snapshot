<?php
class DatabaseCredentials {
  public $host;
  public $username;
  public $password;
  public $db_name;
  public $port;

  public function __construct() {
    $this->host = "localhost";
    $this->username = "root";
    $this->password = "";
    $this->db_name = "campus_snapshot";
    $this->port = 3306;
  }
}
?>
