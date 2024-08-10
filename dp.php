<?php
$servername = "sql110.infinityfree.com";
$username = "if0_37077798";
$password = "IbUh9VlbleeE";
$dbname = "if0_37077798_quadiro_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
