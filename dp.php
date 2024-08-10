<?php
$servername = "sql110.infinityfree.com";
$username = "if0_37077798";
$password = "IbUh9VlbleeE";
$dbname = "if0_37077798_quadiro_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
} else {
    echo "Connected successfully";
}
?>
