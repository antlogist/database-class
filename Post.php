<?php

require_once("Database.php");

class Post {
  private $db;
  
  function __construct() {
    $this->db = new Database();
  }
  
  //Get all records
  function getPosts() {
    $this->db->query("SELECT * FROM oop_posts");
    return $this->db->resultset();
  }
  
  //Get one record
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
  
  //Update record
  function updatePost($data) {
    $this->db->query("UPDATE oop_posts SET title = :title, content = :content WHERE id = :id");
    $this->db->bind(":id", $data['id']);
    $this->db->bind(":title", $data['title']);
    $this->db->bind(":content", $data['content']);
    
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
  
  //Delete record
  function deletePost($id) {
    $this->db->query("DELETE FROM oop_posts WHERE id = :id");
    $this->db->bind(":id", $id);
    
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
  
}
