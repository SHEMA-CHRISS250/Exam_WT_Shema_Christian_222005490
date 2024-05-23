<?php
// Database configuration
$servername = "localhost"; 
$username = "Shema"; 
$password = "Shema@123"; 
$database = "Mobile_App_Development"; // 

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
