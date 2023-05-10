<?php if (!isset($_SESSION[""])) {
  session_start();
}
error_reporting(~E_NOTICE & ~E_DEPRECATED);
require_once("db_connect.php");
require_once("functions.php");
if (isset($_SESSION["time-message"])) {
  if ((time() - $_SESSION["time-message"]) > 2) {
    if (isset($_SESSION["message-success"])) {
      unset($_SESSION["message-success"]);
    }
    if (isset($_SESSION["message-info"])) {
      unset($_SESSION["message-info"]);
    }
    if (isset($_SESSION["message-warning"])) {
      unset($_SESSION["message-warning"]);
    }
    if (isset($_SESSION["message-danger"])) {
      unset($_SESSION["message-danger"]);
    }
    if (isset($_SESSION["message-dark"])) {
      unset($_SESSION["message-dark"]);
    }
    unset($_SESSION["time-alert"]);
  }
}

$baseURL = "http://$_SERVER[HTTP_HOST]/apps/pengelompokan-skripsi/";

if (!isset($_SESSION["data-user"])) {
  if (isset($_POST["masuk"])) {
    if (masuk($_POST) > 0) {
      header("Location: ../views/");
      exit();
    }
  }
}

if (isset($_SESSION["data-user"])) {
  $idUser = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_SESSION["data-user"]["id"]))));

  $profile = mysqli_query($conn, "SELECT * FROM users WHERE id_user='$idUser'");
  if (isset($_POST["ubah-profile"])) {
    if (edit_profile($_POST) > 0) {
      $_SESSION["message-success"] = "Profil akun anda berhasil di ubah.";
      $_SESSION["time-message"] = time();
      header("Location: " . $_SESSION["page-url"]);
      exit();
    }
  }

  $users = mysqli_query($conn, "SELECT * FROM users WHERE id_user!='$idUser' ORDER BY id_user DESC");
  if (isset($_POST["tambah-user"])) {
    if (add_user($_POST) > 0) {
      $_SESSION["message-success"] = "Pengguna " . $_POST["username"] . " berhasil ditambahkan.";
      $_SESSION["time-message"] = time();
      header("Location: " . $_SESSION["page-url"]);
      exit();
    }
  }
  if (isset($_POST["ubah-user"])) {
    if (edit_user($_POST) > 0) {
      $_SESSION["message-success"] = "Pengguna " . $_POST["usernameOld"] . " berhasil diubah.";
      $_SESSION["time-message"] = time();
      header("Location: " . $_SESSION["page-url"]);
      exit();
    }
  }
  if (isset($_POST["hapus-user"])) {
    if (delete_user($_POST) > 0) {
      $_SESSION["message-success"] = "Pengguna " . $_POST["username"] . " berhasil dihapus.";
      $_SESSION["time-message"] = time();
      header("Location: " . $_SESSION["page-url"]);
      exit();
    }
  }

  $data_skripsi = mysqli_query($conn, "SELECT * FROM data_skripsi");
  if (isset($_POST["tambah-skripsi"])) {
    if (add_skripsi($_POST) > 0) {
      $_SESSION["message-success"] = "Data skripsi berhasil ditambahkan.";
      $_SESSION["time-message"] = time();
      header("Location: " . $_SESSION["page-url"]);
      exit();
    }
  }
  if (isset($_POST["ubah-skripsi"])) {
    if (edit_skripsi($_POST) > 0) {
      $_SESSION["message-success"] = "Data skripsi berhasil diubah.";
      $_SESSION["time-message"] = time();
      header("Location: " . $_SESSION["page-url"]);
      exit();
    }
  }
  if (isset($_POST["hapus-skripsi"])) {
    if (delete_skripsi($_POST) > 0) {
      $_SESSION["message-success"] = "Data skripsi berhasil dihapus.";
      $_SESSION["time-message"] = time();
      header("Location: " . $_SESSION["page-url"]);
      exit();
    }
  }

  $kategori = mysqli_query($conn, "SELECT * FROM kategori");
  if (isset($_POST["tambah-kategori"])) {
    if (add_kategori($_POST) > 0) {
      $_SESSION["message-success"] = "Data kategori berhasil ditambahkan.";
      $_SESSION["time-message"] = time();
      header("Location: " . $_SESSION["page-url"]);
      exit();
    }
  }
  if (isset($_POST["ubah-kategori"])) {
    if (edit_kategori($_POST) > 0) {
      $_SESSION["message-success"] = "Data kategori berhasil diubah.";
      $_SESSION["time-message"] = time();
      header("Location: " . $_SESSION["page-url"]);
      exit();
    }
  }
  if (isset($_POST["hapus-kategori"])) {
    if (delete_kategori($_POST) > 0) {
      $_SESSION["message-success"] = "Data kategori berhasil dihapus.";
      $_SESSION["time-message"] = time();
      header("Location: " . $_SESSION["page-url"]);
      exit();
    }
  }

  $mahasiswaSkripsi = mysqli_query($conn, "SELECT MIN(`id_skripsi`) AS `id_skripsi`, `nim`, `nama_mahasiswa`, `judul`, `abstrak`, `pembimbing_satu`, `pembimbing_dua`, `penguji_satu`, `penguji_dua`, `tahun` FROM `data_skripsi` GROUP BY `tahun`");
  if (isset($_POST['seleksi'])) {
    $tahun = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_POST['tahun']))));
    $_SESSION['data-klasifikasi'] = ['tahun' => $tahun];
    header("Location: klasifikasi?to=dataset");
    exit();
  }

  if(isset($_SESSION['data-klasifikasi'])){
    $tahun=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_SESSION['data-klasifikasi']['tahun']))));
    $dataset = mysqli_query($conn, "SELECT * FROM data_skripsi WHERE tahun='$tahun'");
  }

  $klasifikasi = mysqli_query($conn, "SELECT * FROM klasifikasi JOIN seleksi ON klasifikasi.id_seleksi=seleksi.id_seleksi JOIN data_skripsi ON seleksi.id_skripsi=data_skripsi.id_skripsi");
}
