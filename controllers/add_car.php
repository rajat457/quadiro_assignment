<?php
include '../models/car.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $carName = $_POST['car_name'];
    $manufacturingYear = $_POST['manufacturing_year'];
    $price = $_POST['price'];

    createCar($carName, $manufacturingYear, $price);
    header("Location: ../views/dashboard.php");
}
?>
