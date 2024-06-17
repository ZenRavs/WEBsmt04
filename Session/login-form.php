<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../assets/bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/css/bootstrap.css">
</head>
<body>
    <div class="container mt-5">
        <div class="card mx-auto" style="max-width: 500px;">
            <div class="card-header">
                Login Page
            </div>
            <div class="card-body">
                <?php
                    // Display any error message from login.php (optional)
                    if (isset($_SESSION['error_message'])) 
                    {
                        echo '<div class="alert alert-danger">'.$_SESSION['error_message'].'</div>';
                        unset($_SESSION['error_message']);
                    }
                ?>
                <form action="login-logic.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
