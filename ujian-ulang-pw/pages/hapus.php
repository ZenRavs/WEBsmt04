<?php
include("dbconnect.php");
$id = $_GET['id'];
//dibawah ini adalah query\perintah sql menghapus
$query = ("delete from mahasiswa where id=" . $id);
$hapus = $koneksi->query($query);
if ($hapus) {
    header("location: ../index.php");
} else {
    echo "Ada error saat menghapus";
}
