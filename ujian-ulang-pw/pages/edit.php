<?php
include("dbconnect.php");
$id = $_POST['id'];
$nama = $_POST['nama'];
$jns_kelamin = $_POST['jns_kelamin'];
$alamat = $_POST['alamat'];
$prodi = $_POST['prodi'];
$query = ("update mahasiswa set nama='" . $nama . "', jenis_kelamin='" . $jns_kelamin . "', alamat='" . $alamat . "', program_studi='" . $prodi . "' where id='" . $id . "'");
$edit = $koneksi->query($query);
if ($edit) {
    header("location: ../index.php");
} else {
    echo 'Ada error saat edit data!';
}
