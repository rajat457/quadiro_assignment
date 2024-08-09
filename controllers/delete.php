<?php
include '../models/car.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $carId = $_GET['id'];
    deleteCar($carId);
    header("Location: ../views/dashboard.php");
}
