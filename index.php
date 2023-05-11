<?php require_once("controller/script.php") ?>

<!DOCTYPE html>
<html>

<head>
  <?php require_once("resources/header.php") ?>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <?php require_once("resources/navbar.php") ?>
    <!-- end header section -->
    <!-- slider section -->
    <section class=" slider_section position-relative">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-md-4 offset-md-1">
            <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
                  01
                </li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1">
                  02
                </li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2">
                  03
                </li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3">
                  04
                </li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <div class="img-box b-1">
                    <img src="assets/images/slider-1.png" style="margin-left: -50px;" alt="" />
                  </div>
                </div>
              </div>
              <div class="carousel_btn-box">
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
          </div>
          <div class=" col-md-5 offset-md-1">
            <div class="detail-box">
              <h2 style="font-size: 60px;">
                Skripsi <br>
                Ilmu Komputer
              </h2>
              <p>
                Aplikasi Pengelompokan Skripsi
              </p>

              <div class="btn-box">
                <a href="auth/" class="btn-1">
                  Cari Skripsi
                </a>
                <a href="tentang" class="btn-2">
                  Lebih Detail
                </a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end slider section -->
  </div>

  <?php require_once("resources/footer.php") ?>

</body>

</html>