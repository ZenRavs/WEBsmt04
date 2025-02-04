<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <div class="container" style="width: 30%;">
        <div class="justify-content-center mt-4">
            <div class="mt-4">
                <?php
                include 'data/scripts/dbconn.php';
                session_start();
                if (isset($_SESSION['error'])) {
                ?>
                    <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                        Error! <?php echo $_SESSION['error']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php unset($_SESSION['error']);
                } else {
                    session_destroy();
                }
                ?>
            </div>
            <div class="card shadow">
                <div class="card-header">
                    <h2>Login Page</h2>
                </div>
                <div class="card-body">
                    <form action="data/scripts/requestbase.php?req=userlogn" method="POST">
                        <div>
                            <label for="userid">ID</label> <br>
                            <input class="form-control" type="text" name="userid" id="userid" placeholder="Enter NIP or NIM" required>
                        </div>
                        <div>
                            <label for="password">Password</label> <br>
                            <input class="form-control" type="password" name="password" id="password" required>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <input class="btn btn-primary" style="width: 150px;" type="submit" value="Login">
                        </div>
                    </form>
                    <div class="alert alert-info alert-dismissible fade show mt-3" role="alert">
                        <div>Username: 0000.0001</div>
                        <div>Password: localadmin001</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>