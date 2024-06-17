<?php
    include("dbconnect.php");
    session_start();
    if(isset($_SESSION['user']['userid']))
    {
        $userid = $_GET['i'];
        $rs = $dbc->query("SELECT * FROM web_users WHERE userid=".$userid);
        $confirm = $rs->fetch_assoc();
        if($confirm['active'] != 1 && $confirm['username'] != 'superuser')
        {
            $delete = $dbc->query("DELETE FROM web_users WHERE userid=".$userid);
            if ($delete) {
                header("Location: main.php");
            }
            else {
                echo 'Delete Failed!';
            }
        }
        else
        {
            echo 'User "'.$userid.'" undeletable! <a href="main.php">Back</a>';
            
        }
    }
    else
    {
        echo 'Session doesnt start yet!';
    }
    