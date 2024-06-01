<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "assignment10";

$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn) {
    die("Sorry conection failed!!! " . mysqli_connect_error());
} 
?>