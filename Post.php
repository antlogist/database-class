<?php

require_once("Database.php");

class Post {
  private $db;
  
  function __construct() {
    $this->db = new Database();
  }
  
  //Get all posts
  function getPosts() {
    $this->db->query("SELECT * FROM oop_posts");
    return $this->db->resultset();
  }
  
  //Get one post
  function getPostById($id) {
    $this->db->query("SELECT * FROM oop_posts WHERE id=:id");
    $this->db->bind(":id", $id);
    return $this->db->single();
  }
  
  //Insert records
  function addPost($data) {
    $this->db->query("INSERT INTO oop_posts (title, content) VALUES(:title, :content)");
    $this->db->bind(":title", $data['title']);
    $this->db->bind(":content", $data['content']);
    
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
