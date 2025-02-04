<?php
include('dbconnect.php'); //untuk menyertakan file dbconnect.php
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jenis_kel = $_POST['jenis_kel'];
$alamat = $_POST['alamat'];
$prodi = $_POST['prodi'];

$query = ("INSERT INTO mahasiswa (nim, nama, jenis_kelamin, alamat, program_studi) VALUES ('" . $nim
    . "','" . $nama . "','" . $jns_kelamin . "','" . $alamat . "','" . $prodi . "')"); // perintah sql untuk menyimpan data

$insert = $koneksi->query($query);
//dibawah ini if untuk validasi
if ($insert) {
    header("location: ../index.php");
} else {
    echo "Error!";
}
