<?php
include('dbconnect.php');
session_start();
if (isset($_SESSION['user']['userid'])) {

    echo "<h2>Logged As [" . $_SESSION['user']['name'] . "] <a href='destroy.session.php'>Logout</a></h2>";
?>
    <form action="insert.php" method="post">
        <input type="text" name="username" required placeholder="Username"> <br> <br>
        <input type="text" name="nama" required placeholder="Nama Lengkap"> <br> <br>
        <input type="email" name="email" required placeholder="Email"> <br> <br>
        <input type="password" name="paswd" required placeholder="Password"> <br> <br>
        <input type="submit" value="Simpan">
    </form>
    <?php
    $rs = $dbc->query("SELECT * FROM web_users");
    $data = $rs->fetch_all(MYSQLI_ASSOC);
    ?>
    <table border="2">
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
            <pre>
                <?php
                //print_r($_SESSION['datatable'] = ['row' => $value['userid']]);
                ?>
            </pre>
            <?php

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
                    or
                    <a href="delete.php?userid=<?php echo $value['userid'] ?>">Delete</a>
                </td>
            </tr>
        <?php
            $i++;
        }
        //$_SESSION['datatable'] = ['row' => $row];
        ?>
    </table>
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
