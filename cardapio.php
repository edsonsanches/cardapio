<!DOCTYPE html>
<html lang="en">
  <?php
include("BD/conecta.php");
    
    $selecionaEndereco=mysqli_query($conexao, "select * from config where id_config=2");
    $campoEndereco=mysqli_fetch_assoc($selecionaEndereco);
    
    $selecionaEmail=mysqli_query($conexao, "select * from config where id_config=3");
    $campoEmail=mysqli_fetch_assoc($selecionaEmail);

    $selecionaNome=mysqli_query($conexao, "select * from config where id_config=15");
    $campoNome=mysqli_fetch_assoc($selecionaNome);

    $selecionaTelefone=mysqli_query($conexao, "select * from config where id_config=14");
    $campoTelefone=mysqli_fetch_assoc($selecionaTelefone);

    $selecionaFunc=mysqli_query($conexao, "select * from config where id_config=16");
    $campoFunc=mysqli_fetch_assoc($selecionaFunc);
    ?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $campoNome['config']; ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Quitutto GastroPub - v3.9.0
  * Template URL: https://bootstrapmade.com/Quitutto GastroPub-restaurant-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-center justify-content-md-between">

      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-phone d-flex align-items-center"><span><?php echo $campoTelefone['config']; ?></span></i>
        <i class="bi bi-clock d-flex align-items-center ms-4"><span> <?php echo $campoFunc['config']; ?></span></i>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->



  <main id="main">

    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
            <p><?php echo $campoNome['config']; ?></p>
          <h2>Cardápio</h2>
          
        </div>
<?php
include("BD/conecta.php");
$selecionaCategorias=mysqli_query($conexao, "select * from categoria order by id_categoria");
?>
        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="menu-flters">
              <li data-filter="*" class="filter-active">Todos</li>
              <?php
              while($categorias=mysqli_fetch_array($selecionaCategorias)){
              ?>
              <li data-filter=".<?php echo $categorias['nome']; ?>"><?php echo $categorias['nome']; ?></li>
                <?php } ?>
            </ul>
          </div>
        </div>

        <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
              <?php
              $selecionaItens=mysqli_query($conexao, "select * from item where ativo=1 order by categoria");
              while($itens=mysqli_fetch_array($selecionaItens)){
                $categoriaSelecionada=$itens['categoria'];
                $selecionaCategoriaItem=mysqli_query($conexao, "select * from categoria where id_categoria=$categoriaSelecionada");
                $CategoriaItem=mysqli_fetch_array($selecionaCategoriaItem);

              ?>   
          <div class="col-lg-6 menu-item <?php echo $CategoriaItem['nome']; ?>">
            <img src="<?php echo $itens['img']; ?>" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#"><?php echo $itens['nome']; ?></a><span><?php echo $itens['valor']; ?></span>
            </div>
            <div class="menu-ingredients">
            <?php echo $itens['ingrediente']; ?>
            </div>
          </div>
                <?php } ?>
        </div>

      </div>
    </section><!-- End Menu Section -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">


    <div class="container">
      <div class="copyright">
        &copy; Copyright <a  href="/login/index.php">(R)</a> <strong><span><?php echo $campoNome['config']; ?></span></strong>. All Rights Reserved<br>
        <a  href="index.php">Site completo</a>
      </div>
      <div class="credits">
        <!--Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>-->
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>