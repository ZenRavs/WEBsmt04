<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MHS Login Page</title>
    <link rel="stylesheet" href="../Assets/styles/Bootstrap/css/bootstrap.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-header">
                        <h2>Login Page</h2>
                    </div>
                    <div class="card-body">
                        <form action="login.php" method="post">
                            <div>
                                <label for="username">Username</label> <br>
                                <input class="form-control" type="text" name="username" id="username">
                            </div>
                            <div>
                                <label for="passwd">Password </label> <br>
                                <input class="form-control" type="password" name="passwd" id="passwd">
                            </div>
                            <br>
                            <input class="btn btn-primary" type="submit" value="Login">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php
session_start();
session_destroy();
