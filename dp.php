<?php
$host = 'dpg-cqrho7ggph6c739ve1n0-a.oregon-postgres.render.com';
$port = '5432'; // Default PostgreSQL port
$dbname = 'quadiro_db';
$username = 'root';
$password = 'NsRr511aPIRDaJt4HcLmgEy5jWJ6g0IA';

$dsn = "pgsql:host=$host;port=$port;dbname=$dbname";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
