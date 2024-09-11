<?php
$host = "db"; 
$user = "user"; 
$password = "test";
$dbname = "grower"; 

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}