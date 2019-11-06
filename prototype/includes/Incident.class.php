<?php class Incident {
  private $id;
  private $title;
  private $description;
  private $active;

  public function __construct($database) {
    $this->conn = $database;
  }

  public function create($title, $description, $image) {

  }

  public function remove($id) {

  }

  public function getIncident($id) {

  }

  public function setActive($id) {

  }

  public function reportIncident($id) {

  }

} ?>
