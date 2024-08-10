<?php
include '../dp.php'; // Ensure this file initializes $pdo

function getAllCars($sortColumn = 'id', $sortOrder = 'ASC') {
    global $pdo;
    $allowedSortColumns = ['id', 'car_name', 'manufacturing_year', 'price'];
    $sortColumn = in_array($sortColumn, $allowedSortColumns) ? $sortColumn : 'id';
    $sortOrder = $sortOrder === 'DESC' ? 'DESC' : 'ASC';

    $stmt = $pdo->prepare("SELECT * FROM cars ORDER BY $sortColumn $sortOrder");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function createCar($carName, $manufacturingYear, $price) {
    global $pdo;
    $sql = "INSERT INTO cars (car_name, manufacturing_year, price) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$carName, $manufacturingYear, $price]);
}

function getCarById($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM cars WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function updateCar($id, $carName, $manufacturingYear, $price) {
    global $pdo;
    $sql = "UPDATE cars SET car_name=?, manufacturing_year=?, price=? WHERE id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$carName, $manufacturingYear, $price, $id]);
}

function deleteCar($id) {
    global $pdo;
    $sql = "DELETE FROM cars WHERE id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
}
?>
