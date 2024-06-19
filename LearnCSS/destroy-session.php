<?php
include('dbconnect.php');
session_start();
$rs = $dbc->query("UPDATE web_users SET active = 0 WHERE userid='".$_SESSION['user']['userid']."'");
session_destroy();
header("Location: index.php");
?>