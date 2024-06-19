<?php
include("dbconnect.php");
session_start();
if (isset($_SESSION['user'])) {
    $userid = $_GET['userid'];
    $rs = $dbc->query("SELECT * FROM web_users WHERE userid=" . $userid);
    if ($rs->num_rows == 1) {
        $edit_user = $rs->fetch_assoc();
        if ($edit_user['active'] == 0) {
            echo "<h2>Edit '" . $userid . "' </h2>";
?>
            <form action="edit.php" method="post">
                <input type="hidden" name="userid" value="<?php echo $edit_user['userid'] ?>">
                <div>
                    <input type="text" name="username" required placeholder="Username" value="<?php echo $edit_user['username'] ?>"> <br> <br>
                </div>
                <div>
                    <input type="text" name="name" required placeholder="Your name" value="<?php echo $edit_user['name'] ?>"> <br> <br>
                </div>
                <div>
                    <input type="email" name="email" required placeholder="Email" value="<?php echo $edit_user['email'] ?>"> <br> <br>
                </div>
                <div>
                    <input type="password" name="password" placeholder="Password" value=""> <br> <br>
                </div>
                <button type="button" class="btn btn-primary"><a href="main.php">Cancel</a></button>
                <input type="submit" value="Save">
            </form>
<?php
        } else {
            echo "User'" . $userid . "' is active! " . '<a href="main.php">Back</a>';
        }
    } else {
        echo "Userid '" . $userid . "' doesn't match any row!" . '<a href="main.php">Back</a>"';
    }
} else {
    echo 'Session doesnt start yet! <a href="main.php">Back</a>';
}
?>