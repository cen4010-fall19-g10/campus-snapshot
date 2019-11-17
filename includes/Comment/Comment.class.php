<?php

class Comment
{
    private $id;
    private $post_id;
    private $user_id;
    private $comment;

    private $username;

    public function __construct($id = null, $post_id = null, $user_id = null, $comment = null, $username = null)
    {
        $this->id = $id;
        $this->post_id = $post_id;
        $this->user_id = $user_id;
        $this->comment = $comment;
        $this->username = $username;
    }

    public function create($post_id, $user_id, $comment) {

        $comment = trim($comment);

        $stmt = Database::connection()->prepare("INSERT INTO comments SET post_id = ? , user_id = ? , comment = ?");
        $stmt->bindParam(1, $post_id);
        $stmt->bindParam(2, $user_id);
        $stmt->bindParam(3, $comment);
        $stmt->execute();
    }

    public function get_username() {
        return $this->username;
    }

    public function get_comment() {
        return $this->comment;
    }
}