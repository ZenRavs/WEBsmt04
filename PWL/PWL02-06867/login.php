<?php
session_start();

$username = $_POST['username'];
$password = md5($_POST['password']);
echo "$password <br>";
// Replace with your actual database credentials
$servername = "localhost";
$db_username = "root";
$db_passw = "";
$dbname = "db_generals";

// Create connection
$conn = new mysqli($servername, $db_username, $db_passw, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming you have a 'users' table with 'username' and 'password' columns
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (substr($row['username'], 0, 3) == "A12") {
        $_SESSION['role'] = 'Mahasiswa';
        header("Location: dashboard.php");
    } elseif (substr($row['username'], 0, 4) == "0686") {
        $_SESSION['role'] = 'Dosen';
        header("Location: dashboard.php");
    } elseif (substr($row['username'], 0, 6) == "Ridho" || "Admin") {
        $_SESSION['role'] = 'Admin';
        header("Location: dashboard.php");
    } else {
        // Handle other user roles or invalid login
        echo "Invalid username or password";
    }
} else {
    echo "Invalid username or password";
}

$conn->close();
