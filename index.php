<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quadiro Technologies Assignment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            text-align: center;
        }
        .btn-login {
            margin-top: 20px;
        }
        .assignment-description {
            margin-top: 20px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Login Button -->
        <h1>Welcome to the Car Management System</h1>
        <a href="controllers/login.php" class="btn btn-primary">Login</a>

        <!-- Assignment Description -->
        <div class="assignment-description">
            <h2>Assignment for Quadiro Technologies</h2>
            <p>This assignment involves creating a web application for managing car records. The application features an admin panel for CRUD operations on car records and a user interface for viewing these records. The main functionalities include:</p>
            <ul>
                <li>Admin login and CRUD operations for managing car records.</li>
                <li>User login and viewing car records.</li>
                <li>Sorting options for viewing car records by name, manufacturing year, or price, with ascending and descending order support.</li>
            </ul>
            <p>Technologies used include PHP for backend development and Bootstrap for frontend styling.</p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
