<?php
session_start();
include("db.php"); // Include your database connection file

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['user_name']);
    $email = trim($_POST['user_email']);
    $password = $_POST['user_password'];
    $confirm_password = $_POST['password_confirmation'];

    // Basic validation
    if (empty($name)) {
        $errors['name'] = "Full Name is required.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }
    if (strlen($password) < 6) {
        $errors['password'] = "Password must be at least 6 characters.";
    }
    if ($password !== $confirm_password) {
        $errors['password_confirmation'] = "Passwords do not match.";
    }

    // If no errors, insert into database
    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $hashed_password);
        
        if ($stmt->execute()) {
            $_SESSION['success'] = "Registration successful. You can now login.";
            header("Location: login.php");
            exit();
        } else {
            $errors['db'] = "Error registering user. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color:rgb(89, 94, 99); 
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .register-container {
            background: rgba(255, 255, 255, 0.9);
            width: 50%;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }
        .register-container h2 {
            text-align: center;
            color:rgb(72, 72, 72);
            margin-bottom: 20px;
        }
        .form-control {
            border-radius: 30px;
            padding: 10px;
            margin-bottom: 15px;
        }
        .btn-register {
            border-radius: 30px;
            background-color:rgb(114, 111, 110);
            border: none;
            color: white;
            padding: 10px;
            font-size: 16px;
            width: 200px;
            transition: background-color 0.3s;
            display: block;
            margin: 20px auto;
            text-align: center;
        }
        .btn-register:hover {
            background-color:rgb(78, 78, 78);
        }
        .text-center a {
            color:rgb(9, 120, 255);
            text-decoration: underline;
        }
        .separator {
            margin: 20px 0;
            border-top: 1px solid #ddd;
        }
        .text-danger {
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Register</h2>
        <?php if (!empty($errors)) : ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <form method="POST" action="">
            <input type="text" name="name" class="form-control" placeholder="Full Name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" required>
            <input type="email" name="email" class="form-control" placeholder="Email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
            <button type="submit" class="btn-register">Register</button>
        </form>
        <hr class="separator">
        <p class="text-center">Already have an account? <a href="login.php">Login</a></p>
    </div>
</body>
</html>