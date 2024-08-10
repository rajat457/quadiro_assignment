<?php
include '../models/car.php';

// Display errors for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    deleteCar($id);

    header('Location: ../views/dashboard.php');
    exit();
}
?>
