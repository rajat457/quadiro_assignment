<?php
include '../models/car.php';

// Retrieve car ID from URL
$id = $_GET['id'];

// Delete the car from the database
deleteCar($id);

// Redirect to dashboard
header("Location: ../views/dashboard.php");
exit();
?>
