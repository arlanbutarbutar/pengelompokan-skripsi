<?php require_once("../controller/script.php"); ?>

<div class="row">

  <!-- Tab panes -->
  <div class="col-md-12 mt-3">
    <h2>Pengelompokan Skripsi</h2>
    <div class="col-10">
      <div class="card border-0 rounded-0">
        <div class="card-body">
          <h3>Pengelompokan Topik Skripsi Mahasiswa Ilmu Komputer UNWIRA (Metode Naive Bayes Classifier)</h3>
          <p>Sistem ini bertujuan untuk mengelompokan topik skripsi berdasarkan abstrak dengan menggunakan Metode Naive Bayes Classifier. Dengan adanya aplikasi ini diharapkan mampu membantu pegawai dan mahasiswa dalam pengarsipan dan pengelompokan skripsi, sehingga mahasiswa tidak kesulitan dalam mencari rujukan dan referensi yang terkait dengan penelitiannya.</p>
        </div>
      </div>
    </div>
  </div>

</div>

<script src="../assets/datatable/datatables.js"></script>
<script>
  $(document).ready(function() {
    $("#datatable").DataTable();
  });
</script>
<script>
  (function() {
    function scrollH(e) {
      e.preventDefault();
      e = window.event || e;
      let delta = Math.max(-1, Math.min(1, (e.wheelDelta || -e.detail)));
      document.querySelector(".table-responsive").scrollLeft -= (delta * 40);
    }
    if (document.querySelector(".table-responsive").addEventListener) {
      document.querySelector(".table-responsive").addEventListener("mousewheel", scrollH, false);
      document.querySelector(".table-responsive").addEventListener("DOMMouseScroll", scrollH, false);
    }
  })();
</script>