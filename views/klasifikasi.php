<?php
// Mengimpor library PHP-ML
require_once 'vendor/autoload.php';

use Phpml\Classification\NaiveBayes;

require_once("../controller/script.php");
require_once("redirect.php");
$_SESSION["page-name"] = "Perhitungan";
$_SESSION["page-url"] = "perhitungan";
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
                </div>
                <div class="data-main mt-3">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="card border-0 rounded-0 shadow">
                        <div class="card-body">
                          <nav class="sidebar sidebar-offcanvas bg-transparent" id="sidebar">
                            <ul class="nav">
                              <li class="nav-item">
                                <a class="nav-link" style="cursor: pointer;" onclick="window.location.href='klasifikasi'">
                                  <i class="mdi mdi-subdirectory-arrow-right menu-icon text-dark"></i>
                                  <span class="menu-title text-dark">Seleksi</span>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" style="cursor: pointer;" onclick="window.location.href='klasifikasi?to=dataset'">
                                  <i class="mdi mdi-subdirectory-arrow-right menu-icon text-dark"></i>
                                  <span class="menu-title text-dark">Dataset</span>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" style="cursor: pointer;" onclick="window.location.href='klasifikasi?to=initial-process'">
                                  <i class="mdi mdi-subdirectory-arrow-right menu-icon text-dark"></i>
                                  <span class="menu-title text-dark">Initial Process</span>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" style="cursor: pointer;" onclick="window.location.href='klasifikasi?to=performance'">
                                  <i class="mdi mdi-subdirectory-arrow-right menu-icon text-dark"></i>
                                  <span class="menu-title text-dark">Performance</span>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" style="cursor: pointer;" onclick="window.location.href='klasifikasi?to=prediksi'">
                                  <i class="mdi mdi-subdirectory-arrow-right menu-icon text-dark"></i>
                                  <span class="menu-title text-dark">Prediksi</span>
                                </a>
                              </li>
                            </ul>
                          </nav>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-9">
                      <div class="card border-0 rounded-0 shadow">
                        <div class="card-body table-responsive">
                          <?php if (!isset($_GET['to'])) { ?>
                            <div class="row mt-3">
                              <div class="col-lg-6 m-auto">
                                <h4 class="text-center">Seleksi Data Mahasiswa</h4>
                                <form action="" method="post">
                                  <div class="mb-3 text-center mt-5">
                                    <label for="tahun" class="form-label">Tahun Lulusan</label>
                                    <select name="tahun" class="form-select" aria-label="Default select example" required>
                                      <option selected value="">Pilih Tahun</option>
                                      <?php foreach ($mahasiswaSkripsi as $row1) : ?>
                                        <option value="<?= $row1['tahun'] ?>"><?= $row1['tahun'] ?></option>
                                      <?php endforeach ?>
                                    </select>
                                  </div>
                                  <div class="mb-3 text-center">
                                    <button type="submit" name="seleksi" class="btn btn-primary text-white me-0 rounded-0 mt-3">Submit</button>
                                  </div>
                                </form>
                              </div>
                              <div class="col-lg-6">
                                <img src="../assets/images/banner.png" style="width: 100%;" alt="Gambar tidak ditemukan!">
                              </div>
                            </div>
                            <?php } else if (isset($_GET['to'])) {
                            if ($_GET['to'] == 'dataset') { ?>
                              <h4>Dataset Naive Bayes</h4>
                              <hr>
                              <table class="table table-striped table-hover table-borderless table-sm display">
                                <thead>
                                  <tr>
                                    <th scope="col" class="text-center">#</th>
                                    <th scope="col" class="text-center">Abstrak</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php if (isset($_SESSION['data-klasifikasi'])) {
                                    if (mysqli_num_rows($dataset) > 0) {
                                      $no = 1;
                                      while ($row = mysqli_fetch_assoc($dataset)) { ?>
                                        <tr>
                                          <th scope="row" class="text-center"><?= $no++; ?></th>
                                          <td>
                                            <textarea class="form-control border-0 rounded-0 p-0" id="exampleFormControlTextarea1" style="height: 100%;line-height: 20px;padding: 0;cursor: pointer;" rows="3"><?= $row['abstrak'] ?></textarea>
                                          </td>
                                        </tr>
                                  <?php }
                                    }
                                  } ?>
                                </tbody>
                              </table>
                            <?php }
                            if ($_GET['to'] == 'initial-process') { ?>
                              <h4>Initial Process</h4>
                              <hr>

                              <?php
                              if (isset($_SESSION['data-klasifikasi'])) {
                                $tahun = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_SESSION['data-klasifikasi']['tahun']))));
                                // Load data latih
                                $training = "SELECT abstrak, kategori FROM data_skripsi WHERE tahun='$tahun'";
                                $training_result = $conn->query($training);

                                // Data training
                                $dataLatih = array();
                                if ($training_result->num_rows > 0) {
                                  while ($training_row = $training_result->fetch_assoc()) {
                                    $dataLatih[] = array($training_row['abstrak'], $training_row['kategori']);
                                  }
                                }

                                // Buat array samples dan targets dari data latih
                                $samples = [];
                                $targets = [];
                                foreach ($dataLatih as $data) {
                                  $samples[] = [$data[0]];
                                  $targets[] = $data[1];
                                }

                                // Buat tabel HTML untuk menampilkan data samples dan targets
                                echo '<table class="table table-striped table-hover table-borderless table-sm display">';
                                echo '<tr><th class="text-center">Sample</th><th class="text-center">Target</th></tr>';
                                for ($i = 0; $i < count($samples); $i++) {
                                  echo '<tr>';
                                  echo '<td><textarea class="form-control border-0 rounded-0 p-0" id="exampleFormControlTextarea1" style="height: 100%;line-height: 20px;padding: 0;cursor: pointer;" rows="3">' . $samples[$i][0] . '</textarea></td>';
                                  echo '<td class="text-center">' . $targets[$i] . '</td>';
                                  echo '</tr>';
                                }
                                echo '</table>';
                              }
                              ?>

                            <?php }
                            if ($_GET['to'] == 'performance') { ?>
                              <h4>Performance</h4>
                              <hr>


                            <?php }
                            if ($_GET['to'] == 'prediksi') { ?>
                              <h4>Prediksi</h4>
                              <hr>
                          <?php }
                          } ?>
                        </div>
                      </div>
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