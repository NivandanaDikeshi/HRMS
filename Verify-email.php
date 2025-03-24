<?php
session_start();
require 'config.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['resend'])) {
        // Resend verification email logic (not implemented here)
        $_SESSION['status'] = "A new verification link has been sent to your email address.";
    } elseif (isset($_POST['logout'])) {
        session_destroy();
        header("Location: login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
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
        .btn {
            border-radius: 30px;
            background-color: #400b08;
            border: none;
            color: white;
            padding: 10px;
            font-size: 16px;
            width: 250px;
            transition: background-color 0.3s;
            display: block;
            margin: 10px auto;
            text-align: center;
        }
        .btn:hover {
            background-color: #602626;
        }
        .text-danger {
            color: red;
            font-size: 14px;
        }
        .text-success {
            color: green;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Email Verification</h2>
        <p>Thanks for signing up! Please verify your email address by clicking the link we sent to your email. If you didn't receive the email, you can request a new one below.</p>
        <?php if (isset($_SESSION['status'])): ?>
            <div class="text-success"><?php echo $_SESSION['status']; unset($_SESSION['status']); ?></div>
        <?php endif; ?>
        <form method="POST" action="">
            <button type="submit" name="resend" class="btn">Resend Verification Email</button>
        </form>
        <form method="POST" action="">
            <button type="submit" name="logout" class="btn">Log Out</button>
        </form>
    </div>
</body>
</html>
