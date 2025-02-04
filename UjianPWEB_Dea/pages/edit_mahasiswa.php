<?php
$id = $_GET['id'];
?>
<section class="section is-title-bar">
    <div class="level">
        <div class="level-left">
            <div class="level-item">
                <ul>
                    <li>...</li>
                    <li>Edit Data</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<div class="hero-body">
    <h1 class="title">
        Edit Data
    </h1>
    <form action="pages/edit.php" method="post">
        <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
        <div>
            NIM <br>
            <input type="text" name="nim" id="nim" placeholder="NIM" required>
        </div>
        <div>
            Nama <br>
            <input type="text" name="nama" id="nama" placeholder="Nama" required>
        </div>
        <div>
            Gender <br>
            <select id="jenis_kel" name="jenis_kel">
                <option value="0">Pria</option>
                <option value="1">Wanita</option>
            </select>
        </div>
        <div>
            Alamat <br>
            <input type="text" name="alamat" id="alamat" placeholder="Alamat" required>
        </div>
        <div>
            Program Studi <br>
            <input type="text" name="prodi" id="prodi" placeholder="Program Studi" required>
        </div>
        <br>
        <div>
            <input type="submit" class="button" value="Submit">
        </div>
    </form>
</div>