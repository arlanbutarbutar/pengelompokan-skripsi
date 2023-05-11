<?php
if (!isset($_SESSION["data-user"])) {
  function daftar($data)
  {
    global $conn;
    $username = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['username']))));
    $email = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['email']))));
    $checkMail = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($checkMail) > 0) {
      $_SESSION['message-danger'] = "Maaf, akun yang kamu masukan sudah terdaftar.";
      $_SESSION['time-message'] = time();
      return false;
    }
    $password = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['password']))));
    $re_password = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['re-password']))));
    if ($password != $re_password) {
      $_SESSION['message-danger'] = "Maaf, kata sandi tidak sama.";
      $_SESSION['time-message'] = time();
      return false;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);

    $en_user = crc32($email);
    require("mail.php");
    $to       = $email;
    $subject  = 'Verifikasi Akun Pengelompokan Skripsi kamu sekarang!!';
    $message  = "<!doctype html>
      <html>
        <head>
          <meta name='viewport' content='width=device-width'>
          <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
          <title>Verifikasi Akun</title>
        </head>
        <body>
          <p>Selamat akun anda sudah terdaftar, tinggal satu langkah lagi anda sudah bisa menggunakan akun anda. Silakan verifikasi sekarang dengan mengklik tautan di bawah ini.</p>
          <a href='http://127.0.0.1:1010/apps/pengelompokan-skripsi/auth/index?auth=" . $password . "&crypt=" . $en_user . "' target='_blank' style='background-color: #ffffff; border: solid 1px #000; border-radius: 5px; box-sizing: border-box; cursor: pointer; display: inline-block; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-decoration: none; text-transform: capitalize; border-color: #000; color: #000;'>Verifikasi Sekarang</a>
        </body>
      </html>";
    smtp_mail($to, $subject, $message, '', '', 0, 0, true);

    mysqli_query($conn, "INSERT INTO users(en_user,username,email,password) VALUES('$en_user','$username','$email','$password')");
    return mysqli_affected_rows($conn);
  }
  function masuk($data)
  {
    global $conn;
    $email = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data["email"]))));
    $password = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data["password"]))));

    // check account
    $checkAccount = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($checkAccount) == 0) {
      $_SESSION["message-danger"] = "Maaf, akun yang anda masukan belum terdaftar.";
      $_SESSION["time-message"] = time();
      return false;
    } else if (mysqli_num_rows($checkAccount) > 0) {
      $row = mysqli_fetch_assoc($checkAccount);
      if (password_verify($password, $row["password"])) {
        $_SESSION["data-user"] = [
          "id" => $row["id_user"],
          "role" => $row["id_role"],
          "email" => $row["email"],
          "username" => $row["username"],
        ];
      } else {
        $_SESSION["message-danger"] = "Maaf, kata sandi yang anda masukan salah.";
        $_SESSION["time-message"] = time();
        return false;
      }
    }
  }
}
if (isset($_SESSION["data-user"])) {
  function edit_profile($data)
  {
    global $conn, $idUser;
    $username = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data["username"]))));
    $password = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data["password"]))));
    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($conn, "UPDATE users SET username='$username', password='$password' WHERE id_user='$idUser'");
    return mysqli_affected_rows($conn);
  }
  function add_user($data)
  {
    global $conn;
    $username = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data["username"]))));
    $email = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data["email"]))));
    $checkEmail = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($checkEmail) > 0) {
      $_SESSION["message-danger"] = "Maaf, email yang anda masukan sudah terdaftar.";
      $_SESSION["time-message"] = time();
      return false;
    }
    $password = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data["password"]))));
    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO users(username,email,password) VALUES('$username','$email','$password')");
    return mysqli_affected_rows($conn);
  }
  function edit_user($data)
  {
    global $conn;
    $id_user = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data["id-user"]))));
    $username = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data["username"]))));
    $email = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data["email"]))));
    $emailOld = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data["emailOld"]))));
    if ($email != $emailOld) {
      $checkEmail = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
      if (mysqli_num_rows($checkEmail) > 0) {
        $_SESSION["message-danger"] = "Maaf, email yang anda masukan sudah terdaftar.";
        $_SESSION["time-message"] = time();
        return false;
      }
    }
    mysqli_query($conn, "UPDATE users SET username='$username', email='$email', updated_at=CURRENT_TIMESTAMP WHERE id_user='$id_user'");
    return mysqli_affected_rows($conn);
  }
  function delete_user($data)
  {
    global $conn;
    $id_user = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data["id-user"]))));
    mysqli_query($conn, "DELETE FROM users WHERE id_user='$id_user'");
    return mysqli_affected_rows($conn);
  }
  function add_skripsi($data)
  {
    global $conn;
    $nim = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nim']))));
    $nama = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nama']))));
    $judul = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['judul']))));
    $abstrak = $data['abstrak'];
    $pembimbing_satu = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['pembimbing_satu']))));
    $pembimbing_dua = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['pembimbing_dua']))));
    $penguji_satu = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['penguji_satu']))));
    $penguji_dua = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['penguji_dua']))));
    $tahun = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['tahun']))));
    $kategori = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['kategori']))));

    $checkNIM = mysqli_query($conn, "SELECT * FROM data_skripsi WHERE nim='$nim'");
    if (mysqli_num_rows($checkNIM) > 0) {
      $_SESSION["message-danger"] = "Maaf, NIM mahasiswa tersebut sudah ada.";
      $_SESSION["time-message"] = time();
      return false;
    }

    mysqli_query($conn, "INSERT INTO data_skripsi(nim,nama_mahasiswa,judul,abstrak,kategori,pembimbing_satu,pembimbing_dua,penguji_satu,penguji_dua,tahun) VALUES('$nim','$nama','$judul','$abstrak','$kategori','$pembimbing_satu','$pembimbing_dua','$penguji_satu','$penguji_dua','$tahun')");
    return mysqli_affected_rows($conn);
  }
  function edit_skripsi($data)
  {
    global $conn;
    $id_skripsi = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id_skripsi']))));
    $nim = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nim']))));
    $nimOld = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nimOld']))));
    $nama = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nama']))));
    $judul = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['judul']))));
    $abstrak = $data['abstrak'];
    $pembimbing_satu = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['pembimbing_satu']))));
    $pembimbing_dua = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['pembimbing_dua']))));
    $penguji_satu = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['penguji_satu']))));
    $penguji_dua = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['penguji_dua']))));
    $tahun = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['tahun']))));
    $kategori = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['kategori']))));

    if ($nim != $nimOld) {
      $checkNIM = mysqli_query($conn, "SELECT * FROM data_skripsi WHERE nim='$nim'");
      if (mysqli_num_rows($checkNIM) > 0) {
        $_SESSION["message-danger"] = "Maaf, NIM mahasiswa tersebut sudah ada.";
        $_SESSION["time-message"] = time();
        return false;
      }
    }

    mysqli_query($conn, "UPDATE data_skripsi SET nim='$nim', nama_mahasiswa='$nama', judul='$judul', abstrak='$abstrak', kategori='$kategori', pembimbing_satu='$pembimbing_satu', pembimbing_dua='$pembimbing_dua', penguji_satu='$penguji_satu', penguji_dua='$penguji_dua', tahun='$tahun' WHERE id_skripsi='$id_skripsi'");
    return mysqli_affected_rows($conn);
  }
  function delete_skripsi($data)
  {
    global $conn;
    $id_skripsi = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id_skripsi']))));
    mysqli_query($conn, "DELETE FROM data_skripsi WHERE id_skripsi='$id_skripsi'");
    return mysqli_affected_rows($conn);
  }
  function add_kategori($data)
  {
    global $conn;
    $kategori = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['kategori']))));
    $checkKategori = mysqli_query($conn, "SELECT * FROM kategori WHERE kategori='$kategori'");
    if (mysqli_num_rows($checkKategori) > 0) {
      $_SESSION["message-danger"] = "Maaf, nama kategori sudah ada.";
      $_SESSION["time-message"] = time();
      return false;
    }

    mysqli_query($conn, "INSERT INTO kategori(kategori) VALUES('$kategori')");
    return mysqli_affected_rows($conn);
  }
  function edit_kategori($data)
  {
    global $conn;
    $id_kategori = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-kategori']))));
    $kategori = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['kategori']))));
    $kategoriOld = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['kategoriOld']))));
    if ($kategori != $kategoriOld) {
      $checkKategori = mysqli_query($conn, "SELECT * FROM kategori WHERE kategori='$kategori'");
      if (mysqli_num_rows($checkKategori) > 0) {
        $_SESSION["message-danger"] = "Maaf, nama kategori sudah ada.";
        $_SESSION["time-message"] = time();
        return false;
      }
    }

    mysqli_query($conn, "UPDATE kategori SET kategori='$kategori' WHERE id_kategori='$id_kategori'");
    return mysqli_affected_rows($conn);
  }
  function delete_kategori($data)
  {
    global $conn;
    $id_kategori = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-kategori']))));
    mysqli_query($conn, "DELETE FROM klasifikasi WHERE id_kategori='$id_kategori'");
    mysqli_query($conn, "DELETE FROM kategori WHERE id_kategori='$id_kategori'");
    return mysqli_affected_rows($conn);
  }
}
