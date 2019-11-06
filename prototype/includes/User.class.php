<?php class User {
  private $conn;
  private $username;
  private $id;
  private $schoolId;
  private $isModerator;

  public function __construct($database) {
    $this->conn = $database;
  }

  public function getUsername() {
    return $this->username;
  }

  public function getSchoolId() {
    return $this->schoolId;
  }

  public function getUser() {

  }

  private function username_exists($username) {
    $stmt = $this->conn->getConnection()->prepare("SELECT COUNT(username) AS num FROM users WHERE username = ?");
    $stmt->bindParam(1, $username);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if($row['num'] > 0)
        return true;

    return false;
  }

  public function login($username, $password) {

  }

  public function register($username, $password, $school_id) {

    if(empty($username) || empty($password) || empty($school_id))
      throw new Exception('A required field was empty');

    /* Trim leading and trailing whitespace */
    $_username = trim($_POST['username']);
    $_password = trim($_POST['password']);

    if($this->username_exists($username))
      throw new Exception('Username already exists');

    /* Insert the user into the database */
    $stmt = $this->conn->getConnection()->prepare("INSERT INTO users SET username = ? , password = ? , school_id = ?");
    $stmt->bindParam(1, $username);
    $stmt->bindParam(2, $password);
    $stmt->bindParam(3, $school_id);
    $stmt->execute();

    /* Set the current User instance variables */
    $this->id = $this->conn->getConnection()->lastInsertId();
    $this->username = $username;
    $this->schoolId = $school_id;
    $this->isModerator = false;
  }
} ?>
