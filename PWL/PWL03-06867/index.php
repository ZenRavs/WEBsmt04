<?php
// Database configuration
$host = 'localhost'; // Database host
$username = 'root'; // Database username
$password = ''; // Database password
$dbname = 'db_generals'; // Database name

// Create a connection to the database
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Fetch all records from the books table
$sql = "SELECT * FROM bookfair";
$result = $conn->query($sql);
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Fair Registration</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color: black;">
    <?php if (isset($_SESSION['registered'])):
    ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo "User '" . htmlspecialchars($_SESSION['registered']) . "' has been successfully registered!";
            ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php unset($_SESSION['registered']); // Clear the message after displaying it 
        ?>
    <?php endif;
    ?>
    <div class="container m-5">
        <h2>Book Fair Registration</h2>
        <form action="insert.php" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="profession">Profession</label>
                <select class="form-control" id="profession" name="profession" required>
                    <option value="">Select Profession</option>
                    <option value="Mahasiswa">Mahasiswa</option>
                    <option value="PNS">PNS</option>
                    <option value="Swasta">Swasta</option>
                    <option value="Siswa">Siswa</option>
                    <option value="Others">Others</option>
                </select>
            </div>
            <div class="form-group">
                <label for="info_source">Information Source</label>
                <select class="form-control" id="info_source" name="info_source" required>
                    <option value="">Select Source</option>
                    <option value="Instagram">Instagram</option>
                    <option value="Twitter X">Twitter X</option>
                    <option value="Facebook">Facebook</option>
                    <option value="Others">Others</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Join Now</button>
        </form>
    </div>

    <div class="container mt-5">
        <h2 class="text-center">Books List</h2>

        <table class="table table-bordered table-striped">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Profession</th>
                    <th scope="col">Information From</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Check if there are results and display them
                $i = 1;
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>{$i}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['address']}</td>
                            <td>{$row['profession']}</td>
                            <td>{$row['info_source']}</td>
                          </tr>";
                        $i++;
                    }
                } else {
                    echo "<tr><td colspan='4' class='text-center'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>