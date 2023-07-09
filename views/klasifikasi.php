<?php require_once("../controller/script.php");
require_once("redirect.php");
$_SESSION["page-name"] = "Klasifikasi";
$_SESSION["page-url"] = "klasifikasi";
?>

<!DOCTYPE html>
<html lang="en">

<head><?php require_once("../resources/dash-header.php") ?></head>

<body>
  <?php if (isset($_SESSION["message-success"])) { ?>
    <div class="message-success" data-message-success="<?= $_SESSION["message-success"] ?>"></div>
  <?php }
  if (isset($_SESSION["message-info"])) { ?>
    <div class="message-info" data-message-info="<?= $_SESSION["message-info"] ?>"></div>
  <?php }
  if (isset($_SESSION["message-warning"])) { ?>
    <div class="message-warning" data-message-warning="<?= $_SESSION["message-warning"] ?>"></div>
  <?php }
  if (isset($_SESSION["message-danger"])) { ?>
    <div class="message-danger" data-message-danger="<?= $_SESSION["message-danger"] ?>"></div>
  <?php } ?>
  <div class="container-scroller">
    <?php require_once("../resources/dash-topbar.php") ?>
    <div class="container-fluid page-body-wrapper">
      <?php require_once("../resources/dash-sidebar.php") ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <h3>Klasifikasi</h3>
                    </li>
                  </ul>
                  <div>
                    <div class="btn-wrapper">
                      <!-- <a href="report" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a> -->
                    </div>
                  </div>
                </div>
                <div class="data-main mt-3">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="card border-0 rounded-0 shadow">
                        <div class="card-body">
                          <nav class="sidebar sidebar-offcanvas bg-transparent" id="sidebar">
                            <ul class="nav">
                              <li class="nav-item">
                                <a class="nav-link" style="cursor: pointer;" onclick="window.location.href='klasifikasi'" data-bs-toggle="tooltip" data-bs-placement="right" title="Masukan data nasabah yang ingin diuji.">
                                  <i class="mdi mdi-subdirectory-arrow-right menu-icon text-dark"></i>
                                  <span class="menu-title text-dark">Seleksi</span>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" style="cursor: pointer;" onclick="window.location.href='klasifikasi?to=data-training'" data-bs-toggle="tooltip" data-bs-placement="right" title="Kumpulan data yang berisi sampel-sampel yang telah diklasifikasikan sebelumnya.">
                                  <i class="mdi mdi-subdirectory-arrow-right menu-icon text-dark"></i>
                                  <span class="menu-title text-dark">Data Training</span>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" style="cursor: pointer;" onclick="window.location.href='klasifikasi?to=preprocessing-data'" data-bs-toggle="tooltip" data-bs-placement="right" title="Melakukan pra-pemrosesan data, seperti membersihkan data dari karakter-karakter yang tidak penting, menghapus duplikat, mengubah teks menjadi representasi numerik, dan melakukan normalisasi data jika diperlukan.">
                                  <i class="mdi mdi-subdirectory-arrow-right menu-icon text-dark"></i>
                                  <span class="menu-title text-dark">Preprocessing Data</span>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" style="cursor: pointer;" onclick="window.location.href='klasifikasi?to=probabilitas-kelas'" data-bs-toggle="tooltip" data-bs-placement="right" title="Menghitung probabilitas kelas berdasarkan frekuensi relatif kelas dalam data pelatihan.">
                                  <i class="mdi mdi-subdirectory-arrow-right menu-icon text-dark"></i>
                                  <span class="menu-title text-dark">Probabilitas Kelas</span>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" style="cursor: pointer;" onclick="window.location.href='klasifikasi?to=prediksi'" data-bs-toggle="tooltip" data-bs-placement="right" title="Memprediksi kelas yang paling mungkin untuk setiap sampel. Kelas dengan probabilitas gabungan tertinggi akan menjadi prediksi kelasnya.">
                                  <i class="mdi mdi-subdirectory-arrow-right menu-icon text-dark"></i>
                                  <span class="menu-title text-dark">Prediksi</span>
                                </a>
                              </li>
                              <li class="nav-item">
                                <form action="" method="post">
                                  <button type="submit" name="reset-hitung" class="nav-link border-0 bg-transparent" data-bs-toggle="tooltip" data-bs-placement="right" title="Melakuakn pembersihan sesi yang sudah dilakukan.">
                                    <i class="mdi mdi-refresh menu-icon text-dark"></i>
                                    <span class="menu-title text-dark">Reset</span>
                                  </button>
                                </form>
                              </li>
                            </ul>
                          </nav>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-9">
                      <div class="card border-0 rounded-0 shadow">
                        <div class="card-body">
                          <?php if (!isset($_GET['to'])) { ?>
                            <div class="row mt-3">
                              <div class="col-lg-6 m-auto">
                                <h4 class="text-center">Masukan Data Uji</h4>
                                <form action="" method="post" class="mt-5">
                                  <div class="mb-3">
                                    <label for="nim" class="form-label">NIM <small class="text-danger">*</small></label>
                                    <input type="number" name="nim" class="form-control text-center" id="nim" min="8" placeholder="NIM" required>
                                  </div>
                                  <div class="mb-3">
                                    <label for="nama" class="form-label">Nama <small class="text-danger">*</small></label>
                                    <input type="text" name="nama" class="form-control text-center" id="nama" minlength="3" placeholder="Nama" required>
                                  </div>
                                  <div class="mb-3">
                                    <label for="judul" class="form-label">Judul <small class="text-danger">*</small></label>
                                    <input type="text" name="judul" class="form-control text-center" id="judul" placeholder="Judul" required>
                                  </div>
                                  <div class="mb-3">
                                    <label for="abstrak" class="form-label">Abstrak <small class="text-danger">*</small></label>
                                    <textarea name="abstrak" class="form-control" id="exampleFormControlTextarea1" placeholder="Abstrak" style="height: 100px;" rows="3" required></textarea>
                                  </div>
                                  <div class="mb-3 text-center">
                                    <label for="kategori" class="form-label">Kategori</label>
                                    <select name="kategori" class="form-select" aria-label="Default select example" required>
                                      <option selected value="">Pilih Kategori</option>
                                      <option value="Sistem Informasi">Sistem Informasi</option>
                                      <option value="Analisis Data">Analisis Data</option>
                                      <option value="Pengolahan Citra">Pengolahan Citra</option>
                                      <option value="Aplikasi Mobile">Aplikasi Mobile</option>
                                      <option value="Keamanan Informasi">Keamanan Informasi</option>
                                      <option value="Optimasi">Optimasi</option>
                                      <option value="Sistem Pendukung Keputusan">Sistem Pendukung Keputusan</option>
                                      <option value="Sistem Pakar">Sistem Pakar</option>
                                      <option value="Data Mining">Data Mining</option>
                                      <option value="Multimedia">Multimedia</option>
                                    </select>
                                  </div>
                                  <div class="mb-3 text-center">
                                    <label for="jenis_perangkat" class="form-label">Jenis Perangkat</label>
                                    <select name="jenis_perangkat" class="form-select" aria-label="Default select example" required>
                                      <option selected value="">Pilih Jenis Perangkat</option>
                                      <option value="Software">Software</option>
                                      <option value="Hardware">Hardware</option>
                                    </select>
                                  </div>
                                  <div class="mb-3 text-center">
                                    <label for="bahasa_pemrograman" class="form-label">Bahasa Pemrograman</label>
                                    <select name="bahasa_pemrograman" class="form-select" aria-label="Default select example" required>
                                      <option selected value="">Pilih Bahasa Pemrograman</option>
                                      <option value="Java">Java</option>
                                      <option value="Python">Python</option>
                                      <option value="PHP">PHP</option>
                                      <option value="Solidity">Solidity</option>
                                      <option value="Matlab">Matlab</option>
                                      <option value="Orange">Orange</option>
                                    </select>
                                  </div>
                                  <div class="mb-3">
                                    <label for="pembimbing_satu" class="form-label">Pembimbing 1 <small class="text-danger">*</small></label>
                                    <select name="pembimbing_satu" class="form-select" aria-label="Default select example" required>
                                      <option selected value="">Pilih Pembimbing 1</option>
                                      <option value="(0828126601) Donatus Joseph Manehat, S.Si, M.Kom">(0828126601) Donatus Joseph Manehat, S.Si, M.Kom</option>
                                      <option value="(0824047701) Emiliana Metan Meolbatak, ST, MT">(0824047701) Emiliana Metan Meolbatak, ST, MT</option>
                                      <option value="(0825126701) Emanuel Jando, S.Kom, MT">(0825126701) Emanuel Jando, S.Kom, MT</option>
                                      <option value="(0829087901) Paulina Aliandu, ST, M.Cs.">(0829087901) Paulina Aliandu, ST, M.Cs.</option>
                                      <option value="(0815037801) Patrisius Batarius, ST, MT.">(0815037801) Patrisius Batarius, ST, MT.</option>
                                      <option value="(0723057201) Dr. Adri Gabriel Sooai, ST,MT">(0723057201) Dr. Adri Gabriel Sooai, ST,MT</option>
                                      <option value="(0801118302) Frengky Tedy, ST, MT.">(0801118302) Frengky Tedy, ST, MT.</option>
                                      <option value="(0807098502) Sisilia Daeng Bakka Mau, S.Kom, MT">(0807098502) Sisilia Daeng Bakka Mau, S.Kom, MT</option>
                                      <option value="(0831038602) Paskalis Andrianus Nani, ST,MT">(0831038602) Paskalis Andrianus Nani, ST,MT</option>
                                      <option value="(0802038601) Emerensiana Ngaga, ST,MT">(0802038601) Emerensiana Ngaga, ST,MT</option>
                                      <option value="(0828128502) Natalia Magdalena R. Mamulak, ST.,MM">(0828128502) Natalia Magdalena R. Mamulak, ST.,MM</option>
                                      <option value="(0823078702) Yulianti Paula Bria ST., MT">(0823078702) Yulianti Paula Bria ST., MT</option>
                                      <option value="(0804126301) P. David Amfotis, SVD, B.Th., MA">(0804126301) P. David Amfotis, SVD, B.Th., MA</option>
                                      <option value="(0805058803) Yovinia Carmeneja Hoar Siki, ST., MT">(0805058803) Yovinia Carmeneja Hoar Siki, ST., MT</option>
                                      <option value="(0818098102) Ignatius P. A. N. Samane, S Si., M Eng">(0818098102) Ignatius P. A. N. Samane, S Si., M Eng</option>
                                      <option value="(0807078704) Alfry A. J.Sinlae, S.Kom., M.Cs.">(0807078704) Alfry A. J.Sinlae, S.Kom., M.Cs.</option>
                                    </select>
                                  </div>
                                  <div class="mb-3">
                                    <label for="pembimbing_dua" class="form-label">Pembimbing 2 <small class="text-danger">*</small></label>
                                    <select name="pembimbing_dua" class="form-select" aria-label="Default select example" required>
                                      <option selected value="">Pilih Pembimbing 2</option>
                                      <option value="(0828126601) Donatus Joseph Manehat, S.Si, M.Kom">(0828126601) Donatus Joseph Manehat, S.Si, M.Kom</option>
                                      <option value="(0824047701) Emiliana Metan Meolbatak, ST, MT">(0824047701) Emiliana Metan Meolbatak, ST, MT</option>
                                      <option value="(0825126701) Emanuel Jando, S.Kom, MT">(0825126701) Emanuel Jando, S.Kom, MT</option>
                                      <option value="(0829087901) Paulina Aliandu, ST, M.Cs.">(0829087901) Paulina Aliandu, ST, M.Cs.</option>
                                      <option value="(0815037801) Patrisius Batarius, ST, MT.">(0815037801) Patrisius Batarius, ST, MT.</option>
                                      <option value="(0723057201) Dr. Adri Gabriel Sooai, ST,MT">(0723057201) Dr. Adri Gabriel Sooai, ST,MT</option>
                                      <option value="(0801118302) Frengky Tedy, ST, MT.">(0801118302) Frengky Tedy, ST, MT.</option>
                                      <option value="(0807098502) Sisilia Daeng Bakka Mau, S.Kom, MT">(0807098502) Sisilia Daeng Bakka Mau, S.Kom, MT</option>
                                      <option value="(0831038602) Paskalis Andrianus Nani, ST,MT">(0831038602) Paskalis Andrianus Nani, ST,MT</option>
                                      <option value="(0802038601) Emerensiana Ngaga, ST,MT">(0802038601) Emerensiana Ngaga, ST,MT</option>
                                      <option value="(0828128502) Natalia Magdalena R. Mamulak, ST.,MM">(0828128502) Natalia Magdalena R. Mamulak, ST.,MM</option>
                                      <option value="(0823078702) Yulianti Paula Bria ST., MT">(0823078702) Yulianti Paula Bria ST., MT</option>
                                      <option value="(0804126301) P. David Amfotis, SVD, B.Th., MA">(0804126301) P. David Amfotis, SVD, B.Th., MA</option>
                                      <option value="(0805058803) Yovinia Carmeneja Hoar Siki, ST., MT">(0805058803) Yovinia Carmeneja Hoar Siki, ST., MT</option>
                                      <option value="(0818098102) Ignatius P. A. N. Samane, S Si., M Eng">(0818098102) Ignatius P. A. N. Samane, S Si., M Eng</option>
                                      <option value="(0807078704) Alfry A. J.Sinlae, S.Kom., M.Cs.">(0807078704) Alfry A. J.Sinlae, S.Kom., M.Cs.</option>
                                    </select>
                                  </div>
                                  <div class="mb-3">
                                    <label for="penguji_satu" class="form-label">Penguji 1 <small class="text-danger">*</small></label>
                                    <select name="penguji_satu" class="form-select" aria-label="Default select example" required>
                                      <option selected value="">Pilih Penguji 1</option>
                                      <option value="(0828126601) Donatus Joseph Manehat, S.Si, M.Kom">(0828126601) Donatus Joseph Manehat, S.Si, M.Kom</option>
                                      <option value="(0824047701) Emiliana Metan Meolbatak, ST, MT">(0824047701) Emiliana Metan Meolbatak, ST, MT</option>
                                      <option value="(0825126701) Emanuel Jando, S.Kom, MT">(0825126701) Emanuel Jando, S.Kom, MT</option>
                                      <option value="(0829087901) Paulina Aliandu, ST, M.Cs.">(0829087901) Paulina Aliandu, ST, M.Cs.</option>
                                      <option value="(0815037801) Patrisius Batarius, ST, MT.">(0815037801) Patrisius Batarius, ST, MT.</option>
                                      <option value="(0723057201) Dr. Adri Gabriel Sooai, ST,MT">(0723057201) Dr. Adri Gabriel Sooai, ST,MT</option>
                                      <option value="(0801118302) Frengky Tedy, ST, MT.">(0801118302) Frengky Tedy, ST, MT.</option>
                                      <option value="(0807098502) Sisilia Daeng Bakka Mau, S.Kom, MT">(0807098502) Sisilia Daeng Bakka Mau, S.Kom, MT</option>
                                      <option value="(0831038602) Paskalis Andrianus Nani, ST,MT">(0831038602) Paskalis Andrianus Nani, ST,MT</option>
                                      <option value="(0802038601) Emerensiana Ngaga, ST,MT">(0802038601) Emerensiana Ngaga, ST,MT</option>
                                      <option value="(0828128502) Natalia Magdalena R. Mamulak, ST.,MM">(0828128502) Natalia Magdalena R. Mamulak, ST.,MM</option>
                                      <option value="(0823078702) Yulianti Paula Bria ST., MT">(0823078702) Yulianti Paula Bria ST., MT</option>
                                      <option value="(0804126301) P. David Amfotis, SVD, B.Th., MA">(0804126301) P. David Amfotis, SVD, B.Th., MA</option>
                                      <option value="(0805058803) Yovinia Carmeneja Hoar Siki, ST., MT">(0805058803) Yovinia Carmeneja Hoar Siki, ST., MT</option>
                                      <option value="(0818098102) Ignatius P. A. N. Samane, S Si., M Eng">(0818098102) Ignatius P. A. N. Samane, S Si., M Eng</option>
                                      <option value="(0807078704) Alfry A. J.Sinlae, S.Kom., M.Cs.">(0807078704) Alfry A. J.Sinlae, S.Kom., M.Cs.</option>
                                    </select>
                                  </div>
                                  <div class="mb-3">
                                    <label for="penguji_dua" class="form-label">Penguji 2 <small class="text-danger">*</small></label>
                                    <select name="penguji_dua" class="form-select" aria-label="Default select example" required>
                                      <option selected value="">Pilih Penguji 2</option>
                                      <option value="(0828126601) Donatus Joseph Manehat, S.Si, M.Kom">(0828126601) Donatus Joseph Manehat, S.Si, M.Kom</option>
                                      <option value="(0824047701) Emiliana Metan Meolbatak, ST, MT">(0824047701) Emiliana Metan Meolbatak, ST, MT</option>
                                      <option value="(0825126701) Emanuel Jando, S.Kom, MT">(0825126701) Emanuel Jando, S.Kom, MT</option>
                                      <option value="(0829087901) Paulina Aliandu, ST, M.Cs.">(0829087901) Paulina Aliandu, ST, M.Cs.</option>
                                      <option value="(0815037801) Patrisius Batarius, ST, MT.">(0815037801) Patrisius Batarius, ST, MT.</option>
                                      <option value="(0723057201) Dr. Adri Gabriel Sooai, ST,MT">(0723057201) Dr. Adri Gabriel Sooai, ST,MT</option>
                                      <option value="(0801118302) Frengky Tedy, ST, MT.">(0801118302) Frengky Tedy, ST, MT.</option>
                                      <option value="(0807098502) Sisilia Daeng Bakka Mau, S.Kom, MT">(0807098502) Sisilia Daeng Bakka Mau, S.Kom, MT</option>
                                      <option value="(0831038602) Paskalis Andrianus Nani, ST,MT">(0831038602) Paskalis Andrianus Nani, ST,MT</option>
                                      <option value="(0802038601) Emerensiana Ngaga, ST,MT">(0802038601) Emerensiana Ngaga, ST,MT</option>
                                      <option value="(0828128502) Natalia Magdalena R. Mamulak, ST.,MM">(0828128502) Natalia Magdalena R. Mamulak, ST.,MM</option>
                                      <option value="(0823078702) Yulianti Paula Bria ST., MT">(0823078702) Yulianti Paula Bria ST., MT</option>
                                      <option value="(0804126301) P. David Amfotis, SVD, B.Th., MA">(0804126301) P. David Amfotis, SVD, B.Th., MA</option>
                                      <option value="(0805058803) Yovinia Carmeneja Hoar Siki, ST., MT">(0805058803) Yovinia Carmeneja Hoar Siki, ST., MT</option>
                                      <option value="(0818098102) Ignatius P. A. N. Samane, S Si., M Eng">(0818098102) Ignatius P. A. N. Samane, S Si., M Eng</option>
                                      <option value="(0807078704) Alfry A. J.Sinlae, S.Kom., M.Cs.">(0807078704) Alfry A. J.Sinlae, S.Kom., M.Cs.</option>
                                    </select>
                                  </div>
                                  <div class="mb-3">
                                    <label for="tahun" class="form-label">Tahun Lulus <small class="text-danger">*</small></label>
                                    <input type="number" name="tahun" min="2001" max="2035" step="1" value="<?= date('Y') ?>" class="form-control text-center" id="tahun" placeholder="Tahun Lulus" required>
                                  </div>
                                  <div class="mb-3 text-center">
                                    <button type="submit" name="data-uji" class="btn btn-primary text-white me-0 rounded-0 mt-3">Submit</button>
                                  </div>
                                </form>
                              </div>
                              <div class="col-lg-6">
                                <img src="../assets/images/banner.png" style="width: 100%;" alt="Gambar tidak ditemukan!">
                              </div>
                            </div>
                            <?php } else if (isset($_GET['to'])) {
                            if ($_GET['to'] == 'data-training') { ?>
                              <h4>Data Training</h4>
                              <hr>
                              <div class="table-responsive">
                                <table class="table table-striped table-hover table-borderless table-sm display" id="datatable">
                                  <thead>
                                    <tr>
                                      <th scope="col" class="text-center">#</th>
                                      <th scope="col" class="text-center bg-success text-white">NIM</th>
                                      <th scope="col" class="text-center bg-success text-white">Nama</th>
                                      <th scope="col" class="text-center bg-success text-white">Judul Skripsi</th>
                                      <th scope="col" class="text-center bg-success text-white">Kategori</th>
                                      <th scope="col" class="text-center bg-success text-white">Jenis Perangkat</th>
                                      <th scope="col" class="text-center bg-success text-white">Bahasa Pemrograman</th>
                                      <th scope="col" class="text-center bg-warning text-dark">Kelas Klasifikasi</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php if (isset($_SESSION['data-klasifikasi'])) {
                                      if (mysqli_num_rows($data_training) > 0) {
                                        $no = 1;
                                        while ($row = mysqli_fetch_assoc($data_training)) { ?>
                                          <tr>
                                            <th scope="row" class="text-center"><?= $no++; ?></th>
                                            <td><?= $row['nim'] ?></td>
                                            <td><?= $row['nama'] ?></td>
                                            <td><?= $row['judul'] ?></td>
                                            <td><?= $row['kategori'] ?></td>
                                            <td><?= $row['jenis_perangkat'] ?></td>
                                            <td><?= $row['bahasa_pemrograman'] ?></td>
                                            <td><?= $row['kelas'] ?></td>
                                          </tr>
                                    <?php }
                                      }
                                    } ?>
                                  </tbody>
                                </table>
                              </div>
                          <?php }
                            if ($_GET['to'] == 'preprocessing-data') {
                              if (isset($_SESSION['data-klasifikasi'])) {

                                // Mengambil data dari tabel data latih
                                $dataTraining = "SELECT * FROM training JOIN skripsi ON training.id_skripsi=skripsi.id_skripsi JOIN kelas ON training.id_kelas=kelas.id_kelas";
                                $dataTraining_result = $conn->query($dataTraining);

                                // Data training
                                $dataTraining = array();
                                if ($dataTraining_result->num_rows > 0) {
                                  while ($dataTraining_row = $dataTraining_result->fetch_assoc()) {
                                    $dataTraining[] = array(
                                      'kategori' => $dataTraining_row['kategori'],
                                      'jenis_perangkat' => $dataTraining_row['jenis_perangkat'],
                                      'bahasa_pemrograman' => $dataTraining_row['bahasa_pemrograman'],
                                      'kelas' => $dataTraining_row['kelas']
                                    );
                                  }
                                }

                                // Preprocessing data
                                $preprocessedData = array();

                                foreach ($dataTraining as $data) {
                                  // Mengubah teks menjadi huruf kecil
                                  $data = array_map('strtolower', $data);

                                  // Membersihkan karakter-karakter khusus dan spasi
                                  $data = array_map('trim', $data);

                                  // Menambahkan data hasil preprocessing ke dalam array baru
                                  $preprocessedData[] = $data;
                                }

                                // Menampilkan data training setelah preprocessing
                                echo "<h4>Preprocessing Data</h4><hr><div class='table-responsive'>";
                                echo "<table class='table table-striped table-hover table-borderless table-sm'><thead>";
                                echo "<tr>
                                  <th scope='col' class='text-center'>#</th>
                                  <th scope='col' class='text-center bg-success text-white'>Kategori</th>
                                  <th scope='col' class='text-center bg-success text-white'>Jenis Perangkat</th>
                                  <th scope='col' class='text-center bg-success text-white'>Bahasa Pemrograman</th>
                                  <th scope='col' class='text-center bg-warning text-dark'>Kelas Klasifikasi</th>
                                </tr></thead><tbody>";
                                $no = 1;
                                foreach ($preprocessedData as $data) {
                                  echo "<tr>";
                                  echo "<td>" . $no++ . "</td>";
                                  echo "<td>" . $data['kategori'] . "</td>";
                                  echo "<td>" . $data['jenis_perangkat'] . "</td>";
                                  echo "<td>" . $data['bahasa_pemrograman'] . "</td>";
                                  echo "<td>" . $data['kelas'] . "</td>";
                                  echo "</tr>";
                                }
                                echo "</tbody></table></div>";
                              }
                            }
                            if ($_GET['to'] == 'probabilitas-kelas') {
                              // ...

                              if (isset($_SESSION['data-klasifikasi'])) {

                                $dataTraining = "SELECT * FROM training JOIN skripsi ON training.id_skripsi=skripsi.id_skripsi JOIN kelas ON training.id_kelas=kelas.id_kelas";
                                $dataTraining_result = $conn->query($dataTraining);

                                // Data training
                                $dataTraining = array();
                                if ($dataTraining_result->num_rows > 0) {
                                  while ($dataTraining_row = $dataTraining_result->fetch_assoc()) {
                                    $dataTraining[] = array(
                                      'kategori' => $dataTraining_row['kategori'],
                                      'jenis_perangkat' => $dataTraining_row['jenis_perangkat'],
                                      'bahasa_pemrograman' => $dataTraining_row['bahasa_pemrograman'],
                                      'kelas' => $dataTraining_row['kelas']
                                    );
                                  }
                                }

                                // Preprocessing data
                                $preprocessedData = array();

                                foreach ($dataTraining as $data) {
                                  // Mengubah teks menjadi huruf kecil
                                  $data = array_map('strtolower', $data);

                                  // Membersihkan karakter-karakter khusus dan spasi
                                  $data = array_map('trim', $data);

                                  // Menambahkan data hasil preprocessing ke dalam array baru
                                  $preprocessedData[] = $data;
                                }

                                // Menghitung probabilitas kelas
                                $countLayak = 0;
                                $countTidakLayak = 0;

                                foreach ($preprocessedData as $data) {
                                  if ($data['kelas'] == 'soft computing') {
                                    $countLayak++;
                                  } elseif ($data['kelas'] == 'mobile computing') {
                                    $countTidakLayak++;
                                  }
                                }

                                $totalData = count($preprocessedData);
                                $probLayak = $countLayak / $totalData;
                                $probTidakLayak = $countTidakLayak / $totalData;

                                // Menampilkan hasil probabilitas kelas
                                echo "<h4>Probabilitas Kelas</h4><hr>";
                                echo "<table class='table table-striped table-hover table-borderless table-sm'>";
                                echo "<thead><tr><th scope='col' class='text-center'>Kelas Klasifikasi</th>";
                                echo "<th scope='col' class='text-center'>Jumlah</th>";
                                echo "<th scope='col' class='text-center'>Probabilitas</th></tr></thead><tbody>";
                                echo "<tr><td>Soft</td><td class='text-center'>$countLayak</td>";
                                echo "<td class='text-center'>$probLayak</td></tr>";
                                echo "<tr><td>Mobile</td><td class='text-center'>$countTidakLayak</td>";
                                echo "<td class='text-center'>$probTidakLayak</td></tr>";
                                echo "</tbody></table>";

                                $fiturProbabilities = array();

                                $fiturNames = array(
                                  'kategori',
                                  'jenis_perangkat',
                                  'bahasa_pemrograman',
                                  'kelas'
                                );



                                // Menampilkan hasil probabilitas setiap fitur
                                // Counting the occurrences of each feature value
                                $featureCounts = array();

                                foreach ($fiturNames as $fitur) {
                                  $featureCounts[$fitur] = array(
                                    'soft computing' => array_count_values(array_column(array_filter($preprocessedData, function ($data) use ($fitur) {
                                      return $data['kelas'] === 'soft computing';
                                    }), $fitur)),
                                    'mobile computing' => array_count_values(array_column(array_filter($preprocessedData, function ($data) use ($fitur) {
                                      return $data['kelas'] === 'mobile computing';
                                    }), $fitur))
                                  );
                                }

                                echo "<h4>Jumlah Kemunculan Setiap Fitur</h4><hr>";
                                echo "<table class='table table-striped table-hover table-borderless table-sm'>";
                                echo "<thead><tr><th scope='col' class='text-center'>Fitur</th>";
                                echo "<th scope='col' class='text-center'>Nilai</th>";
                                echo "<th scope='col' class='text-center'>Soft Computing</th>";
                                echo "<th scope='col' class='text-center'>Mobile Computing</th></tr></thead><tbody>";

                                foreach ($fiturNames as $fitur) {
                                  $uniqueValues = array_unique(array_merge(array_keys($featureCounts[$fitur]['soft computing']), array_keys($featureCounts[$fitur]['mobile computing'])));
                                  $rowspan = count($uniqueValues);

                                  echo "<tr><td rowspan='$rowspan'>$fitur</td>";

                                  $firstRow = true;

                                  foreach ($uniqueValues as $value) {
                                    if (!$firstRow) {
                                      echo "<tr>";
                                    }
                                    echo "<td>$value</td>";
                                    echo "<td class='text-center'>" . ($featureCounts[$fitur]['soft computing'][$value] ?? 0) . "</td>";
                                    echo "<td class='text-center'>" . ($featureCounts[$fitur]['mobile computing'][$value] ?? 0) . "</td>";
                                    echo "</tr>";
                                    $firstRow = false;
                                  }
                                }

                                echo "</tbody></table>";
                              }
                            }
                            if ($_GET['to'] == 'prediksi') {
                              if (isset($_SESSION['data-klasifikasi'])) {
                                // Fungsi untuk preprocessing
                                function preprocess($data)
                                {
                                  $data = strtolower($data); // Mengkonversi ke lowercase
                                  $data = trim($data);

                                  // Tambahkan langkah-langkah preprocessing lain yang diperlukan

                                  return $data;
                                }

                                // Mengambil data dari sesi
                                $nim = $_SESSION['data-klasifikasi']['nim'];
                                $nama = $_SESSION['data-klasifikasi']['nama'];
                                $judul = $_SESSION['data-klasifikasi']['judul'];
                                $abstrak = $_SESSION['data-klasifikasi']['abstrak'];
                                $kategori = $_SESSION['data-klasifikasi']['kategori'];
                                $jenis_perangkat = $_SESSION['data-klasifikasi']['jenis_perangkat'];
                                $bahasa_pemrograman = $_SESSION['data-klasifikasi']['bahasa_pemrograman'];
                                $pembimbing_satu = $_SESSION['data-klasifikasi']['pembimbing_satu'];
                                $pembimbing_dua = $_SESSION['data-klasifikasi']['pembimbing_dua'];
                                $penguji_satu = $_SESSION['data-klasifikasi']['penguji_satu'];
                                $penguji_dua = $_SESSION['data-klasifikasi']['penguji_dua'];
                                $tahun = $_SESSION['data-klasifikasi']['tahun'];

                                // Mengambil data dari tabel data latih
                                $preprocessed = "SELECT * FROM training JOIN skripsi ON training.id_skripsi=skripsi.id_skripsi JOIN kelas ON training.id_kelas=kelas.id_kelas";
                                $preprocessed_result = $conn->query($preprocessed);

                                // Data training
                                $preprocessedData = array();
                                if ($preprocessed_result->num_rows > 0) {
                                  while ($preprocessed_row = $preprocessed_result->fetch_assoc()) {
                                    // Preprocessing pada data latih
                                    $preprocessed_row['kategori'] = preprocess($preprocessed_row['kategori']);
                                    $preprocessed_row['jenis_perangkat'] = preprocess($preprocessed_row['jenis_perangkat']);
                                    $preprocessed_row['bahasa_pemrograman'] = preprocess($preprocessed_row['bahasa_pemrograman']);
                                    $preprocessed_row['kelas'] = preprocess($preprocessed_row['kelas']);

                                    $preprocessedData[] = array(
                                      'kategori' => $preprocessed_row['kategori'],
                                      'jenis_perangkat' => $preprocessed_row['jenis_perangkat'],
                                      'bahasa_pemrograman' => $preprocessed_row['bahasa_pemrograman'],
                                      'kelas' => $preprocessed_row['kelas']
                                    );
                                  }
                                }

                                // Preprocessing pada data testing
                                $kategori = preprocess($kategori);
                                $jenis_perangkat = preprocess($jenis_perangkat);
                                $bahasa_pemrograman = preprocess($bahasa_pemrograman);

                                // Data testing
                                $dataTesting = array(
                                  'kategori' => $kategori,
                                  'jenis_perangkat' => $jenis_perangkat,
                                  'bahasa_pemrograman' => $bahasa_pemrograman,
                                );


                                // Menghitung jumlah sampel dalam setiap kelas
                                $totalSampel = count($preprocessedData);
                                $kelasYa = 0;
                                $kelasTidak = 0;

                                foreach ($preprocessedData as $data) {
                                  $kelas = $data['kelas'];

                                  if ($kelas == 'soft computing') {
                                    $kelasYa++;
                                  } elseif ($kelas == 'mobile computing') {
                                    $kelasTidak++;
                                  }
                                }

                                // Menghitung probabilitas kelas
                                $probabilitasYa = ($kelasYa + 1) / ($totalSampel + 2); // Laplace smoothing
                                $probabilitasTidak = ($kelasTidak + 1) / ($totalSampel + 2);



                                // Menghitung probabilitas fitur dalam setiap kelas
                                $probabilitasFiturYa = array();
                                $probabilitasFiturTidak = array();

                                foreach ($preprocessedData as $data) {
                                  $kelas = $data['kelas'];

                                  foreach ($data as $fitur => $value) {
                                    if ($fitur != 'kelas') {
                                      if ($kelas == 'soft computing') {
                                        if (!isset($probabilitasFiturYa[$fitur][$value])) {
                                          $probabilitasFiturYa[$fitur][$value] = 0;
                                        }
                                        $probabilitasFiturYa[$fitur][$value]++;
                                      } elseif ($kelas == 'mobile computing') {
                                        if (!isset($probabilitasFiturTidak[$fitur][$value])) {
                                          $probabilitasFiturTidak[$fitur][$value] = 0;
                                        }
                                        $probabilitasFiturTidak[$fitur][$value]++;
                                      }
                                    }
                                  }
                                }

                                // Menghitung probabilitas gabungan untuk kelas Ya dan mengalikan nilai-nilai tersebut
                                $probabilitasGabunganYa = 1; // Inisialisasi variabel untuk hasil gabungan

                                foreach ($dataTesting as $fitur => $value) {
                                  $p = $probabilitasFiturYa[$fitur][$value] / $kelasYa;
                                  $probabilitasGabunganYa *= $p; // Mengalikan nilai $p dengan hasil gabungan sebelumnya
                                }

                                $probabilitasGabunganTidak = 1; // Inisialisasi variabel untuk hasil gabungan tersebut

                                foreach ($dataTesting as $fitur => $value) {
                                  $p = $probabilitasFiturTidak[$fitur][$value] / $kelasTidak;
                                  $probabilitasGabunganTidak *= $p; // Mengalikan nilai $p dengan hasil gabungan sebelumnya
                                }

                                // Menampilkan hasil perhitungan
                                echo "<h4>Hasil Perhitungan Probabilitas</h4><hr>";
                                echo "<div class='table-responsive'><table class='table table-striped table-hover table-borderless table-sm'>";
                                echo "<thead><tr><th scope='col'>Fitur</th>";
                                echo "<th scope='col'>Nilai</th>";
                                echo "<th scope='col'>Probabilitas Soft Computing</th>";
                                echo "<th scope='col'>Probabilitas Mobile Computing</th></tr>";

                                foreach ($dataTesting as $fitur => $value) {
                                  echo "<tr>";
                                  echo "<td>" . $fitur . "</td>";
                                  echo "<td>" . $value . "</td>";

                                  if (isset($probabilitasFiturYa[$fitur][$value])) {
                                    $probabilitas = $probabilitasFiturYa[$fitur][$value] / $kelasYa;

                                    echo "<td>" . $probabilitas . "</td>";
                                  } else {
                                    $probabilitas = 0;
                                    echo "<td>" . $probabilitas . "</td>";
                                  }

                                  if (isset($probabilitasFiturTidak[$fitur][$value])) {
                                    $probabilitas = $probabilitasFiturTidak[$fitur][$value] / $kelasTidak;
                                    echo "<td>" . $probabilitas . "</td>";
                                  } else {
                                    $probabilitas = 0;
                                    echo "<td>" . $probabilitas . "</td>";
                                  }

                                  echo "</tr>";
                                }

                                echo "</tbody></table></div>";

                                echo "Hasil probabilitas gabungan untuk kelas Soft Computing: " . $probabilitasGabunganYa . "<br>";
                                echo "Hasil probabilitas gabungan untuk kelas Mobile Computing: " . $probabilitasGabunganTidak;

                                // Melakukan prediksi

                                if ($probabilitasGabunganYa > $probabilitasGabunganTidak) {
                                  $id_kelas = 1;
                                  $prediksi = "Soft Computing";
                                } else {
                                  $id_kelas = 2;
                                  $prediksi = "Mobile Computing";
                                }

                                // Menampilkan hasil prediksi
                                echo "<h4 class='mt-5'> Hasil Prediksi</h4><hr>";
                                echo "Berdasarkan hasil perhitungan probabilitas, data tersebut diprediksi sebagai: <strong>" . $prediksi . "</strong>";

                                // Menampilkan hasil prediksi
                                echo "<h4>Data Skripsi</h4><hr>";
                                echo "<div class='table-responsive'>";
                                echo "<table class='table table-striped table-hover table-borderless table-sm'>";
                                echo "<tr>";
                                echo "<td style='width: 100px;'>NIM</td>";
                                echo "<td style='width: 10px;'>:</td>";
                                echo "<th>" . $_SESSION['data-klasifikasi']['nim'] . "</th>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td style='width: 100px;'>Nama</td>";
                                echo "<td style='width: 10px;'>:</td>";
                                echo "<th>" . $_SESSION['data-klasifikasi']['nama'] . "</th>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td>Judul</td>";
                                echo "<td>:</td>";
                                echo "<th>" . $_SESSION['data-klasifikasi']['judul'] . "</th>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td>Abstrak</td>";
                                echo "<td>:</td>";
                                echo "<th><textarea class='form-control bg-transparent border-0 rounded-0 m-0 p-0' style='height: 100px;line-height: 20px;' readonly>" . $_SESSION['data-klasifikasi']['abstrak'] . "</textarea></th>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td>Kategori</td>";
                                echo "<td>:</td>";
                                echo "<th>" . $_SESSION['data-klasifikasi']['kategori'] . "</th>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td>Jenis Perangkat</td>";
                                echo "<td>:</td>";
                                echo "<th>" . $_SESSION['data-klasifikasi']['jenis_perangkat'] . "</td>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td>Bahasa Pemrograman</td>";
                                echo "<td>:</td>";
                                echo "<th>" . $_SESSION['data-klasifikasi']['bahasa_pemrograman'] . "</th>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td>Pembimbing Satu</td>";
                                echo "<td>:</td>";
                                echo "<th>" . $_SESSION['data-klasifikasi']['pembimbing_satu'] . "</th>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td>Pembimbing Dua</td>";
                                echo "<td>:</td>";
                                echo "<th>" . $_SESSION['data-klasifikasi']['pembimbing_dua'] . "</th>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td>Penguji Satu</td>";
                                echo "<td>:</td>";
                                echo "<th>" . $_SESSION['data-klasifikasi']['penguji_satu'] . "</th>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td>Penguji Dua</td>";
                                echo "<td>:</td>";
                                echo "<th>" . $_SESSION['data-klasifikasi']['penguji_dua'] . "</th>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "</table></div></div></div>";
                                echo "<div class='card border-0 rounded-0 shadow mt-3'><div class='card-body'><strong>Hasil Prediksi Kelas:</strong> " . $prediksi . "</div></div>";

                                $checkSkripsi = mysqli_query($conn, "SELECT * FROM skripsi WHERE nim='$nim'");
                                if (mysqli_num_rows($checkSkripsi) == 0) {
                                  $checkID_skripsi = mysqli_query($conn, "SELECT * FROM skripsi ORDER BY id_skripsi DESC LIMIT 1");
                                  if (mysqli_num_rows($checkID_skripsi) > 0) {
                                    $rowID = mysqli_fetch_assoc($checkID_skripsi);
                                    $id_skripsi = $rowID['id_skripsi'] + 1;
                                  } else {
                                    $id_skripsi = 1;
                                  }
                                  mysqli_query($conn, "INSERT INTO skripsi(id_skripsi,nim,nama,judul,abstrak,kategori,jenis_perangkat,bahasa_pemrograman,pembimbing_satu,pembimbing_dua,penguji_satu,penguji_dua,tahun) VALUES('$id_skripsi','$nim','$nama','$judul','$abstrak','$kategori','$jenis_perangkat','$bahasa_pemrograman','$pembimbing_satu','$pembimbing_dua','$penguji_satu','$penguji_dua','$tahun')");
                                  $checkID_testing = mysqli_query($conn, "SELECT * FROM testing ORDER BY id_testing DESC LIMIT 1");
                                  if (mysqli_num_rows($checkID_testing) > 0) {
                                    $rowID = mysqli_fetch_assoc($checkID_testing);
                                    $id_testing = $rowID['id_testing'] + 1;
                                  } else {
                                    $id_testing = 1;
                                  }
                                  mysqli_query($conn, "INSERT INTO testing(id_testing,id_skripsi,id_kelas) VALUES('$id_testing','$id_skripsi','$id_kelas')");
                                  mysqli_query($conn, "INSERT INTO klasifikasi(id_testing,nilai_akhir) VALUES('$id_testing','$prediksi')");
                                }
                              }
                            }
                          }
                          if (isset($_GET['to'])) {
                            if ($_GET['to'] != "probabilitas-kelas" || $_GET['to'] != "prediksi") {
                              echo "
                            </div>
                          </div>";
                            }
                          } else {
                            echo "
                            </div>
                          </div>";
                          }
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php require_once("../resources/dash-footer.php") ?>
</body>

</html>