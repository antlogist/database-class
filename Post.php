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
    $this->db->bind("id", 2);
    return $this->db->single();
  }

}