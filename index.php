<?php
ob_start();
session_start();
DEFINE('SECURITY', true);
include_once('./config/connect.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/category.css">
  <link rel="stylesheet" href="css/search.css">
  <link rel="stylesheet" href="css/product.css">
  <link rel="stylesheet" href="css/cart.css">
  <link rel="stylesheet" href="css/success.css">
  <title>SHOES ADIDAS STORE</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" />
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
</head>

<body>
  <!-- TODO HEADER-->
  <header>
    <div class="container">
      <div class="row">
        <?php
        include_once('./modules/logo/logo.php');
        include_once('./modules/name_store/name_store.php');
        include_once('./modules/login/login.php');
        ?>

      </div>
    </div>
    <div class="container-fluid p-0">
      <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <?php
        include_once('./modules/category-menu/menu.php');
        ?>

        <div class="navbar-nav">
          <?php
          include_once('./modules/search/search.php');
          include_once('./modules/cart/notify.php');
          ?>

        </div>
      </nav>
    </div>
  </header>
  <!-- TODO END HEADER-->

  <!-- TODO MAIN-->
  <main>
    <!--Slide first-->
    <?php
    if (isset($_GET['page_layout'])) {
      switch ($_GET['page_layout']) {
        case 'category':
          include_once('modules/category-menu/category.php');
          break;
        case 'cart':
          include_once('modules/cart/cart.php');
          break;
        case 'product':
          include_once('modules/product/product.php');
          break;
        case 'search':
          include_once('modules/search/search-main.php');
          break;
        case 'success':
          include_once('modules/cart/success.php');
          break;
      }
    } else {
      include_once('./modules/slide/slide-one.php');
      include_once('./modules/slide/slide-two.php');
      include_once('./modules/product/featured.php');
      include_once('./modules/product/latest.php');
    }
    ?>


  </main>
  <!-- TODO END MAIN-->

  <!-- TODO FOOTER-->
  <div id="footer" class="box bg-black">
    <div class="container">
      <div class="row">
        <?php
        include_once('./modules/footer/footer.php');
        ?>
      </div>
      <p>@ 2019 | Designed by Anh My Pham</p>
    </div>
  </div>
  <!-- TODO END FOOTER-->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.bundle.js"></script>
  <script src="js/bootstrap.js"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>