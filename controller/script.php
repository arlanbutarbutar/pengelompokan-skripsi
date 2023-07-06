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
  if (isset($_POST['daftar'])) {
    if (daftar($_POST) > 0) {
      $_SESSION['message-success'] = "Akun telah terdaftar, silakan cek email anda untuk memverifikasi akun.";
      $_SESSION['time-message'] = time();
      header("Location: ./");
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

  $skripsi = mysqli_query($conn, "SELECT skripsi.*, kelas.kelas FROM skripsi JOIN training ON skripsi.id_skripsi=training.id_skripsi JOIN kelas ON training.id_kelas=kelas.id_kelas");
  $kelas = mysqli_query($conn, "SELECT * FROM kelas");
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

  $kelas = mysqli_query($conn, "SELECT * FROM kelas");
  if (isset($_POST["tambah-kelas"])) {
    if (add_kelas($_POST) > 0) {
      $_SESSION["message-success"] = "Data kelas berhasil ditambahkan.";
      $_SESSION["time-message"] = time();
      header("Location: " . $_SESSION["page-url"]);
      exit();
    }
  }
  if (isset($_POST["ubah-kelas"])) {
    if (edit_kelas($_POST) > 0) {
      $_SESSION["message-success"] = "Data kelas berhasil diubah.";
      $_SESSION["time-message"] = time();
      header("Location: " . $_SESSION["page-url"]);
      exit();
    }
  }
  if (isset($_POST["hapus-kelas"])) {
    if (delete_kelas($_POST) > 0) {
      $_SESSION["message-success"] = "Data kelas berhasil dihapus.";
      $_SESSION["time-message"] = time();
      header("Location: " . $_SESSION["page-url"]);
      exit();
    }
  }

  if (isset($_POST['data-uji'])) {
    $nim = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_POST['nim']))));
    $nama = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_POST['nama']))));
    $judul = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_POST['judul']))));
    $abstrak = $_POST['abstrak'];
    $kategori = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_POST['kategori']))));
    $jenis_perangkat = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_POST['jenis_perangkat']))));
    $bahasa_pemrograman = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_POST['bahasa_pemrograman']))));
    $pembimbing_satu = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_POST['pembimbing_satu']))));
    $pembimbing_dua = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_POST['pembimbing_dua']))));
    $penguji_satu = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_POST['penguji_satu']))));
    $penguji_dua = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_POST['penguji_dua']))));
    $tahun = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_POST['tahun']))));
    $_SESSION['data-klasifikasi'] = [
      'nim' => $nim,
      'nama' => $nama,
      'judul' => $judul,
      'abstrak' => $abstrak,
      'kategori' => $kategori,
      'jenis_perangkat' => $jenis_perangkat,
      'bahasa_pemrograman' => $bahasa_pemrograman,
      'pembimbing_satu' => $pembimbing_satu,
      'pembimbing_dua' => $pembimbing_dua,
      'penguji_satu' => $penguji_satu,
      'penguji_dua' => $penguji_dua,
      'tahun' => $tahun,
    ];
    $checkNIM = mysqli_query($conn, "SELECT * FROM skripsi WHERE nim='$nim'");
    if (mysqli_num_rows($checkNIM) > 0) {
      $_SESSION["message-info"] = "Skripsi (" . $nim . ") " . $nama . " sudah di uji.";
      $_SESSION["time-message"] = time();
      return false;
    } else {
      header("Location: klasifikasi?to=data-training");
      exit();
    }
  }
  if (isset($_SESSION['data-klasifikasi'])) {
    $data_training = mysqli_query($conn, "SELECT * FROM training JOIN skripsi ON training.id_skripsi=skripsi.id_skripsi JOIN kelas ON training.id_kelas=kelas.id_kelas");
  }
  if (isset($_POST['reset-hitung'])) {
    unset($_SESSION['data-klasifikasi']);
    header("Location: klasifikasi");
    exit();
  }

  $dataTraining = mysqli_query($conn, "SELECT skripsi.*, kelas.kelas FROM skripsi JOIN training ON skripsi.id_skripsi=training.id_skripsi JOIN kelas ON training.id_kelas=kelas.id_kelas");
  $dataTesting = mysqli_query($conn, "SELECT skripsi.*, kelas.kelas, testing.id_testing FROM skripsi JOIN testing ON skripsi.id_skripsi=testing.id_skripsi JOIN kelas ON testing.id_kelas=kelas.id_kelas");
  if (isset($_POST["hapus-testing"])) {
    if (delete_testing($_POST) > 0) {
      $_SESSION["message-success"] = "Data testing berhasil dihapus.";
      $_SESSION["time-message"] = time();
      header("Location: " . $_SESSION["page-url"]);
      exit();
    }
  }
}
