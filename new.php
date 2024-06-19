<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evSXbVzTVFTLwSL1mmQWKG1zWrqtjD0VyrnUd4GwPuRCkjdvwlURyLMnGE8QtQAS" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
            <div class="card-header">Login</div>
            <div class="card-body">
                <?php if (isset($message)) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $message; ?>
                </div>
                <?php endif; ?>
                <form action="" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-OgwmRWzUGE9VNw6aJfwdgnfwE5IKxwylv+zVhgjOgvMM++OMCT5JO4jEvj+3mCT9dz" crossorigin="anonymous"></script>
</body>
</html>