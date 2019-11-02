<?php class User {
  private $conn;

  public function __construct($database) {
    $this->conn = $database;
  }

  public function exists($username) {
    $stmt = $this->conn->getConnection()->prepare("SELECT COUNT(username) AS num FROM users WHERE username = :username");
    $stmt->bindValue(':username', $username);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if($row['num'] > 0){
        die('That username already exists!');
    }
  }

  public function register($username, $password, $school_id) {
      $stmt = $this->conn->getConnection()->prepare("INSERT INTO users SET username = ? , password = ? , school_id = ?");
      $stmt->bindParam(1, $username);
      $stmt->bindParam(2, $password);
      $stmt->bindParam(3, $school_id);
      $stmt->execute();
  }
} ?>
