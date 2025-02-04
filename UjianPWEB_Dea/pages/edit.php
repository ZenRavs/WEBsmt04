<?php
include("dbconnect.php");
$id = $_POST['id'];
$nama = $_POST['nama'];
$jenis_kel = $_POST['jenis_kel'];
$alamat = $_POST['alamat'];
$prodi = $_POST['prodi'];
$query = ("UPDATE mahasiswa SET nama='" . $nama . "', jenis_kelamin='"
    . $jns_kelamin . "', alamat='" . $alamat . "', program_studi='"
    . $prodi . "' WHERE id='" . $id . "'"); // perintah edit data
$edit = $koneksi->query($query);
if ($edit) {
    header("location: ../index.php");
} else {
    echo 'Error!';
}
