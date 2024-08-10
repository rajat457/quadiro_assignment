<?php
include '../dp.php'; // Ensure this file sets up PDO as shown earlier

function getAllCars($sortColumn = 'id', $sortOrder = 'ASC') {
    global $pdo;
    $allowedSortColumns = ['id', 'car_name', 'manufacturing_year', 'price'];
    $sortColumn = in_array($sortColumn, $allowedSortColumns) ? $sortColumn : 'id';
    $sortOrder = $sortOrder === 'DESC' ? 'DESC' : 'ASC';

    $sql = "SELECT * FROM cars ORDER BY $sortColumn $sortOrder";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function createCar($carName, $manufacturingYear, $price) {
    global $pdo;
    $sql = "INSERT INTO cars (car_name, manufacturing_year, price) VALUES (:car_name, :manufacturing_year, :price)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':car_name', $carName);
    $stmt->bindParam(':manufacturing_year', $manufacturingYear, PDO::PARAM_INT);
    $stmt->bindParam(':price', $price, PDO::PARAM_STR);
    $stmt->execute();
}

function getCarById($id) {
    global $pdo;
    $sql = "SELECT * FROM cars WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function updateCar($id, $carName, $manufacturingYear, $price) {
    global $pdo;
    $sql = "UPDATE cars SET car_name = :car_name, manufacturing_year = :manufacturing_year, price = :price WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':car_name', $carName);
    $stmt->bindParam(':manufacturing_year', $manufacturingYear, PDO::PARAM_INT);
    $stmt->bindParam(':price', $price, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

function deleteCar($id) {
    global $pdo;
    $sql = "DELETE FROM cars WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}
?>
