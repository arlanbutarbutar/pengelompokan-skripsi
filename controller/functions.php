<?php
if (!isset($_SESSION["data-user"])) {
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
    $nama = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nama']))));
    $judul = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['judul']))));
    $abstrak = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['abstrak']))));
    $pembimbing = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['pembimbing']))));
    $penguji = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['penguji']))));
    $tahun = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['tahun']))));

    $checkNama = mysqli_query($conn, "SELECT * FROM skripsi WHERE nama_mahasiswa='$nama'");
    if (mysqli_num_rows($checkNama) > 0) {
      $_SESSION["message-danger"] = "Maaf, nama mahasiswa tersebut sudah ada.";
      $_SESSION["time-message"] = time();
      return false;
    }

    mysqli_query($conn, "INSERT INTO data_skripsi(nama_mahasiswa,judul,abstrak,pembimbing,penguji,tahun) VALUES('$nama','$judul','$abstrak','$pembimbing','$penguji','$tahun')");
    return mysqli_affected_rows($conn);
  }
  function edit_skripsi($data)
  {
    global $conn;
    $id_skripsi = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-skripsi']))));
    $nama = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nama']))));
    $namaOld = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['namaOld']))));
    $judul = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['judul']))));
    $abstrak = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['abstrak']))));
    $pembimbing = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['pembimbing']))));
    $penguji = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['penguji']))));
    $tahun = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['tahun']))));

    if ($nama != $namaOld) {
      $checkNama = mysqli_query($conn, "SELECT * FROM skripsi WHERE nama_mahasiswa='$nama'");
      if (mysqli_num_rows($checkNama) > 0) {
        $_SESSION["message-danger"] = "Maaf, nama mahasiswa tersebut sudah ada.";
        $_SESSION["time-message"] = time();
        return false;
      }
    }

    mysqli_query($conn, "UPDATE data_skripsi SET nama_mahasiswa='$nama', judul='$judul', abstrak='$abstrak',pembimbing='$pembimbing', penguji='$penguji', tahun='$tahun' WHERE id_skripsi='$id_skripsi'");
    return mysqli_affected_rows($conn);
  }
  function delete_skripsi($data)
  {
    global $conn;
    $id_skripsi = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-skripsi']))));
    mysqli_query($conn, "DELETE FROM klasifikasi WHERE id_skripsi='$id_skripsi'");
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
  function add_klasifikasi($data)
  {
    global $conn;
    $id_skripsi = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-skripsi']))));
    $id_kategori = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-kategori']))));
    mysqli_query($conn, "INSERT INTO klasifikasi(id_skripsi,id_kategori) VALUES('$id_skripsi','$id_kategori')");
    return mysqli_affected_rows($conn);
  }
  function edit_klasifikasi($data)
  {
    global $conn;
    $id_klasifikasi = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-klasifikasi']))));
    $id_skripsi = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-skripsi']))));
    $id_kategori = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-kategori']))));
    mysqli_query($conn, "UPDATE klasifikasi SET id_skripsi='$id_skripsi', id_kategori='$id_kategori' WHERE id_klasifikasi='$id_klasifikasi'");
    return mysqli_affected_rows($conn);
  }
  function delete_klasifikasi($data)
  {
    global $conn;
    $id_klasifikasi = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-klasifikasi']))));
    mysqli_query($conn, "DELETE FROM klasifikasi WHERE id_klasifikasi='$id_klasifikasi'");
    return mysqli_affected_rows($conn);
  }
}
