<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_xirpl1";

// Create a new connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
