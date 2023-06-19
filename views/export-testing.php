<?php require_once("../controller/script.php");
require_once("redirect.php");
$_SESSION['page-name'] = "Export Data Testing";
$_SESSION['page-url'] = "export-testing";

$data = mysqli_query($conn, "SELECT skripsi.*, kelas.kelas FROM skripsi JOIN testing ON skripsi.id_skripsi=testing.id_skripsi JOIN kelas ON testing.id_kelas=kelas.id_kelas");
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Testing Klasifikasi Skripsi.xls");
?>

<center>
  <h3>Data Testing Klasifikasi Skripsi Program Studi Ilmu Komputer UNWIRA</h3>
</center>
<table border="1">
  <thead>
    <tr>
      <th>No</th>
      <th>NIM</th>
      <th>Nama</th>
      <th>Judul</th>
      <th style="width: 400px;">Abstrak</th>
      <th>Kategori</th>
      <th>Jenis Perangkat</th>
      <th>Bhs. Pemrograman</th>
      <th>Pembimbing 1</th>
      <th>Pembimbing 2</th>
      <th>Penguji 1</th>
      <th>Penguji 2</th>
      <th>Tahun</th>
    </tr>
  </thead>
  <tbody>
    <?php if (mysqli_num_rows($data) == 0) { ?>
      <tr>
        <th colspan="13">Belum ada data.</th>
      </tr>
      <?php }
    $no = 1;
    if (mysqli_num_rows($data) > 0) {
      while ($row = mysqli_fetch_assoc($data)) { ?>
        <tr>
          <th scope="row"><?= $no++ ?></th>
          <td><?= $row["nim"] ?></td>
          <td><?= $row["nama"] ?></td>
          <td><?= $row["judul"] ?></td>
          <td><?= $row["abstrak"] ?></td>
          <td><?= $row["kategori"] ?></td>
          <td><?= $row["jenis_perangkat"] ?></td>
          <td><?= $row["bahasa_pemrograman"] ?></td>
          <td><?= $row["pembimbing_satu"] ?></td>
          <td><?= $row["pembimbing_dua"] ?></td>
          <td><?= $row["penguji_satu"] ?></td>
          <td><?= $row["penguji_dua"] ?></td>
          <td><?= $row["tahun"] ?></td>
      <?php }
    } ?>
  </tbody>
</table>