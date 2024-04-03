<?php

$mysqli=false;
function connectDB(){
global $conn;
$conn=new mysqli("localhost","root","","autostation");

$conn->query("SET NAMES 'utf-8'");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
}


?>
