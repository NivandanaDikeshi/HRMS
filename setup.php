<?php
// Start the session and handle form submission
session_start();

// Define variables for form data and errors
$name = $email = $password = $password_confirmation = "";
$nameErr = $emailErr = $passwordErr = $password_confirmationErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate the form data
    if (empty($_POST["name"])) {
        $nameErr = "Full Name is required";
    } else {
        $name = test_input($_POST["name"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // Check if the email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = test_input($_POST["password"]);
    }

    if (empty($_POST["password_confirmation"])) {
        $password_confirmationErr = "Password confirmation is required";
    } else {
        $password_confirmation = test_input($_POST["password_confirmation"]);
        // Check if passwords match
        if ($password !== $password_confirmation) {
            $password_confirmationErr = "Passwords do not match";
        }
    }

    // If no errors, handle the registration logic (e.g., save to the database)
    if (empty($nameErr) && empty($emailErr) && empty($passwordErr) && empty($password_confirmationErr)) {
        // Handle registration (e.g., save user to the database)
        // For now, just simulate a successful registration
        $_SESSION['success'] = "Registration successful!";
        // Redirect or do something else
        // header("Location: login.php"); // Uncomment if you want to redirect after successful registration
    }
}

// Function to sanitize input
function test_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
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
            background-color:rgb(77, 82, 86); /* Gray background */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .register-container {
            background: #f8f9fa; /* Light gray background */
            width: 50%;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }
        .register-container .logo {
            display: block;
            margin: 0 auto 20px;
            width: 120px;
        }
        .register-container h2 {
            text-align: center;
            color: #343a40; /* Dark gray text */
            margin-bottom: 20px;
        }
        .form-control {
            border-radius: 30px;
            padding: 10px;
            margin-bottom: 15px;
            background-color: #e9ecef; /* Light gray input background */
            border: 1px solid #ced4da;
        }
        .btn-register {
            border-radius: 30px;
            background-color: #6c757d; /* Gray button */
            border: none;
            color: white;
            padding: 10px;
            font-size: 16px;
            width: 200px;
            transition: background-color 0.3s;
            display: block;
            margin: 20px auto; /* Center the button */
            text-align: center;
        }
        .btn-register:hover {
            background-color: #495057; /* Darker gray */
        }
        .text-center a {
            color:rgb(0, 136, 255);
            text-decoration: underline;
            font-weight: bold;
        }
        .text-center a:hover {
            color:rgb(0, 92, 184); 
        }
        .separator {
            margin: 20px 0;
            border-top: 1px solid #ddd;
        }
        .error {
            color: red;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Register</h2>
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?= $_SESSION['success']; unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="text" id="name" name="name" class="form-control" placeholder="Full Name" value="<?= $name ?>" required>
            <span class="error"><?= $nameErr ?></span>

            <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="<?= $email ?>" required>
            <span class="error"><?= $emailErr ?></span>

            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
            <span class="error"><?= $passwordErr ?></span>

            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
            <span class="error"><?= $password_confirmationErr ?></span>

            <button type="submit" class="btn-register">Register</button>
        </form>
        <hr class="separator">
        <p class="text-center">Already have an account? <a href="login.php">Login</a></p>
    </div>
</body>
</html>
