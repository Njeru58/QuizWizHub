<?php
// Database connection parameters
$servername = "127.0.0.1";
$username = "root";
$password = "@rayo7079";
$database = "online_cat";

// Create connection
$admin_conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$admin_conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
