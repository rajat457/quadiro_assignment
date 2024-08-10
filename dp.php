<?php
$dsn = 'postgresql://root:NsRr511aPIRDaJt4HcLmgEy5jWJ6g0IA@dpg-cqrho7ggph6c739ve1n0-a/quadiro_db';
$username = 'root';
$password = 'NsRr511aPIRDaJt4HcLmgEy5jWJ6g0IA';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
