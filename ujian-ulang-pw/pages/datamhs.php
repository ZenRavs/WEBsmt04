<?php
include('dbconnect.php');
$rs = $koneksi->query("select * from mahasiswa");
$data = $rs->fetch_all(MYSQLI_ASSOC);
?>
<section class="section is-title-bar">
  <div class="level">
    <div class="level-left">
      <div class="level-item">
        <ul>
          <li>Admin</li>
          <li>Input Data</li>
        </ul>
      </div>
    </div>
  </div>
</section>
<section class="hero is-hero-bar">
  <div class="hero-body">
    <div class="level">
      <div class="level-left">
        <div class="level-item">
          <h1 class="title">
            Input Data Mahasiswa
          </h1>
        </div>
      </div>
      <div class="level-right" style="display: none;">
        <div class="level-item"></div>
      </div>
    </div>
    <form action="pages/input.php" method="post">
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
</section>
<div></div>
<section class="section is-main-section">
  <div class="card has-table has-mobile-sort-spaced">
    <header class="card-header">
      <p class="card-header-title">
        <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
        Mahasiswa
      </p>
      <a href="#" class="card-header-icon">
        <span class="icon"><i class="mdi mdi-reload"></i></span>
      </a>
    </header>
    <div class="card-content">
      <div class="b-table has-pagination">
        <div class="table-wrapper has-mobile-cards">
          <table class="table is-fullwidth is-striped is-hoverable is-sortable is-fullwidth">
            <!-- dibawah ini adalah tabel   -->
            <thead>
              <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Program Studi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <?php
            $i = 1;
            // dibawah ini adalah looping hasil dari query $data
            foreach ($data as $mhs) {
            ?>
              <tbody>
                <tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $mhs['nim'] ?></td>
                  <td><?php echo $mhs['nama'] ?></td>
                  <td><?php echo $mhs['jenis_kelamin'] ? "Wanita" : "Pria" ?></td>
                  <td><?php echo $mhs['alamat'] ?></td>
                  <td><?php echo $mhs['program_studi'] ?></td>
                  <td class="is-actions-cell">
                    <div class="buttons is-right">
                      <a class="button is-small is-primary" href="index.php?page=edit&id=<?php echo $mhs['id'] ?>">
                        <span class="icon"><i class="mdi mdi-eye"></i></span>
                      </a>

                      <a class="button is-small is-danger jb-modal" href="pages/hapus.php?id=<?php echo $mhs['id'] ?>" data-target="#modal">
                        <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                      </a>
                    </div>
                  </td>
                </tr>
              </tbody>
            <?php
              $i++; //untuk menambah nilai variabel i disetiap looping nya
            } ?>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>