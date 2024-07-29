<?php
// Database connection
$hostname = "localhost";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "food"; // Replace with your database name

// Create connection
$conn = new mysqli($hostname, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form data
$email = $_POST['email'];
$password = $_POST['password'];

// SQL query to check if email and password match
$sql = "SELECT * FROM form WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // Redirect to another page if login is successful
    header("Location: welcome.html");
    exit();
} else {
    // Display error message if login fails
    echo "Invalid email or password. Please try again.";
}

$conn->close();
?>