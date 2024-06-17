<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MHS Login Page</title>
    <link rel="stylesheet" href="../assets/styles/Bootstrap/css/bootstrap.css">
</head>
<body>
    <div class="container">
        <h2 class="">Login Page</h2>
        <form action="login.php" method="post">
        <div>
            <label for="username">Username</label> <br>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <label for="passwd">Password </label> <br>
            <input type="password" name="passwd" id="passwd">
        </div>
        <br>
        <input type="submit" value="Login">
    </form>
    </div>
</body>
</html>
<?php
session_start();
session_destroy();