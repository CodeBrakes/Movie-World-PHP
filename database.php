<?php
$hostname     = "127.0.0.1"; 
$Username     = "root";  
$Password     = "";  
$databasename = "mydb"; 
// Create connection 
$conn = new mysqli($hostname, $Username, $Password,$databasename);
 // Check connection 
if ($conn->connect_error) { 
die("Unable to Connect database: " . $conn->connect_error);
 }
?>

