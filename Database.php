<?php

require_once("config/config.php");

class Database {
  private $host = DB_HOST;
  private $user = DB_USER;
  private $pass = DB_PASS;
  private $dbname = DB_NAME;
  
  private $connection;
  private $error;
  private $statement;
  private $dbconnected = false;
  
  function __construct() {
    
    //Set PDO connection
    $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname;
    
    $options = array(
      PDO::ATTR_PERSISTENT => true,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );
    
    try {
      $this->connection = new PDO($dsn, $this->user, $this->pass, $options);
      $this->dbconnected = true;
    }catch(PDOException $e) {
      $this->error = $e->getMessage().PHP_EOL;
      $this->dbconnected = false;
    }
  }
  
  function getError() {
    return $this->error;
  }
  
  function isConnected() {
    return $this->dbconnected;
  }
  
  //Prepare statement with query
  function query($query) {
    $this->statement = $this->connection->prepare($query);
  }
  
  //Execute the prepared statement
  function execute() {
    return $this->statement->execute();
  }
  
  //Get reasult and set them as an Array of Objects
  function resultset() {
    $this->execute();
    return $this->statement->fetchAll(PDO::FETCH_OBJ);
  }
  
  //Get recorded row count
  function rowCount() {
    return $this->statement->rowCount();
  }
  
  //Get single recodrd as an Object
  function single() {
    $this->execute();
    return $this->statement->fetch(PDO::FETCH_OBJ);
  }
  
  function bind($param, $value, $type = null) {
    if (is_null($type)) {
      switch(true) {
        case is_int($value):
          $type = PDO::PARAM_INT;
          break;
        case is_null($value):
          $type = PDO::PARAM_NULL;
          break;
        case is_bool($value):
          $type = PDO::PARAM_BOOL;
          break;
        default:
          $type = PDO::PARAM_STR;
      }
    }
    $this->statement->bindValue($param, $value, $type);
  }
}