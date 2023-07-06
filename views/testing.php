<?php require_once("../controller/script.php");
require_once("redirect.php");
$_SESSION["page-name"] = "Data Testing";
$_SESSION["page-url"] = "testing";
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
                      <h3>Data Testing</h3>
                    </li>
                  </ul>
                  <div>
                    <div class="btn-wrapper">
                      <a href="export-testing" class="btn btn-primary text-white me-0 rounded-0 shadow"> Export</a>
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
                          <th scope="col" class="text-center">Skipsi</th>
                          <th scope="col" class="text-center">Kategori</th>
                          <th scope="col" class="text-center">Jenis Perangkat</th>
                          <th scope="col" class="text-center">Bhs. Pemrograman</th>
                          <th scope="col" class="text-center">Kelas</th>
                          <th scope="col" class="text-center">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if (mysqli_num_rows($dataTesting) > 0) {
                          $no = 1;
                          while ($row = mysqli_fetch_assoc($dataTesting)) { ?>
                            <tr>
                              <th scope="row"><?= $no; ?></th>
                              <td><?= $row["nim"] ?></td>
                              <td><?= $row["nama"] ?></td>
                              <td><?= $row["judul"] ?></td>
                              <td>
                                <button type="button" class="btn btn-primary btn-sm text-white rounded-0 border-0" style="height: 30px;" data-bs-toggle="modal" data-bs-target="#abstrak<?= $row["id_skripsi"] ?>">
                                  <i class="mdi mdi-eye"></i> Lihat
                                </button>
                                <div class="modal fade" id="abstrak<?= $row["id_skripsi"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                      <div class="modal-header border-bottom-0 shadow">
                                        <h5 class="modal-title" id="exampleModalLabel">Abstrak <?= $row["nama_mahasiswa"] ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body text-center">
                                        <textarea class="form-control border-0 rounded-0 p-0" id="exampleFormControlTextarea1" style="height: 300px;line-height: 20px;" rows="3"><?= $row['abstrak'] ?></textarea>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <td><?= $row["kategori"] ?></td>
                              <td><?= $row["jenis_perangkat"] ?></td>
                              <td><?= $row["bahasa_pemrograman"] ?></td>
                              <td><?= $row["kelas"] ?></td>
                              <td class="d-flex justify-content-center">
                                <div class="col">
                                  <button type="button" class="btn btn-danger btn-sm text-white rounded-0 border-0" style="height: 30px;" data-bs-toggle="modal" data-bs-target="#hapus<?= $row["id_skripsi"] ?>">
                                    <i class="bi bi-trash3"></i>
                                  </button>
                                  <div class="modal fade" id="hapus<?= $row["id_skripsi"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header border-bottom-0 shadow">
                                          <h5 class="modal-title" id="exampleModalLabel">Hapus data <?= $row["nama"] ?></h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                          Anda yakin ingin menghapus data ini?
                                        </div>
                                        <div class="modal-footer justify-content-center border-top-0">
                                          <button type="button" class="btn btn-secondary btn-sm rounded-0 border-0" style="height: 30px;" data-bs-dismiss="modal">Batal</button>
                                          <form action="" method="POST">
                                            <input type="hidden" name="id_testing" value="<?= $row["id_testing"] ?>">
                                            <button type="submit" name="hapus-testing" class="btn btn-danger btn-sm rounded-0 text-white border-0" style="height: 30px;">Hapus</button>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </td>
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