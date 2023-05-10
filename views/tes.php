<?php
// Data training
$training_data = array(
  array(
    'text' => 'Pengembangan Aplikasi E-Learning dengan Moodle pada Mata Kuliah Pemrograman Berorientasi Objek',
    'category' => 'Teknologi Informasi'
  ),
  array(
    'text' => 'Analisis Sentimen pada Tweet Menggunakan Metode Naive Bayes',
    'category' => 'Teknologi Informasi'
  ),
  array(
    'text' => 'Pemanfaatan Internet of Things pada Sistem Monitoring Kualitas Air Sungai',
    'category' => 'Teknik Lingkungan'
  ),
  array(
    'text' => 'Penerapan Metode Decision Tree pada Analisis Prediksi Mahasiswa Lulus Tepat Waktu',
    'category' => 'Pendidikan'
  ),
  array(
    'text' => 'Perancangan Sistem Informasi Geografis untuk Pemetaan Wisata Pantai di Bali',
    'category' => 'Teknik Informatika'
  )
);

// Kategori yang akan diklasifikasikan
$category_to_classify = 'Teknologi Informasi';

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
  $words = explode(' ', strtolower($data['text']));
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

// Data testing
$testing_data = array(
  array(
    'text' => 'Penerapan Internet of Things pada Sistem Pemantauan Lingkungan',
    'category' => 'Teknologi Informasi'
  ),
  array(
    'text' => 'Perancangan Aplikasi E-Learning Berbasis Web dengan PHP dan MySQL',
    'category' => 'Teknologi Informasi'
  ),
  array(
    'text' => 'Analisis Sentimen pada Ulasan Film Menggunakan Metode Naive Bayes',
    'category' => 'Teknologi Informasi'
  ),
);

// Klasifikasi data testing
foreach ($testing_data as $data) {
  $max_probability = 0;
  $predicted_category = '';
  foreach ($category_probabilities as $category => $category_probability) {
    $words = explode(' ', strtolower($data['text']));
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
}

// Hitung akurasi
$correct_count = 0;
foreach ($testing_data as $data) {
  if ($data['category'] === $category_to_classify) {
    $correct_count++;
  }
}
$accuracy = $correct_count / count($testing_data) * 100;

// Tampilkan hasil klasifikasi dan akurasi
echo "Hasil klasifikasi:<br>";
foreach ($testing_data as $data) {
  echo "Text: " . $data['text'] . "<br>";
  echo "Predicted category: " . $data['category'] . "<br><br>";
}
echo "Akurasi: " . $accuracy . "%<br>";


// // Mengambil data dari tabel
// $training = "SELECT data_skripsi.abstrak, kategori.kategori FROM klasifikasi JOIN data_skripsi ON klasifikasi.id_skripsi=data_skripsi.id_skripsi JOIN kategori ON klasifikasi.id_kategori=kategori.id_kategori";
// $training_result = $conn->query($training);

// // Data training
// $training_data = array();
// if ($training_result->num_rows > 0) {
// while ($training_row = $training_result->fetch_assoc()) {
// $training_data[] = array('abstrak' => $training_row['abstrak'], 'kategori' => $training_row['kategori']);
// }
// }

// // Mengambil data dari tabel
// $klasifikasi = "SELECT * FROM data_skripsi";
// $klasifikasi_result = $conn->query($klasifikasi);

// // Data uji
// $uji_data = array(
// 'abstrak' => 'penelitian ini membahas tentang dampak penggunaan teknologi terhadap kesehatan',
// // 'abstrak' => 'penelitian ini membahas tentang dampak penggunaan teknologi terhadap sosial',
// // 'abstrak' => 'penelitian ini membahas tentang dampak penggunaan teknologi terhadap lingkungan',
// );

// // Hitung jumlah dokumen pada setiap kategori
// $total_dokumen = count($training_data);
// $jumlah_dokumen_kategori = array();
// foreach ($training_data as $data) {
// $kategori = $data['kategori'];
// if (!isset($jumlah_dokumen_kategori[$kategori])) {
// $jumlah_dokumen_kategori[$kategori] = 0;
// }
// $jumlah_dokumen_kategori[$kategori]++;
// }

// // Hitung jumlah kata pada setiap kategori
// $jumlah_kata_kategori = array();
// foreach ($training_data as $data) {
// $kategori = $data['kategori'];
// $abstrak = $data['abstrak'];
// $kata = explode(' ', $abstrak);
// foreach ($kata as $k) {
// if (!isset($jumlah_kata_kategori[$kategori][$k])) {
// $jumlah_kata_kategori[$kategori][$k] = 0;
// }
// $jumlah_kata_kategori[$kategori][$k]++;
// }
// }

// // Hitung probabilitas prior untuk setiap kategori
// $prior = array();
// foreach ($jumlah_dokumen_kategori as $kategori => $jumlah) {
// $prior[$kategori] = $jumlah / $total_dokumen;
// }

// // Hitung likelihood untuk setiap kata pada setiap kategori
// $likelihood = array();
// foreach ($jumlah_kata_kategori as $kategori => $jumlah_kata) {
// $total_kata_kategori = array_sum($jumlah_kata);
// foreach ($jumlah_kata as $kata => $jumlah) {
// $likelihood[$kategori][$kata] = ($jumlah + 1) / ($total_kata_kategori + count($jumlah_kata));
// }
// }

// // Hitung posterior untuk setiap kategori
// $posterior = array();
// $abstrak_uji = $uji_data['abstrak'];
// $kata_uji = explode(' ', $abstrak_uji);
// foreach ($jumlah_dokumen_kategori as $kategori => $jumlah) {
// $posterior[$kategori] = $prior[$kategori];
// foreach ($kata_uji as $kata) {
// if (isset($likelihood[$kategori][$kata])) {
// $posterior[$kategori] *= $likelihood[$kategori][$kata];
// }
// }
// }

// // Tentukan kategori dengan posterior tertinggi
// $kategori_tertinggi = '';
// $nilai_tertinggi = 0;
// foreach ($posterior as $kategori => $nilai) {
// if ($nilai > $nilai_tertinggi) {
// $kategori_tertinggi = $kategori;
// $nilai_tertinggi = $nilai;
// }
// }

// // Tampilkan hasil klasifikasi
// echo "Abstrak uji: " . $abstrak_uji . "<br>";
// echo "Kategori terklasifikasi: " . $kategori_tertinggi . "<br>";
// echo "Nilai posterior: " . $nilai_tertinggi . "<br>";











if (isset($_SESSION['data-search'])) { ?>
  <div class="row">
    <div class="col-md-12">
      <?php
      $skripsi_search = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_SESSION['data-search']['skripsi']))));
      $category_search = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_SESSION['data-search']['kategori']))));

      // Mengambil data dari tabel skripsi
      $training = "SELECT data_skripsi.abstrak FROM data_skripsi WHERE id_skripsi='$skripsi_search'";
      $training_result = $conn->query($training);

      // Data training
      $training_data = array();
      if ($training_result->num_rows > 0) {
        while ($training_row = $training_result->fetch_assoc()) {
          $training_data[] = array('abstrak' => $training_row['abstrak'], 'category' => $category_search);
        }
      }

      // Mengambil data dari tabel kategori
      $kategori = "SELECT * FROM kategori";
      $kategori_result = $conn->query($kategori);

      // Data kategori
      $kategori_data = array();
      if ($kategori_result->num_rows > 0) {
        while ($kategori_row = $kategori_result->fetch_assoc()) {
          $kategori_data[] = array('category' => $kategori_row['kategori']);
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
      $testing = "SELECT * FROM data_skripsi WHERE id_skripsi='$skripsi_search'";
      $testing_result = $conn->query($testing);

      // Data testing
      $testing_data = array();
      if ($testing_result->num_rows > 0) {
        while ($testing_row = $testing_result->fetch_assoc()) {
          $testing_data[] = array(
            'id_skripsi' => $testing_row['id_skripsi'],
            'nim' => $testing_row['nim'],
            'nama_mahasiswa' => $testing_row['nama_mahasiswa'],
            'judul' => $testing_row['judul'],
            'abstrak' => $testing_row['abstrak'],
            'pembimbing_satu' => $testing_row['pembimbing_satu'],
            'pembimbing_dua' => $testing_row['pembimbing_dua'],
            'penguji_satu' => $testing_row['penguji_satu'],
            'penguji_dua' => $testing_row['penguji_dua'],
            'tahun' => $testing_row['tahun'],
            'category' => ''
          );
        }
      }

      // Klasifikasi data testing
      ?>
      <div class="card border-0 rounded-0 shadow">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
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
                    $data_category[] = array('category' => $predicted_category);
                    $id_skripsi = $data['id_skripsi'];
                    $kategori = $predicted_category;
                    mysqli_query($conn, "INSERT INTO klasifikasi(id_skripsi,kategori) VALUES('$id_skripsi','$kategori')");
                  ?>
                    <tr>
                      <th scope="row"><?= $no++; ?></th>
                      <td>
                        <button type="button" class="btn btn-link btn-sm rounded-0 border-0" data-bs-toggle="modal" data-bs-target="#data-skripsi<?= $data["id_skripsi"] ?>">
                          <?= $data["nim"] . " - " . $data["nama_mahasiswa"] ?>
                        </button>
                        <div class="modal fade" id="data-skripsi<?= $data["id_skripsi"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header border-bottom-0 shadow">
                                <h5 class="modal-title" id="exampleModalLabel"><?= $data["nim"] . " - " . $data["nama_mahasiswa"] ?></h5>
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
                                        <p><?= $data['judul'] ?></p>
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
                                        <p><?= $data['pembimbing_satu'] ?></p>
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
                                        <p><?= $data['pembimbing_dua'] ?></p>
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
                                        <p><?= $data['penguji_satu'] ?></p>
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
                                        <p><?= $data['penguji_dua'] ?></p>
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
                                        <p><?= $data['tahun'] ?></p>
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
                                        <textarea class="form-control rounded-0 border-0" readonly style="background: none;height: 100%;line-height: 20px;padding: 0;cursor: pointer;" cols="30" rows="10"><?= $data['abstrak'] ?></textarea>
                                      </th>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td class="text-center"><?= $predicted_category ?></td>
                    </tr>
                  <?php
                  } ?>
                </tbody>
              </table>
            </div>
            <div class="col-lg-6">
              <?php
              // Hitung akurasi
              $correct_count = 0;
              foreach ($testing_data as $data) {
                if ($data['category'] === $category_to_classify) {
                  $correct_count++;
                }
              }
              $accuracy = $correct_count / count($testing_data) * 100;

              // Tampilkan hasil klasifikasi dan akurasi
              echo "Akurasi: " . $accuracy . "%";
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>



// // Contoh prediksi
// $abstrak = "penerapan algoritma clustering pada big data";
// $kelas = $nb->predict([$abstrak]);

// echo "Abstrak: $abstrak\n";
// echo "Kelas: $kelas[0]\n";