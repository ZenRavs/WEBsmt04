<?php
include("dbconnect.php");

$userid = $_POST['userid'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$name = $_POST['name'];
$email = $_POST['email'];

if ($password == "") {
    $query = "UPDATE web_users SET username='$user', email='$email', nama='$nama' WHERE id=$id";
} else {
    $paswd = ($password);
    $query = "UPDATE web_users SET username='$user', email='$email', nama='$nama', paswd='$paswd' WHERE id=$id";
}

$dbc->query($query);
header('Location: main.php');
