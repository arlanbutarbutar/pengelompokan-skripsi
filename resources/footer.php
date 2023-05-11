<!-- footer section -->
<section class="container-fluid footer_section">
  <p>Copyright © <?= date("Y") ?> <a style="cursor: pointer;" onclick="window.open('https://netmedia-framecode.com', '_blank')">Netmedia Framecode</a> . All rights reserved. Powered By Ferdy Chanel Daresurecao Lay
  </p>
</section>
<!-- footer section -->

<script type="text/javascript" src="assets/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
</script>

<script>
  function openNav() {
    document.getElementById("myNav").classList.toggle("menu_width");
    document
      .querySelector(".custom_menu-btn")
      .classList.toggle("menu_btn-style");
  }
</script>

<!-- owl carousel script -->
<script type="text/javascript">
  $(".owl-carousel").owlCarousel({
    loop: true,
    margin: 35,
    navText: [],
    autoplay: true,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 2
      },
      1000: {
        items: 3
      }
    }
  });
</script>
<!-- end owl carousel script -->