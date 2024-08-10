<?php
include '../dp.php';

function getAllCars($sortColumn = 'id', $sortOrder = 'ASC') {
    global $conn;
    $allowedSortColumns = ['id', 'car_name', 'manufacturing_year', 'price'];
    $sortColumn = in_array($sortColumn, $allowedSortColumns) ? $sortColumn : 'id';
    $sortOrder = $sortOrder === 'DESC' ? 'DESC' : 'ASC';

    $stmt = $conn->prepare("SELECT * FROM cars ORDER BY $sortColumn $sortOrder");
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

function createCar($carName, $manufacturingYear, $price) {
    global $conn;
    $sql = "INSERT INTO cars (car_name, manufacturing_year, price) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sii", $carName, $manufacturingYear, $price);
    $stmt->execute();
}

function getCarById($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM cars WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function updateCar($id, $carName, $manufacturingYear, $price) {
    global $conn;
    $sql = "UPDATE cars SET car_name=?, manufacturing_year=?, price=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siii", $carName, $manufacturingYear, $price, $id);
    $stmt->execute();
}

function deleteCar($id) {
    global $conn;
    $sql = "DELETE FROM cars WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
}
?>
