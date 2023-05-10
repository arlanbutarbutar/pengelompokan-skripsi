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