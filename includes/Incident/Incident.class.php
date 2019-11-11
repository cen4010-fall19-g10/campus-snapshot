<?php

class Incident
{
    private $user_id;
    private $title;
    private $image_name;
    private $description;
    private $incident_id;

    private $username;

    private $comments;

    public function __construct($user_id = null, $username = null, $title = null, $image_name = null, $description = null, $incident_id = null) {
        $this->title = $title;
        $this->username = $username;
        $this->image_name = $image_name;
        $this->incident_id = $incident_id;
        $this->description = $description;

        $this->comments = array();
    }

    public function create_incident($user_id, $title, $img_filename, $description) {
        $this->title = trim($title);
        $this->image_name = trim($img_filename);
        $this->description = trim($description);

        $stmt = Database::connection()->prepare("INSERT INTO incidents SET user_id = ?, title = ? , img_filename = ? , description = ?, active = ?");
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $title);
        $stmt->bindParam(3, $img_filename);
        $stmt->bindParam(4, $description);
        $stmt->bindValue(5, 1);
        $stmt->execute();
    }

    public function load_comments() {
        $stmt = Database::connection()->query("SELECT comments.id, comments.post_id, comments.user_id, comments.comment, users.username FROM comments INNER JOIN users ON comments.user_id = users.id WHERE post_id='" . $this->incident_id . "'");
        while ($row = $stmt->fetch()) {
            $comment = new Comment($row['id'], $row['post_id'], $row['user_id'], $row['comment'], $row['username']);
            array_push($this->comments, $comment);
        }
    }

    public function get_comments() {
        return $this->comments;
    }

    public function get_incident($incident_id) {
        $stmt = Database::connection()->prepare("SELECT incidents.id AS inc_id, incidents.user_id, incidents.title, incidents.img_filename, incidents.description, users.username FROM incidents INNER JOIN users ON incidents.user_id = users.id  WHERE incidents.id= ? ");
        $stmt->bindParam(1, $incident_id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $incident = new Incident($row['user_id'], $row['username'], $row['title'], $row['img_filename'], $row['description'], $row['inc_id']);
        $incident->load_comments();

        return $incident;
    }


    public function get_username() {
        return $this->username;
    }


    public function get_all_incidents($school_id) {

        $incidents = array();
        $stmt = Database::connection()->query("SELECT incidents.user_id, incidents.id AS inid, incidents.title, incidents.img_filename, users.username, incidents.description,users.school_id FROM incidents INNER JOIN users ON incidents.user_id = users.id WHERE active=1 AND users.school_id='" . $school_id . "' ORDER BY inid DESC");
        while ($row = $stmt->fetch()) {
            $incident = new Incident($row['user_id'], $row['username'], $row['title'], $row['img_filename'], $row['description'], $row['inid']);
            $incident->set_username($row['username']);
            array_push($incidents, $incident);
        }

        return $incidents;
    }

    public function set_username($username) {
        $this->username = $username;
    }

    public function get_title() {
        return $this->title;
    }

    public function get_incident_id() {
        return $this->incident_id;
    }

    public function get_image_name() {
        return $this->image_name;
    }

    public function get_description() {
        return $this->description;
    }
}