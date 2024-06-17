<?php
session_start();
// Define your login credentials (replace with your actual data)
$username = "Awoo";
$password = "defpassword";

// Get username and password from the form
$user_username = $_POST['username'];
$user_password = $_POST['password'];

// Check if username and password match
if ($username == $user_username && $password == $user_password) {
  // Login successful
  $_SESSION['username'] = $username;
  header('Location: main.php'); // Redirect to welcome page
  exit();
}
else
{
  // Login failed
  $_SESSION['error_message'] = 'Invalid username or password.';
  header('Location: login-form.php'); // Redirect back to login page
  exit();
}
