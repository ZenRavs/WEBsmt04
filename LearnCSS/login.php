<?php
    include("dbconnect.php");
    $username = $_POST['username'];
    $password = md5($_POST['passwd']);
    $rs = $dbc->query("SELECT * FROM web_users WHERE username='".$username."'");
    $user = $rs->fetch_assoc();
    if($rs->num_rows == 1)
    {
        $hashpasswd = $user['passwd'];
        echo 'Pass from db: [', $hashpasswd , ']<br>' , 'Pass from post: [', $password, ']'; 
        echo '<pre>', 'RS: ', print_r($user) ,'</pre>';      
        if(hash_equals($password, $hashpasswd))
        {
            session_start();    
            $dbc->query("UPDATE web_users SET active = 1 WHERE userid='".$user['userid']."'");
            $_SESSION['user'] = [
                'userid' => $user['userid'],
                'username' => $user['username'],
                'name' => $user['nama'],    
                'password' => $user['passwd'],
            
            ];
            $_SESSION['verificator'] = [$user['userid'] => $user['passwd']];
            echo "Login success! ";
            echo '<pre>', 'Session: ', print_r($_SESSION) ,'</pre>';
            echo '<a href="main-page.php">Continue..</a>';
        }
        else
        {
            echo "Login Failed! ";
            echo '<a href="index.php">Continue..</a>';
        }      
             
        //header('location: index.php');
        //header('location: index.php');
    }
    else
    {
        echo "Username or password doesn't match any row! ";
        echo '<a href="index.php">Continue..</a>';
    }