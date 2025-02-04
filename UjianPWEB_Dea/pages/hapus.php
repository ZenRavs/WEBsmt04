<?php
include("dbconnect.php");
$id = $_GET['id'];
$query = ("DELETE FROM mahasiswa WHERE id=" . $id);
$hapus = $koneksi->query($query);
if ($hapus) {
    header("location: ../index.php");
} else {
    echo "Ada error saat menghapus";
}
