<?php
session_start();

// Dummy admin credentials
$adminUsername = 'admin';
$adminPassword = 'password'; // In real applications, use hashed passwords

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == $adminUsername && $password == $adminPassword) {
        $_SESSION['admin'] = $username;
        header("Location: ../views/dashboard.php");
    } else {
        echo "Invalid credentials!";
    }
}
?>
