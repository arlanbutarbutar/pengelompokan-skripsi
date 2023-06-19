<?php require_once("../controller/script.php");
require_once("redirect.php");
$_SESSION["page-name"] = "Data Training";
$_SESSION["page-url"] = "training";
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
                      <h3>Training</h3>
                    </li>
                  </ul>
                  <div>
                    <div class="btn-wrapper">
                      <a href="export-training" class="btn btn-primary text-white me-0 rounded-0 shadow"> Export</a>
                    </div>
                  </div>
                </div>
                <div class="card rounded-0 mt-3">
                  <div class="card-body table-responsive">
                    <table class="table table-striped table-hover table-borderless table-sm display" id="datatable">
                      <thead>
                        <tr>
                          <th scope="col" class="text-center">#</th>
                          <th scope="col" class="text-center">NIM</th>
                          <th scope="col" class="text-center">Nama</th>
                          <th scope="col" class="text-center">Judul</th>
                          <th scope="col" class="text-center">Kategori</th>
                          <th scope="col" class="text-center">Jenis Perangkat</th>
                          <th scope="col" class="text-center">Bhs. Pemrograman</th>
                          <th scope="col" class="text-center">Kelas</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if (mysqli_num_rows($dataTraining) > 0) {
                          $no = 1;
                          while ($row = mysqli_fetch_assoc($dataTraining)) { ?>
                            <tr>
                              <th scope="row"><?= $no; ?></th>
                              <td><?= $row["nim"] ?></td>
                              <td><?= $row["nama"] ?></td>
                              <td><?= $row["judul"] ?></td>
                              <td><?= $row["kategori"] ?></td>
                              <td><?= $row["jenis_perangkat"] ?></td>
                              <td><?= $row["bahasa_pemrograman"] ?></td>
                              <td><?= $row["kelas"] ?></td>
                            </tr>
                        <?php $no++;
                          }
                        } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php require_once("../resources/dash-footer.php") ?>
</body>

</html>