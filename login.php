<?php session_start(); ?>
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
            align-self: center;
        }
        .form-control {
            border-radius: 30px;
            padding: 10px;
        }
        .btn-login {
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            background:rgb(124, 125, 129);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-clour 0.3s;
        }
        .btn-login:hover {
            background:rgb(88, 87, 92);
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
        <form method="POST" action="login.php">
            <?php if (isset($_SESSION['error'])): ?>
                <div class="text-danger"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
            <?php endif; ?>
            <h2 class="mb-">Login</h2>
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
            <p class="mt-3">Don't have an account? <a href="setup.php">Sign up</a></p>
        </form>
    </div>
</body>
</html>
