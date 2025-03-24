<?php
session_start();
require 'config.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password = $_POST['password'];
    $errors = [];

    if (empty($password)) {
        $errors['password'] = "Password is required.";
    } else {
        $stmt = $conn->prepare("SELECT password FROM users WHERE id = ?");
        $stmt->bind_param("i", $_SESSION['user_id']); // Assuming user is logged in
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            if (!password_verify($password, $row['password'])) {
                $errors['password'] = "Incorrect password.";
            } else {
                header("Location: secure_page.php"); // Redirect to secure area
                exit();
            }
        } else {
            $errors['password'] = "User not found.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Password</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #400b08;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            background: rgba(255, 255, 255, 0.9);
            width: 40%;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            text-align: center;
        }
        .container h2 {
            color: #400b08;
            margin-bottom: 15px;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 30px;
            border: 1px solid #ccc;
        }
        .btn-confirm {
            border-radius: 30px;
            background-color: #400b08;
            border: none;
            color: white;
            padding: 10px;
            font-size: 16px;
            width: 200px;
            transition: background-color 0.3s;
            display: block;
            margin: 20px auto;
        }
        .btn-confirm:hover {
            background-color: #602626;
        }
        .text-danger {
            color: red;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Confirm Password</h2>
        <p>This is a secure area of the application. Please confirm your password before continuing.</p>
        <form method="POST" action="">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <div class="text-danger"><?php echo $errors['password'] ?? ''; ?></div>
            <button type="submit" class="btn-confirm">Confirm</button>
        </form>
    </div>
</body>
</html>