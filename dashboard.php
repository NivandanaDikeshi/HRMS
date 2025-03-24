<?php
include("session.php");
include("db.php");

// Fetch some statistics (Example Queries)
$itemsCount = 10; // Fetch from database
$categoriesCount = 5;
$orderRate = 20;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>HRMS Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand mx-auto">HRMS Dashboard</a>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </nav>
    
    <div class="container mt-5">
        <h2 class="text-center">Welcome, <?php echo $_SESSION['username']; ?>!</h2>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card text-white bg-primary text-center">
                    <div class="card-body">
                        <h3>Items</h3>
                        <p class="display-4"><?php echo $itemsCount; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success text-center">
                    <div class="card-body">
                        <h3>Categories</h3>
                        <p class="display-4"><?php echo $categoriesCount; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-danger text-center">
                    <div class="card-body">
                        <h3>Order Rate</h3>
                        <p class="display-4"><?php echo $orderRate; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
