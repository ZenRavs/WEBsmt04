<?php
include('dbconnect.php');
session_start();
if (isset($_SESSION['user']['userid'])) {
?>
    <link rel="stylesheet" href="../Assets/styles/Bootstrap/css/bootstrap.css">
    <br>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-header">
                    <?php
                    echo "<h2>Logged As [" . $_SESSION['user']['name'] . "] <a href='destroy.session.php'>Logout</a></h2>";
                    ?>
                </div>
                <div class="card-body">
                    <form action="insert.php" method="post">
                        <div>
                            <input class="form-control form-control-sm" type="text" name="username" required placeholder="Username"> <br>
                        </div>
                        <div>
                            <input class="form-control form-control-sm" type="text" name="nama" required placeholder="Nama Lengkap"> <br>
                        </div>
                        <div>
                            <input class="form-control form-control-sm" type="email" name="email" required placeholder="Email"> <br>
                        </div>
                        <div>
                            <input class="form-control form-control-sm" type="password" name="paswd" required placeholder="Password"> <br>
                        </div>
                        <div class="">
                            <input class="btn btn-primary btn-sm" type="submit" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    $rs = $dbc->query("SELECT * FROM web_users");
    $data = $rs->fetch_all(MYSQLI_ASSOC);
    ?>
    <div class="container">
        <table class="table table-hover">
            <tr>
                <th>No</th>
                <th>User ID</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php
            $i = 1;
            $userid;
            foreach ($data as $value) {
            ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $value['userid'] ?></td>
                    <td><?php echo $value['name'] ?></td>
                    <td><?php echo $value['username'] ?></td>
                    <td><?php echo $value['email'] ?></td>
                    <td><?php echo $value['passwd'] ?></td>
                    <td><?php echo $value['active'] == 1 ? "Active" : "Inactive" ?></td>
                    <td>
                        <a href="edit.form.php?userid=<?php echo $value['userid'] ?>">Edit</a>
                        <a href="delete.php?userid=<?php echo $value['userid'] ?>">Delete</a>
                    </td>
                </tr>
            <?php
                $i++;
            }
            //$_SESSION['datatable'] = ['row' => $row];
            ?>
        </table>
    </div>
    <br>
    <pre>
            <?php
            echo "User Detail: ";
            print_r($_SESSION);
            ?>
        </pre>
<?php
} else {
    echo "Session doesnt start yet! ";
    echo '<a href="index.php">Back</a>';
}
