<?php
session_start();
// Database connection
$host = "localhost"; // Change if your database server is different
$username = "root"; // Change to your database username
$password = ""; // Change to your database password
$dbname = "db_generals"; // Change to your database name

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $profession = $_POST['profession'];
    $info_source = $_POST['info_source'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO bookfair (name, address, profession, info_source) values (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $address, $profession, $info_source);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to index.php with the registered name
        $_SESSION['registered'] = $name;
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}
