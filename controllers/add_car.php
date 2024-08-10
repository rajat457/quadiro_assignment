<?php
include '../models/car.php';

// Retrieve POST data
$carName = $_POST['car_name'];
$manufacturingYear = $_POST['manufacturing_year'];
$price = $_POST['price'];

// Add car to the database
createCar($carName, $manufacturingYear, $price);

// Redirect to dashboard
header("Location: ../views/dashboard.php");
exit();
?>
