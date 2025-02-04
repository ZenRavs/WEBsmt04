<?php
$server = '127.0.0.1'; //localhost:3306 
$username = 'root';
$password = '';
$namadb = 'db_mahasiswa';
//untuk membuat koneksi, menggunakan variabel diatas
$koneksi = new mysqli($server, $username, $password, $namadb);
//untuk mengecek koneksi
if ($koneksi->connect_errno) {
     echo "failed ", $koneksi->connect_error;
     exit();
} else {
}
