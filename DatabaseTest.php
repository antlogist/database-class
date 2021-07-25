<?php

require_once("Database.php");

$db = new Database();

echo $db->isConnected() ? "DB Connected" : "DB Not Connected";
