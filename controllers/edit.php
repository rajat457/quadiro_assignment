<?php
include '../models/car.php';

// Display errors for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $carId = $_POST['id'];
    $carName = $_POST['car_name'];
    $manufacturingYear = $_POST['manufacturing_year'];
    $price = $_POST['price'];

    updateCar($carId, $carName, $manufacturingYear, $price);

    // Redirect to dashboard after updating
    header("Location: ../views/dashboard.php");
    exit(); // Ensure no further code is executed
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $carId = $_GET['id'];
    $car = getCarById($carId); // Fetch car details by ID
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Edit Car</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Car</h2>
        <form action="edit.php" method="POST">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($car['id']); ?>">
            <div class="mb-3">
                <label for="car_name" class="form-label">Car Name</label>
                <input type="text" class="form-control" id="car_name" name="car_name" value="<?php echo htmlspecialchars($car['car_name']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="manufacturing_year" class="form-label">Manufacturing Year</label>
                <input type="number" class="form-control" id="manufacturing_year" name="manufacturing_year" value="<?php echo htmlspecialchars($car['manufacturing_year']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" value="<?php echo htmlspecialchars($car['price']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Car</button>
        </form>
        <a href="../views/dashboard.php" class="btn btn-secondary mt-3">Back to Dashboard</a>
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
