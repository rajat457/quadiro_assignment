<?php
include '../models/car.php';

// Retrieve car ID from URL
$id = $_GET['id'];
$car = getCarById($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $carName = $_POST['car_name'];
    $manufacturingYear = $_POST['manufacturing_year'];
    $price = $_POST['price'];

    // Update car details
    updateCar($id, $carName, $manufacturingYear, $price);

    // Redirect to dashboard
    header("Location: ../views/dashboard.php");
    exit();
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
        <form action="edit.php?id=<?php echo $id; ?>" method="POST">
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
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
