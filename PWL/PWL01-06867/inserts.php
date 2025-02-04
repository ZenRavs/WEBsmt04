<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_mahasiswa";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$uploadOk = 1;
$folderupload = "IMG/";
$fileupload = $folderupload . basename($_FILES['foto']['name']);
$filefoto = basename($_FILES['foto']['name']);
print_r($_FILES['foto']);
$jenisfilefoto = strtolower(pathinfo($fileupload, PATHINFO_EXTENSION));
if (file_exists($fileupload)) {
    echo "Maaf, file foto sudah ada<br>";
    $uploadOk = 0;
}
if ($_FILES["foto"]["size"] > 1000000) {
    echo "Maaf, ukuran file foto harus kurang dari 1 MB<br>";
    $uploadOk = 0;
}

if ($jenisfilefoto != "jpg" && $jenisfilefoto != "png" && $jenisfilefoto != "jpeg" && $jenisfilefoto != "gif") {
    echo "Maaf, hanya file JPG, JPEG, PNG & GIF yang diperbolehkan<br>";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "Maaf, file tidak dapat terupload<br>";
} else {
    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $fileupload)) {
        $query = "insert tb_mhs (nama, jurusan, photo) values('$nama','$jurusan','$filefoto')";
        mysqli_query($conn, $query);
        header("Location: index.php");
    } else {
        echo "Data gagal tersimpan";
    }
}
