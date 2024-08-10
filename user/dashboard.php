<?php
session_start();

// Redirect to login if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include '../dp.php';
include '../models/car.php';

// Display errors for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Default sorting
$sortColumn = 'id'; // Default sort by ID
$sortOrder = 'ASC'; // Default sort order

// Check if sorting parameters are set
if (isset($_GET['sort']) && isset($_GET['order'])) {
    $sortColumn = $_GET['sort'];
    $sortOrder = $_GET['order'] === 'DESC' ? 'DESC' : 'ASC';
}

// Fetch cars with sorting
$cars = getAllCars($sortColumn, $sortOrder);
$totalCars = count($cars);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Dashboard</title>
</head>
<body>

    <div class="container mt-5">
        <h2>Dashboard</h2>
        <p>Total Cars: <?php echo $totalCars; ?></p>
        <!-- Logout Button -->
        <div class="text-right mb-3">
            <a href="../user/login.php" class="btn btn-danger">Logout</a>
        </div>
        <!-- Sort Options -->
        <div class="mb-3">
            <form action="dashboard.php" method="GET">
                <label for="sort" class="form-label">Sort By:</label>
                <select name="sort" id="sort" class="form-select" onchange="this.form.submit()">
                    <option value="id" <?php echo $sortColumn == 'id' ? 'selected' : ''; ?>>ID</option>
                    <option value="car_name" <?php echo $sortColumn == 'car_name' ? 'selected' : ''; ?>>Name</option>
                    <option value="manufacturing_year" <?php echo $sortColumn == 'manufacturing_year' ? 'selected' : ''; ?>>Year</option>
                    <option value="price" <?php echo $sortColumn == 'price' ? 'selected' : ''; ?>>Price</option>
                </select>
                <input type="hidden" name="order" value="<?php echo $sortOrder; ?>">
                
            </form>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Car Name</th>
                    <th>Manufacturing Year</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cars as $car): ?>
                <tr>
                    <td><?php echo $car['id']; ?></td>
                    <td><?php echo $car['car_name']; ?></td>
                    <td><?php echo $car['manufacturing_year']; ?></td>
                    <td><?php echo $car['price']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
