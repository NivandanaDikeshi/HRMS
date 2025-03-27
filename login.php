<?php
session_start();
require 'db.php'; // Include the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // Prepare a statement to fetch user data
    $stmt = $conn->prepare("SELECT id, name, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    // Check if the user exists
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $name, $hashed_password);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Set session variables for the logged-in user
            $_SESSION['personal_info_id'] = $id;
            $_SESSION['full_name'] = $name;
            $_SESSION['logged_in'] = true;
            
            // Redirect to the dashboard
            header("Location: dashboard.php");
            exit();
        } else {
            $_SESSION['error'] = "Invalid email or password.";
        }
    } else {
        $_SESSION['error'] = "Invalid email or password.";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - HRMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: url('img/bg1.jpg');
            background-size: cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-container {
            background: rgba(255, 255, 255, 0.8);
            width: 40%;
            padding: 40px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            text-align: center;
        }
        .login-container .logo {
            width: 250px;
            margin-bottom: 50px;
        }
        .form-control {
            border-radius: 30px;
            padding: 10px;
        }
        .btn-login {
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            background: rgb(124, 125, 129);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn-login:hover {
            background: rgb(88, 87, 92);
        }
        .forgot-password {
            text-align: right;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="img/logo.png" alt="Logo" class="logo">
        <form method="POST" action="">
            <?php if (isset($_SESSION['error'])): ?>
                <div class="text-danger"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
            <?php endif; ?>
            <h2 class="mb-3">Login</h2>
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <a href="forgot-password.php" class="forgot-password">Forgot password?</a>
            <div class="d-grid">
                <button type="submit" class="btn btn-login">Login</button>
            </div>
            <p class="mt-3">Don't have an account? <a href="register.php">Sign up</a></p>
        </form>
    </div>
</body>
</html>
