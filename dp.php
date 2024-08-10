<?php
$servername = "dpg-cqrho7ggph6c739ve1n0-a";
$username = "root"; // Default XAMPP username
$password = "NsRr511aPIRDaJt4HcLmgEy5jWJ6g0IA"; // Default XAMPP password
$dbname = "quadiro_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
