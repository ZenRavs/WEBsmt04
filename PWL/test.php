<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            overflow: hidden;
        }

        #sidebar {
            width: 250px;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            overflow-y: auto;
        }

        #main-content {
            margin-left: 250px;
            height: 100%;
            overflow-y: auto;
        }
    </style>
</head>

<body>
    <div id="sidebar" class="bg-dark text-white p-3">
        <h2>Sidebar</h2>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Contact</a>
            </li>
        </ul>
    </div>
    <div id="main-content" class="p-3">
        <h1>Dashboard</h1>
        <p>Welcome to your dashboard!</p>
        <p>Here is some more content to make the main area scrollable.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur nec odio nec urna convallis convallis.</p>
        <br>
        <?= include 'PWL-AjaxCRUD+Pagination-06867/data/dataTable.php' ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>