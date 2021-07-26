<?php 
require_once("Post.php");

$p = new Post();

//Select
echo "<pre>";
var_dump($p->getPosts());
var_dump($p->getPostById(2));
echo "</pre>";

//Add post
$data = [
  "title" => "Adding title test", 
  "content" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa magni reiciendis sit sapiente quam tempore quasi neque, ipsam iste similique sunt deleniti repellat autem voluptatum quia delectus ullam consequatur minima!"];
$p->addPost($data);

//Update post
$data = [
  "id" => 3,
  "title" => "Post threet", 
  "content" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa magni reiciendis sit sapiente quam tempore quasi neque, ipsam iste similique sunt deleniti repellat autem voluptatum quia delectus ullam consequatur minima!"];
$p->addPost($data);