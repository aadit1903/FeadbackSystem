<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "feedback";
//create a connection object
$conn = mysqli_connect($servername, $username, $password,$database);

if (!$conn) {
    die("Sorry conection failed!!! " . mysqli_connect_error());
} else {
    // echo "connection is successfull<br>";
}

?>