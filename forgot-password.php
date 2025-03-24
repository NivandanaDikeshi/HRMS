<?php
session_start();

// Initialize variables
$email = "";
$emailErr = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate email input
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // Check if email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // If no errors, simulate sending a password reset link
    if (empty($emailErr)) {
        // Logic for sending email (this is a simulation)
        $_SESSION['status'] = "A password reset link has been sent to your email.";
        // Redirect or other logic here
        // header("Location: success.php");
    }
}

// Function to sanitize inputs
function test_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(89, 94, 99); /* Gray background */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .container {
            background-color: #f8f9fa; /* Light gray background */
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 500px;
        }
        h2 {
            text-align: center;
            color: #343a40; /* Dark gray text */
        }
        .form-control {
            border-radius: 30px;
            padding: 10px;
            margin-bottom: 15px;
            background-color: #e9ecef;
            border: 1px solid #ced4da;
        }
        .btn-submit {
            border-radius: 30px;
            background-color: #6c757d; /* Gray button */
            border: none;
            color: white;
            padding: 10px;
            font-size: 16px;
            width: 100%;
            transition: background-color 0.3s;
        }
        .btn-submit:hover {
            background-color: #495057;
        }
        .error {
            color: red;
            font-size: 0.9em;
        }
        .success-message {
            color: green;
            font-size: 1em;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Forgot Your Password?</h2>
    <p class="text-sm text-gray-600">Don't worry, just enter your email and we'll send you a password reset link.</p>

    <?php if (isset($_SESSION['status'])): ?>
        <div class="success-message">
            <?= $_SESSION['status']; unset($_SESSION['status']); ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <!-- Email Address -->
        <div>
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="<?= $email ?>" required autofocus>
            <span class="error"><?= $emailErr ?></span>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn-submit">Send Password Reset Link</button>
        </div>
    </form>
</div>

</body>
</html>
