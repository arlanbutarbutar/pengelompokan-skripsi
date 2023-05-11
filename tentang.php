<?php require_once("controller/script.php") ?>

<!DOCTYPE html>
<html>

<head>
  <?php require_once("resources/header.php") ?>
</head>

<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
    <?php require_once("resources/navbar.php") ?>
    <!-- end header section -->
  </div>

  <!-- about section -->
  <section class="about_section layout_margin">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-5 offset-md-1">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                About <br>
                Our <br>
                Ilkom
              </h2>
              <hr>
            </div>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae molestias placeat assumenda fugit, ut at alias dolor sapiente similique! Accusamus ea nihil non dolore tempora perspiciatis eum inventore. Modi voluptas iste vero voluptatem ducimus doloribus sequi error? Dolorum quia nesciunt incidunt dicta voluptate maiores molestias repellat assumenda, repellendus mollitia perspiciatis.
            </p>
          </div>
        </div>
        <div class="col-md-6 px-0">
          <div class="img-box">
            <img src="assets/images/about-img.jpg" style="width: 80%;border-radius: 20px;" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end about section -->

  <?php require_once("resources/footer.php") ?>

</body>

</html>