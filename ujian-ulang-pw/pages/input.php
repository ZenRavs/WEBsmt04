<?php
include('dbconnect.php'); //untuk menyertakan file dbconnect.php
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jns_kelamin = $_POST['jns_kelamin'];
$alamat = $_POST['alamat'];
$prodi = $_POST['prodi'];
//dibawah ini adalah query\perintah sql insert
$query = ("insert into mahasiswa (nim, nama, jenis_kelamin, alamat, program_studi) values ('" . $nim . "','" . $nama . "','" . $jns_kelamin . "','" . $alamat . "','" . $prodi . "')");
$insert = $koneksi->query($query);
//dibawah ini if untuk validasi
if ($insert) {
    header("location: ../index.php");
} else {
    echo "Input gagal!";
}
