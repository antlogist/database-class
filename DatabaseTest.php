<?php

require_once("Database.php");

$db = new Database();

echo $db->isConnected() ? "DB Connected" . PHP_EOL : "DB Not Connected" . PHP_EOL;

if(!$db->isConnected()) {
  echo $db->getError();
  die("Unable to connect to the DB");
}

$db->query("SELECT * FROM tbl_oop_test");
echo "<pre>";
var_dump($db->resultset());
var_dump($db->single());
echo "</pre>";

echo "Rows: " . $db->rowCount();

$db->query("SELECT * FROM tbl_oop_test WHERE id = :id");
$db->bind("id", 2);
echo "<pre>";
var_dump($db->single());
echo "</pre>";