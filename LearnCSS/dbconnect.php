<?php
    $server = '127.0.0.1'; //localhost:3306
    $username = 'root';
    $password = '';
    $namadb = 'db_mahasiswa';

   $dbc = new mysqli($server, $username, $password, $namadb);
   if($dbc->connect_errno)
   {
        echo "failed ", $dbc->connect_error;
        exit();
   }