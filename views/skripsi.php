<?php require_once("../controller/script.php");
require_once("redirect.php");
$_SESSION["page-name"] = "Skripsi";
$_SESSION["page-url"] = "skripsi";
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
                      <h3>Skripsi</h3>
                    </li>
                  </ul>
                  <div>
                    <div class="btn-wrapper">
                      <a href="#" class="btn btn-primary text-white me-0" data-bs-toggle="modal" data-bs-target="#tambah"><i class="mdi mdi-plus"></i> Tambah</a>
                    </div>
                  </div>
                </div>
                <div class="card rounded-0 mt-3">
                  <div class="card-body table-responsive">
                    <table class="table table-striped table-hover table-borderless table-sm display" id="datatable">
                      <thead>
                        <tr>
                          <th scope="col" class="text-center">#</th>
                          <th scope="col" class="text-center">Nama Mahasiswa</th>
                          <th scope="col" class="text-center">Judul</th>
                          <th scope="col" class="text-center">Abstrak</th>
                          <th scope="col" class="text-center">Pembimbing</th>
                          <th scope="col" class="text-center">Penguji</th>
                          <th scope="col" class="text-center">Tahun</th>
                          <th scope="col" class="text-center">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if (mysqli_num_rows($data_skripsi) > 0) {
                          $no = 1;
                          while ($row = mysqli_fetch_assoc($data_skripsi)) { ?>
                            <tr>
                              <th scope="row"><?= $no; ?></th>
                              <td><?= $row["nama_mahasiswa"] ?></td>
                              <td><?= $row["judul"] ?></td>
                              <td><?= $row["abstrak"] ?></td>
                              <td><?= $row["pembimbing"] ?></td>
                              <td><?= $row["penguji"] ?></td>
                              <td><?= $row["tahun"] ?></td>
                              <td class="d-flex justify-content-center">
                                <div class="col">
                                  <button type="button" class="btn btn-warning btn-sm text-white rounded-0 border-0" style="height: 30px;" data-bs-toggle="modal" data-bs-target="#ubah<?= $row["id_skripsi"] ?>">
                                    <i class="bi bi-pencil-square"></i>
                                  </button>
                                  <div class="modal fade" id="ubah<?= $row["id_skripsi"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header border-bottom-0 shadow">
                                          <h5 class="modal-title" id="exampleModalLabel">Ubah data <?= $row["nama_mahasiswa"] ?></h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="" method="POST">
                                          <div class="modal-body text-center">
                                            <div class="mb-3">
                                              <label for="nama" class="form-label">Nama Mahasiswa <small class="text-danger">*</small></label>
                                              <input type="text" name="nama" value="<?= $row['nama_mahasiswa']?>" class="form-control text-center" id="nama" minlength="3" placeholder="Nama Mahasiswa" required>
                                            </div>
                                            <div class="mb-3">
                                              <label for="judul" class="form-label">Judul <small class="text-danger">*</small></label>
                                              <input type="text" name="judul" value="<?= $row['judul']?>" class="form-control text-center" id="judul" placeholder="Judul" required>
                                            </div>
                                            <div class="mb-3">
                                              <label for="abstrak" class="form-label">Abstrak <small class="text-danger">*</small></label>
                                              <textarea name="abstrak" value="<?= $row['abstrak']?>" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
                                            </div>
                                            <div class="mb-3">
                                              <label for="pembimbing" class="form-label">Pembimbing <small class="text-danger">*</small></label>
                                              <input type="text" name="pembimbing" value="<?= $row['pembimbing']?>" class="form-control text-center" id="pembimbing" placeholder="Pembimbing" required>
                                            </div>
                                            <div class="mb-3">
                                              <label for="penguji" class="form-label">Penguji <small class="text-danger">*</small></label>
                                              <input type="text" name="penguji" value="<?= $row['penguji']?>" class="form-control text-center" id="penguji" placeholder="Penguji" required>
                                            </div>
                                            <div class="mb-3">
                                              <label for="tahun" class="form-label">Tahun <small class="text-danger">*</small></label>
                                              <input type="number" name="tahun" value="<?= $row['tahun']?>" class="form-control text-center" id="tahun" placeholder="Tahun" required>
                                            </div>
                                          </div>
                                          <div class="modal-footer justify-content-center border-top-0">
                                            <input type="hidden" name="id-skripsi" value="<?= $row["id_skripsi"] ?>">
                                            <input type="hidden" name="namaOld" value="<?= $row["nama_mahasiswa"] ?>">
                                            <button type="button" class="btn btn-secondary btn-sm rounded-0 border-0" style="height: 30px;" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" name="ubah-skripsi" class="btn btn-warning btn-sm rounded-0 border-0" style="height: 30px;">Ubah</button>
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col">
                                  <button type="button" class="btn btn-danger btn-sm text-white rounded-0 border-0" style="height: 30px;" data-bs-toggle="modal" data-bs-target="#hapus<?= $row["id_skripsi"] ?>">
                                    <i class="bi bi-trash3"></i>
                                  </button>
                                  <div class="modal fade" id="hapus<?= $row["id_skripsi"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header border-bottom-0 shadow">
                                          <h5 class="modal-title" id="exampleModalLabel">Hapus data <?= $row["nama_mahasiswa"] ?></h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                          Anda yakin ingin menghapus data skripsi ini?
                                        </div>
                                        <div class="modal-footer justify-content-center border-top-0">
                                          <button type="button" class="btn btn-secondary btn-sm rounded-0 border-0" style="height: 30px;" data-bs-dismiss="modal">Batal</button>
                                          <form action="" method="POST">
                                            <input type="hidden" name="id-skripsi" value="<?= $row["id_skripsi"] ?>">
                                            <button type="submit" name="hapus-skripsi" class="btn btn-danger btn-sm rounded-0 text-white border-0" style="height: 30px;">Hapus</button>
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

        <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header border-bottom-0 shadow">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Skripsi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="" method="post">
                <div class="modal-body text-center">
                  <div class="mb-3">
                    <label for="nama" class="form-label">Nama Mahasiswa <small class="text-danger">*</small></label>
                    <input type="text" name="nama" class="form-control text-center" id="nama" minlength="3" placeholder="Nama Mahasiswa" required>
                  </div>
                  <div class="mb-3">
                    <label for="judul" class="form-label">Judul <small class="text-danger">*</small></label>
                    <input type="text" name="judul" class="form-control text-center" id="judul" placeholder="Judul" required>
                  </div>
                  <div class="mb-3">
                    <label for="abstrak" class="form-label">Abstrak <small class="text-danger">*</small></label>
                    <textarea name="abstrak" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="pembimbing" class="form-label">Pembimbing <small class="text-danger">*</small></label>
                    <input type="text" name="pembimbing" class="form-control text-center" id="pembimbing" placeholder="Pembimbing" required>
                  </div>
                  <div class="mb-3">
                    <label for="penguji" class="form-label">Penguji <small class="text-danger">*</small></label>
                    <input type="text" name="penguji" class="form-control text-center" id="penguji" placeholder="Penguji" required>
                  </div>
                  <div class="mb-3">
                    <label for="tahun" class="form-label">Tahun <small class="text-danger">*</small></label>
                    <input type="number" name="tahun" class="form-control text-center" id="tahun" placeholder="Tahun" required>
                  </div>
                </div>
                <div class="modal-footer border-top-0 justify-content-center">
                  <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Batal</button>
                  <button type="submit" name="tambah-skripsi" class="btn btn-primary btn-sm rounded-0">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <?php require_once("../resources/dash-footer.php") ?>
</body>

</html>