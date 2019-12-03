<?php

class User {
  private $username;
  private $id;
  private $schoolId;
  private $official;
  private $logged_in;

  public function __construct() {
    if (isset($_SESSION['logged_in'])) {
      if ($_SESSION['logged_in'] == true) {
        $this->username = $_SESSION['username'];
        $this->id = $_SESSION['id'];
        $this->schoolId = $_SESSION['school_id'];
        $this->logged_in = $_SESSION['logged_in'];
      }
    }
  }

  public function logout() {
    session_destroy();
  }

  public function is_logged_in() {
    return $this->logged_in;
  }

  public function getId() {
    return $this->id;
  }

  public function getUsername() {
    return $this->username;
  }

  public function getSchoolId() {
    return $this->schoolId;
  }

  private function username_exists($username) {
    $stmt = Database::connection()->prepare("SELECT COUNT(username) AS num FROM users WHERE username = ?");
    $stmt->bindParam(1, $username);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if($row['num'] > 0)
        return true;

    return false;
  }

  public function login($username, $password) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $stmt = Database::connection()->prepare('SELECT id, school_id, password FROM users WHERE username = ?');
    $stmt->bindParam(1, $username);
    $stmt->execute();
    $user = $stmt->fetch();

    if(password_verify($password, $user["password"])) {
      session_regenerate_id();
      $_SESSION['id'] = $user["id"];
      $_SESSION['username'] = $username;
      $_SESSION['school_id'] = $user["school_id"];
      $_SESSION['logged_in'] = true;
      return true;
    }

    return false;
  }

  public function register($username, $password, $school_id) {

    if(empty($username) || empty($password) || empty($school_id))
      throw new Exception('A required field was empty');

    /* Trim leading and trailing whitespace */
    $username = trim($username);
    $password = trim($password);

    /* Hash the password */
    $password = password_hash($password, PASSWORD_DEFAULT);

    if($this->username_exists($username))
      throw new Exception('Username already exists');

    /* Insert the user into the database */
    $stmt = Database::connection()->prepare("INSERT INTO users SET username = ? , password = ? , school_id = ?");
    $stmt->bindParam(1, $username);
    $stmt->bindParam(2, $password);
    $stmt->bindParam(3, $school_id);
    $stmt->execute();

    /* Set the current User instance variables */
    $this->id = Database::connection()->lastInsertId();
    $this->username = $username;
    $this->schoolId = $school_id;
    $this->isModerator = false;
  }
} ?>
