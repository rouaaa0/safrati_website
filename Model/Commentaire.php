<?php

class Commentaire {

    private $id;
    private $message;
    private $date;
    private $id_blog;
    private $id_utilisateur;

    public function __construct($message, $date, $id_blog, $id_utilisateur) {
        $this->message = $message;
        $this->date = $date;
        $this->id_blog = $id_blog;
        $this->id_utilisateur = $id_utilisateur;
    }

    // Getter and setter methods for ID
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    // Getter and setter methods for Message
    public function getMessage() {
        return $this->message;
    }

    public function setMessage($message) {
        $this->message = $message;
    }

    // Getter and setter methods for Date
    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    // Getter and setter methods for Blog ID
    public function getBlogId() {
        return $this->id_blog;
    }

    public function setBlogId($id_blog) {
        $this->id_blog = $id_blog;
    }

    // Getter and setter methods for User ID
    public function getUserId() {
        return $this->id_utilisateur;
    }

    public function setUserId($id_utilisateur) {
        $this->id_utilisateur = $id_utilisateur;
    }
}

?>