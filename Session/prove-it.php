<?php

$username = 'admin';
$users = [
    "admin" => "125",
    "admin2" => "1256",
    "admin3" => "1257",
    ];
$user2 = ['username','passwd','email'];

$users2['username'] = ['admin1'];
$users2['passwd'] = ['adminPass'];
$users2['email'] = ['admin@email'];

?>
<pre>
    <?php
        print_r($users);
        echo "<br>";
        print_r($user2);
    ?>
</pre>
    