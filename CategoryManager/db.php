<?php
  $DB_USER =  "root";
  $DB_PASSWORD = "password";
  $DB_DATABASE =  "Categories";
  $DB_HOST =  "127.0.0.1";

  $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_DATABASE);
  if($conn->connect_error){
    die("Connection failed ".$conn->connect_error);
  }

?>
