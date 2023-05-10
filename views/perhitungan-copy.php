<?php require_once("../controller/script.php");
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
                      <h3>Perhitungan</h3>
                    </li>
                  </ul>
                </div>
                <div class="data-main"></div>
                <?php
                if (!isset($_SESSION['data-hitung'])) {
                  // Mengambil data dari tabel
                  $sql = "SELECT data_skripsi.abstrak, kategori.kategori FROM klasifikasi JOIN data_skripsi ON klasifikasi.id_skripsi=data_skripsi.id_skripsi JOIN kategori ON klasifikasi.id_kategori=kategori.id_kategori";
                  $result = $conn->query($sql);

                  // Data training
                  $training_data = array(
                    array('abstrak' => 'penelitian ini membahas tentang pengaruh media sosial terhadap perilaku remaja', 'kategori' => 'Sosial'),
                    array('abstrak' => 'penelitian ini membahas tentang pengembangan aplikasi mobile', 'kategori' => 'Teknologi'),
                    array('abstrak' => 'penelitian ini membahas tentang dampak perubahan iklim', 'kategori' => 'Lingkungan'),
                    array('abstrak' => 'penelitian ini membahas tentang pengaruh olahraga terhadap kesehatan', 'kategori' => 'Kesehatan')
                  );

                  // Data uji
                  $uji_data = array(
                    'abstrak' => 'penelitian ini membahas tentang dampak penggunaan teknologi terhadap kesehatan'
                  );

                  // Hitung jumlah dokumen pada setiap kategori
                  $total_dokumen = count($training_data);
                  $jumlah_dokumen_kategori = array();
                  foreach ($training_data as $data) {
                    $kategori = $data['kategori'];
                    if (!isset($jumlah_dokumen_kategori[$kategori])) {
                      $jumlah_dokumen_kategori[$kategori] = 0;
                    }
                    $jumlah_dokumen_kategori[$kategori]++;
                  }

                  // Hitung jumlah kata pada setiap kategori
                  $jumlah_kata_kategori = array();
                  foreach ($training_data as $data) {
                    $kategori = $data['kategori'];
                    $abstrak = $data['abstrak'];
                    $kata = explode(' ', $abstrak);
                    foreach ($kata as $k) {
                      if (!isset($jumlah_kata_kategori[$kategori][$k])) {
                        $jumlah_kata_kategori[$kategori][$k] = 0;
                      }
                      $jumlah_kata_kategori[$kategori][$k]++;
                    }
                  }

                  // Hitung probabilitas prior untuk setiap kategori
                  $prior = array();
                  foreach ($jumlah_dokumen_kategori as $kategori => $jumlah) {
                    $prior[$kategori] = $jumlah / $total_dokumen;
                  }

                  // Hitung likelihood untuk setiap kata pada setiap kategori
                  $likelihood = array();
                  foreach ($jumlah_kata_kategori as $kategori => $jumlah_kata) {
                    $total_kata_kategori = array_sum($jumlah_kata);
                    foreach ($jumlah_kata as $kata => $jumlah) {
                      $likelihood[$kategori][$kata] = ($jumlah + 1) / ($total_kata_kategori + count($jumlah_kata));
                    }
                  }

                  // Hitung posterior untuk setiap kategori
                  $posterior = array();
                  $abstrak_uji = $uji_data['abstrak'];
                  $kata_uji = explode(' ', $abstrak_uji);
                  foreach ($jumlah_dokumen_kategori as $kategori => $jumlah) {
                    $posterior[$kategori] = $prior[$kategori];
                    foreach ($kata_uji as $kata) {
                      if (isset($likelihood[$kategori][$kata])) {
                        $posterior[$kategori] *= $likelihood[$kategori][$kata];
                      }
                    }
                  }

                  // Tentukan kategori dengan posterior tertinggi
                  $kategori_tertinggi = '';
                  $nilai_tertinggi = 0;
                  foreach ($posterior as $kategori => $nilai) {
                    if ($nilai > $nilai_tertinggi) {
                      $kategori_tertinggi = $kategori;
                      $nilai_tertinggi = $nilai;
                    }
                  }

                  // Tampilkan hasil klasifikasi
                  echo "Abstrak uji: " . $abstrak_uji . "<br>";
                  echo "Kategori terklasifikasi: " . $kategori_tertinggi . "<br>";
                  echo "Nilai posterior: " . $nilai_tertinggi . "<br>";
                }
                ?>
              </div>
            </div>
          </div>
        </div>
        <?php require_once("../resources/dash-footer.php") ?>
</body>

</html>