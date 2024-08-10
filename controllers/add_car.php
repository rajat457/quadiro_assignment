<?php
include '../models/car.php';

// Display errors for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $carName = $_POST['car_name'];
    $manufacturingYear = $_POST['manufacturing_year'];
    $price = $_POST['price'];

    createCar($carName, $manufacturingYear, $price);

    header('Location: ../views/dashboard.php');
    exit();
}
?>
