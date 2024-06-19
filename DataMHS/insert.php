<?php
include("dbconnect.php");
session_start();
$user = $_POST['username'];
$paswd = md5($_POST['paswd']);
$email = $_POST['email'];
$name = $_POST['nama'];
if (isset($_SESSION)) {
    $insert = $dbc->query("INSERT INTO web_users (username, nama, email, passwd, active)
                                VALUES ('" . $user . "','" . $name . "','" . $email . "','" . $paswd . "', 0)");
    if ($insert) {
        header('location: main.php');
    } else {
        echo 'Insert failed! <a href="main.php">Back</a>;';
    }
} else {
    echo 'Session doesnt start yet! <a href="main.php">Back</a>';
}
