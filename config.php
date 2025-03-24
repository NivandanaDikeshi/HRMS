<?php
$servername = "localhost";
$username = "root"; // Default username for XAMPP
$password = ""; // Leave blank for default in XAMPP
$dbname = "hr_mod_db"; // Change this to your actual database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
