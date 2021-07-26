<?php 
require_once("Post.php");

$p = new Post();

echo "<pre>";
var_dump($p->getPosts());
var_dump($p->getPostById(2));
echo "</pre>";
