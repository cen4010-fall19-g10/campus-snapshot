<?php class User {
  private $user_id;
  private $comment_id;
  private $text;
  private $timestamp;

  public function __construct($database) {
    $this->conn = $database;
  }

  public function create($comment) {

  }

  public function remove($id) {

  }

  public function getComment($id) {

  }

  public function reportComment($id) {
    
  }

} ?>
