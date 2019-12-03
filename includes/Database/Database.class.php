<?php
class Database
{
  private static $instance = null;
  private $db;
  private $host = '';
  private $username = '';
  private $password = '';
  private $database = '';

  private function __construct()
  {
    $this->db = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database, $this->username, $this->password);
  }

  public static function connection()
  {
    if (self::$instance === null) {
      self::$instance = new self();
    }
    return self::$instance->db;
  }
}
?>

