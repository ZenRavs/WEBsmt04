<?php
$id = $_GET['id'];
?>
<div class="hero-body">
    <h1 class="title">
        Edit Form
    </h1>
    <form action="pages/edit.php" method="post">
        <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
        <div>
            <input type="text" name="nim" id="nim" placeholder="NIM" required>
        </div>
        <br>
        <div>
            <input type="text" name="nama" id="nama" placeholder="Nama" required>
        </div>
        <br>
        <div>
            <select id="jns_kelamin" name="jns_kelamin">
                <option value="0">Pria</option>
                <option value="1">Wanita</option>
            </select>
        </div>
        <br>
        <div>
            <input type="text" name="alamat" id="alamat" placeholder="Alamat" required>
        </div>
        <br>
        <div>
            <input type="text" name="prodi" id="prodi" placeholder="Program Studi" required>
        </div>
        <br>
        <div>
            <input type="submit" class="button" value="Submit">
        </div>
    </form>
</div>