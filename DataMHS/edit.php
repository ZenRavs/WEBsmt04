<?php
include("dbconnect.php");

$userid = $_POST['userid'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$name = $_POST['name'];
$email = $_POST['email'];

if ($password == "") {
    $query = "UPDATE web_users SET username='$username', email='$email', name='$name' WHERE userid=" . $userid;
} else {
    $passwd = ($password);
    $query = "UPDATE web_users SET username='$username', email='$email', name='$name', passwd='$passwd' WHERE userid=" . $userid;
}

$dbc->query($query);
header('Location: main.php');
