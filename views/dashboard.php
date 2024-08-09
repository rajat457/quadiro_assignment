<?php
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

        <!-- Button to open the Add Car form -->
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addCarModal">Add Car</button>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Car Name</th>
                    <th>Manufacturing Year</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cars as $car): ?>
                <tr>
                    <td><?php echo $car['id']; ?></td>
                    <td><?php echo $car['car_name']; ?></td>
                    <td><?php echo $car['manufacturing_year']; ?></td>
                    <td><?php echo $car['price']; ?></td>
                    <td>
                        <a href="../controllers/edit.php?id=<?php echo $car['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="../controllers/delete.php?id=<?php echo $car['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal for Add Car Form -->
    <div class="modal fade" id="addCarModal" tabindex="-1" aria-labelledby="addCarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCarModalLabel">Add Car</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../controllers/add_car.php" method="POST">
                        <div class="mb-3">
                            <label for="car_name" class="form-label">Car Name</label>
                            <input type="text" class="form-control" id="car_name" name="car_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="manufacturing_year" class="form-label">Manufacturing Year</label>
                            <input type="number" class="form-control" id="manufacturing_year" name="manufacturing_year" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" step="0.01" class="form-control" id="price" name="price" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Car</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
