<?php
// Mengimpor library PHP-ML
require_once 'vendor/autoload.php';

use Phpml\Classification\NaiveBayes;

// Data latih
$X = array(
  array(5.1, 3.5, 1.4, 0.2),
  array(4.9, 3.0, 1.4, 0.2),
  array(4.7, 3.2, 1.3, 0.2),
  // ... dan seterusnya
);

// Label data latih
$y = array(
  'setosa', 'setosa', 'setosa',
  // ... dan seterusnya
);

// Membuat objek model Naive Bayes
$nb = new NaiveBayes();
$nb->train($X, $y);
