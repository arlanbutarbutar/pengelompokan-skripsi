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
                                <a class="nav-link" style="cursor: pointer;" onclick="window.location.href='klasifikasi?to=klasifikasi'">
                                  <i class="mdi mdi-subdirectory-arrow-right menu-icon text-dark"></i>
                                  <span class="menu-title text-dark">Klasifikasi</span>
                                </a>
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
                                <h4 class="text-center">Seleksi Data Mahasiswa</h4>
                                <form action="" method="post" class="mt-5">
                                  <div class="mb-3 text-center">
                                    <label for="tahun" class="form-label">Tahun Lulusan</label>
                                    <select name="tahun" class="form-select" aria-label="Default select example" required>
                                      <option selected value="">Pilih Tahun</option>
                                      <?php foreach ($mahasiswaSkripsi as $row1) : ?>
                                        <option value="<?= $row1['tahun'] ?>"><?= $row1['tahun'] ?></option>
                                      <?php endforeach ?>
                                    </select>
                                  </div>
                                  <div class="mb-3 text-center">
                                    <label for="kategori" class="form-label">Kategori</label>
                                    <select name="kategori" class="form-select" aria-label="Default select example" required>
                                      <option selected value="">Pilih Kategori</option>
                                      <?php foreach ($kategoriData as $row2) : ?>
                                        <option value="<?= $row2['kategori'] ?>"><?= $row2['kategori'] ?></option>
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
                                $kategori = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_SESSION['data-klasifikasi']['kategori']))));

                                // Load data latih
                                $training = "SELECT abstrak, kategori FROM data_skripsi WHERE tahun='$tahun' AND kategori='$kategori'";
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
                                  echo '<td><textarea class="form-control border-0 rounded-0 p-0" id="exampleFormControlTextarea1" style="height: 150px;line-height: 20px;padding: 0;" rows="3">' . $samples[$i][0] . '</textarea></td>';
                                  echo '<td class="text-center">' . $targets[$i] . '</td>';
                                  echo '</tr>';
                                }
                                echo '</table>';
                              }
                            }
                            if ($_GET['to'] == 'klasifikasi') { ?>
                              <?php
                              if (isset($_SESSION['data-klasifikasi'])) {
                                $tahun_search = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_SESSION['data-klasifikasi']['tahun']))));
                                $category_search = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_SESSION['data-klasifikasi']['kategori']))));

                                // Mengambil data dari tabel skripsi
                                $training = "SELECT abstrak, kategori FROM data_skripsi WHERE tahun='$tahun_search' AND kategori='$category_search'";
                                $training_result = $conn->query($training);

                                // Data training
                                $training_data = array();
                                if ($training_result->num_rows > 0) {
                                  while ($training_row = $training_result->fetch_assoc()) {
                                    $training_data[] = array(
                                      'abstrak' => $training_row['abstrak'],
                                      'category' => $training_row['kategori']
                                    );
                                  }
                                }

                                // Kategori yang akan diklasifikasikan
                                $category_to_classify = $category_search;

                                // Hitung jumlah data training pada setiap kategori
                                $category_counts = array();
                                foreach ($training_data as $data) {
                                  $category = $data['category'];
                                  if (isset($category_counts[$category])) {
                                    $category_counts[$category]++;
                                  } else {
                                    $category_counts[$category] = 1;
                                  }
                                }

                                // Hitung jumlah data training total
                                $training_count = count($training_data);

                                // Hitung probabilitas setiap kategori
                                $category_probabilities = array();
                                foreach ($category_counts as $category => $count) {
                                  $category_probabilities[$category] = $count / $training_count;
                                }

                                // Hitung kemunculan setiap kata pada setiap kategori
                                $word_counts = array();
                                foreach ($training_data as $data) {
                                  $category = $data['category'];
                                  $words = explode(' ', strtolower($data['abstrak']));
                                  foreach ($words as $word) {
                                    if (!isset($word_counts[$category][$word])) {
                                      $word_counts[$category][$word] = 1;
                                    } else {
                                      $word_counts[$category][$word]++;
                                    }
                                  }
                                }

                                // Hitung probabilitas setiap kata pada setiap kategori
                                $word_probabilities = array();
                                foreach ($word_counts as $category => $words) {
                                  $total_words = array_sum($words);
                                  foreach ($words as $word => $count) {
                                    $word_probabilities[$category][$word] = $count / $total_words;
                                  }
                                }

                                // Mengambil data dari tabel skripsi
                                $testing = "SELECT id_skripsi, abstrak, kategori FROM data_skripsi WHERE tahun='$tahun_search'";
                                $testing_result = $conn->query($testing);

                                // Data testing
                                $testing_data = array();
                                if ($testing_result->num_rows > 0) {
                                  while ($testing_row = $testing_result->fetch_assoc()) {
                                    $testing_data[] = array(
                                      'id_skripsi' => $testing_row['id_skripsi'],
                                      'abstrak' => $testing_row['abstrak'],
                                      'category' => $testing_row['kategori']
                                    );
                                  }
                                }

                                // Klasifikasi data testing
                                foreach ($testing_data as $data) {
                                  $max_probability = 0;
                                  $predicted_category = '';
                                  foreach ($category_probabilities as $category => $category_probability) {
                                    $words = explode(' ', strtolower($data['abstrak']));
                                    $probability = $category_probability;
                                    foreach ($words as $word) {
                                      if (isset($word_probabilities[$category][$word])) {
                                        $probability *= $word_probabilities[$category][$word];
                                      }
                                    }
                                    if ($probability > $max_probability) {
                                      $max_probability = $probability;
                                      $predicted_category = $category;
                                    }
                                  }
                                  $data['category'] = $predicted_category;
                                  $id_skripsi = $data['id_skripsi'];
                                  $kategoris = $predicted_category;
                                  if (empty($kategoris)) {
                                    if ($category_to_classify == "Software") {
                                      $kategori = "Mobile";
                                    } else if ($category_to_classify == "Mobile") {
                                      $kategori = "Software";
                                    }
                                  } else if (!empty($kategoris)) {
                                    $kategori = $kategoris;
                                  }
                                  $checkID = mysqli_query($conn, "SELECT * FROM klasifikasi WHERE id_skripsi='$id_skripsi'");
                                  if (mysqli_num_rows($checkID) == 0) {
                                    mysqli_query($conn, "INSERT INTO klasifikasi(id_skripsi,kategori) VALUES('$id_skripsi','$kategori')");
                                  } else {
                                    mysqli_query($conn, "UPDATE klasifikasi SET kategori='$kategori' WHERE id_skripsi='$id_skripsi'");
                                  }
                                }

                                // Hitung akurasi
                                $correct_count = 0;
                                $total_count = count($testing_data);
                                foreach ($testing_data as $data) {
                                  if ($data['category'] === $category_to_classify) {
                                    $correct_count++;
                                  }
                                }
                                $accuracy = round($correct_count / $total_count * 100) ?>
                                <div class="jumbotron">
                                  <h1 class="display-4">Hasil Klasifikasi</h1>
                                  <p class="lead">Dari hasil klasifikasi dapat disimpulkan:</p>
                                  <hr>
                                  <div class="row">
                                    <div class="col-lg-6">
                                      <?php $xy = mysqli_query($conn, "SELECT kategori, COUNT(*) as jumlah FROM data_skripsi WHERE tahun='$tahun' GROUP BY kategori");
                                      if (mysqli_num_rows($xy) > 0) {
                                        // Looping untuk menampilkan hasil query
                                        while ($row = mysqli_fetch_assoc($xy)) {
                                          echo "<strong>Kategori " . $row["kategori"] . ":</strong> " . $row["jumlah"] . " data.<br>";
                                        }
                                      } ?>
                                      <strong>Prediksi Kategori:</strong> <?= $data['category'] ?>
                                    </div>
                                    <div class="col-lg-6">
                                      <strong>Dengan akurasi yang didapat</strong><br>
                                      <span class="badge badge-success mt-3 rounded-0" style="font-size: 45px;"><?= $accuracy ?>%</span>
                                    </div>
                                  </div>
                                </div>
                        </div>
                      </div>
                      <div class="card border-0 rounded-0 shadow mt-3">
                        <div class="card-body table-responsive">
                          <table class="table table-striped table-hover table-borderless table-sm display" id="datatable">
                            <thead>
                              <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col" class="text-center">Skripsi</th>
                                <th scope="col" class="text-center">Kategori</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $no = 1;
                                // Mengambil data hasil skripsi
                                $hasil = "SELECT * FROM data_skripsi WHERE tahun='$tahun_search'";
                                $hasil_result = $conn->query($hasil);

                                // Data hasil
                                $hasil_data = array();
                                if ($hasil_result->num_rows > 0) {
                                  while ($hasil_row = $hasil_result->fetch_assoc()) {
                                    $hasil_data[] = array(
                                      'id_skripsi' => $hasil_row['id_skripsi'],
                                      'nim' => $hasil_row['nim'],
                                      'nama_mahasiswa' => $hasil_row['nama_mahasiswa'],
                                      'judul' => $hasil_row['judul'],
                                      'abstrak' => $hasil_row['abstrak'],
                                      'pembimbing_satu' => $hasil_row['pembimbing_satu'],
                                      'pembimbing_dua' => $hasil_row['pembimbing_dua'],
                                      'penguji_satu' => $hasil_row['penguji_satu'],
                                      'penguji_dua' => $hasil_row['penguji_dua'],
                                      'tahun' => $hasil_row['tahun'],
                                      'category' =>  $hasil_row['kategori']
                                    );
                                  }
                                }

                                // Klasifikasi data testing
                                foreach ($hasil_data as $data_hasil) {
                                  $max_probability = 0;
                                  $predicted_category = '';
                                  foreach ($category_probabilities as $category => $category_probability) {
                                    $words = explode(' ', strtolower($data_hasil['text']));
                                    $probability = $category_probability;
                                    foreach ($words as $word) {
                                      if (isset($word_probabilities[$category][$word])) {
                                        $probability *= $word_probabilities[$category][$word];
                                      }
                                    }
                                    if ($probability > $max_probability) {
                                      $max_probability = $probability;
                                      $predicted_category = $category;
                                    }
                                  }
                                  $id_skripsi = $data_hasil['id_skripsi'];
                              ?>
                                <tr>
                                  <th scope="row"><?= $no++; ?></th>
                                  <td>
                                    <button type="button" class="btn btn-link btn-sm rounded-0 border-0" data-bs-toggle="modal" data-bs-target="#data-skripsi<?= $data_hasil["id_skripsi"] ?>">
                                      <?= $data_hasil["nim"] . " - " . $data_hasil["nama_mahasiswa"] ?>
                                    </button>
                                    <div class="modal fade" id="data-skripsi<?= $data_hasil["id_skripsi"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                          <div class="modal-header border-bottom-0 shadow">
                                            <h5 class="modal-title" id="exampleModalLabel"><?= $data_hasil["nim"] . " - " . $data_hasil["nama_mahasiswa"] ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                            <table class="table table-sm">
                                              <tbody>
                                                <tr>
                                                  <th>
                                                    <h6>Judul</h6>
                                                  </th>
                                                  <th>
                                                    <p>:</p>
                                                  </th>
                                                  <th>
                                                    <p><?= $data_hasil['judul'] ?></p>
                                                  </th>
                                                </tr>
                                                <tr>
                                                  <th>
                                                    <h6>Pembimbing 1</h6>
                                                  </th>
                                                  <th>
                                                    <p>:</p>
                                                  </th>
                                                  <th>
                                                    <p><?= $data_hasil['pembimbing_satu'] ?></p>
                                                  </th>
                                                </tr>
                                                <tr>
                                                  <th>
                                                    <h6>Pembimbing 2</h6>
                                                  </th>
                                                  <th>
                                                    <p>:</p>
                                                  </th>
                                                  <th>
                                                    <p><?= $data_hasil['pembimbing_dua'] ?></p>
                                                  </th>
                                                </tr>
                                                <tr>
                                                  <th>
                                                    <h6>Penguji 1</h6>
                                                  </th>
                                                  <th>
                                                    <p>:</p>
                                                  </th>
                                                  <th>
                                                    <p><?= $data_hasil['penguji_satu'] ?></p>
                                                  </th>
                                                </tr>
                                                <tr>
                                                  <th>
                                                    <h6>Penguji 2</h6>
                                                  </th>
                                                  <th>
                                                    <p>:</p>
                                                  </th>
                                                  <th>
                                                    <p><?= $data_hasil['penguji_dua'] ?></p>
                                                  </th>
                                                </tr>
                                                <tr>
                                                  <th>
                                                    <h6>Tahun Lulus</h6>
                                                  </th>
                                                  <th>
                                                    <p>:</p>
                                                  </th>
                                                  <th>
                                                    <p><?= $data_hasil['tahun'] ?></p>
                                                  </th>
                                                </tr>
                                                <tr>
                                                  <th style="margin-top: 0px;">
                                                    <h6>Abstrak</h6>
                                                  </th>
                                                  <th>
                                                    <p>:</p>
                                                  </th>
                                                  <th>
                                                    <textarea class="form-control rounded-0 border-0" readonly style="background: none;height: 100%;line-height: 20px;padding: 0;cursor: pointer;" cols="30" rows="10"><?= $data_hasil['abstrak'] ?></textarea>
                                                  </th>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </td>
                                  <td class="text-center"><?= $data_hasil['category'] ?></td>
                                </tr>
                              <?php
                                } ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    <?php }
                            }
                          }
                          if (isset($_GET['to'])) {
                            if ($_GET['to'] != "klasifikasi") { ?>
                    </div>
                  </div>
              <?php }
                          } ?>
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