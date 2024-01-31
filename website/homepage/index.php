<?php
require_once "../Connection.php";
require_once "../help.php";

$crud = new help();
$rows = $crud->read_all();
$women_rows = $crud->read(2);
$i = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <!-- Slick  -->
  <link rel="stylesheet" type="text/css" href="slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
  <!-- font awsome -->
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <!-- render all element normally -->
  <link rel="stylesheet" href="css/nrmalize.css">
  <!-- Google fonts  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Oswald:wght@700&display=swap" rel="stylesheet">

  <!-- css file -->
  <link rel="stylesheet" href="css/master.css">
  <link rel="stylesheet" href="../assets/hope.css">
  <script src="js/main.js"></script>
  <script src="js/Jquery.js"></script>

</head>

<body>
  <?php require_once "../assets/header.php"; ?>
  <?php if ($_GET && isset($_SESSION['user']['id'])) : ?>
    <div id="status" style="display:none;">
    </div>
  <?php endif; ?>
  <!-- --------------------------------------------------------------------------->
  <!-- start first section -->
  <div class="style-img">
    <div class="container">
      <div class="big-img">
        <img src="images/2.webp" alt="">
        <div class="info-img">
          <h1>BEST THEMES</h1>
          <p>The latest types of fashion for you,<br>my favourite clothes i would like to show it</p>
          <button>Read More</button>
        </div>
      </div>
      <div class="small-img">
        <img src="images/cms11.webp" alt="">
      </div>
    </div>
  </div>
  <!-- end first section -->
  <!-- ---------------------------------------------------------------------------- -->
  <!-- start features -->
  <div class="features-products">
    <h2>FEATURED PRODUCTS</h2>
    <div class="container" id="container">
      <!-- <button type="button" class="btn slick-next">
                <i class="fa-solid fa-arrow-left"></i>
            </button>
            <button type="button" class="btn slick-prev">Previous</button> -->
      <div class="slick">
        <?php foreach ($rows as $row) : ?>
          <?php $i++;
          if ($i > 6) break; ?>
          <div class="box">
            <div class="image">
              <img src="<?php echo '../admin_panel/products/' . $row['image']; ?>" alt="">
              <span class="state">new</span>
              <div class="icons">
                <i class="fa-solid fa-magnifying-glass"></i>
                <i class="fa-solid fa-cart-shopping"></i>
                <i class="fa-solid fa-rotate"></i>
                <i class="fa-regular fa-heart"></i>
              </div>
            </div>
            <div class="caption">
              <div class="star">
                <i class="fa-regular fa-star "></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
              </div>
              <p><?php echo $row['name']; ?></p>
              <span class="price">$<?php echo $row['price']; ?></span>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <!-- end features -->
    <!-- --------------------------------------------------------------------------- -->
    <!--start shop img  -->
    <div class="shop-photo">
      <div class="container">
        <div class="big-img">
          <img src="images/shope-add1.webp" alt="">
        </div>
        <div class="small-img">
          <img src="images/shope-add2.webp" alt="">
        </div>
      </div>
    </div>
    <!--end shop img  -->
    <!-- --------------------------------------------------------------------------- -->
    <!-- start bestseller -->
    <div class="features-products">
      <h2>Best seller</h2>
      <div class="container" id="container">
        <!-- <button type="button" class="btn slick-next">
                <i class="fa-solid fa-arrow-left"></i>
            </button>
            <button type="button" class="btn slick-prev">Previous</button> -->
        <div class="slick">
          <div class="box">
            <div class="image">
              <img src="images/1 (1).webp" alt="">
              <span class="state">new</span>
              <div class="icons">
                <i class="fa-solid fa-magnifying-glass"></i>
                <i class="fa-solid fa-cart-shopping"></i>
                <i class="fa-solid fa-rotate"></i>
                <i class="fa-regular fa-heart"></i>
              </div>
            </div>
            <div class="caption">
              <div class="star">
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
              </div>
              <p>faded short sleeves T-shirt</p>
              <span class="price">$16.51</span>
            </div>
          </div>
          <div class="box">
            <div class="image">
              <img src="images/3 (1).webp" alt="">
              <span class="state">sale!</span>
              <div class="icons">
                <i class="fa-solid fa-magnifying-glass"></i>
                <i class="fa-solid fa-cart-shopping"></i>
                <i class="fa-solid fa-rotate"></i>
                <i class="fa-regular fa-heart"></i>
              </div>
            </div>
            <div class="caption">
              <div class="star">
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
              </div>
              <p>Blouse</p>
              <span class="price">$22.59</span>
              <del>$27.00</del>
            </div>
          </div>
          <div class="box">
            <div class="image">
              <img src="images/9.webp" alt="">
              <span class="state">sale!</span>
              <div class="icons">
                <i class="fa-solid fa-magnifying-glass"></i>
                <i class="fa-solid fa-cart-shopping"></i>
                <i class="fa-solid fa-rotate"></i>
                <i class="fa-regular fa-heart"></i>
              </div>
            </div>
            <div class="caption">
              <div class="star">
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
              </div>
              <p>printed dress</p>
              <span class="price">$23.40</span>
              <del>$26.00</del>
            </div>
          </div>
          <div class="box">
            <div class="image">
              <img src="images/13.webp" alt="">
              <span class="state">new</span>
              <div class="icons">
                <i class="fa-solid fa-magnifying-glass"></i>
                <i class="fa-solid fa-cart-shopping"></i>
                <i class="fa-solid fa-rotate"></i>
                <i class="fa-regular fa-heart"></i>
              </div>
            </div>
            <div class="caption">
              <div class="star">
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
              </div>
              <p>faded short sleeves T-shirt</p>
              <span class="price">$16.51</span>
            </div>
          </div>
          <div class="box">
            <div class="image">
              <img src="images/7.webp" alt="">
              <span class="state">new</span>
              <div class="icons">
                <i class="fa-solid fa-magnifying-glass"></i>
                <i class="fa-solid fa-cart-shopping"></i>
                <i class="fa-solid fa-rotate"></i>
                <i class="fa-regular fa-heart"></i>
              </div>
            </div>
            <div class="caption">
              <div class="star">
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
              </div>
              <p>printed summer dress</p>
              <span class="price">$28.98</span>
              <del>$30.51</del>
            </div>
          </div>
          <div class="box">
            <div class="image">
              <img src="images/5.webp" alt="">
              <span class="state">new</span>
              <div class="icons">
                <i class="fa-solid fa-magnifying-glass"></i>
                <i class="fa-solid fa-cart-shopping"></i>
                <i class="fa-solid fa-rotate"></i>
                <i class="fa-regular fa-heart"></i>
              </div>
            </div>
            <div class="caption">
              <div class="star">
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
              </div>
              <p>faded short sleeves T-shirt</p>
              <span class="price">$16.51</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- end bestseller -->
    <!-- --------------------------------------------------------------------------- -->
    <!-- start more feature -->

    <div class="mor-feature">
      <div class="container">
        <header>
          <p>
            <span class="move">&#139;</span>
            <span class="move">&#155;</span>
          </p>
        </header>
        <div class="main">
          <?php foreach ($women_rows as $row) : ?>
            <div class="product">
              <picture>
                <img src="../admin_panel/products/<?php echo $row['image']; ?>" alt="">
              </picture>
              <div class="caption">
                <div class="star">
                  <i class="fa-regular fa-star"></i>
                  <i class="fa-regular fa-star"></i>
                  <i class="fa-regular fa-star"></i>
                  <i class="fa-regular fa-star"></i>
                  <i class="fa-regular fa-star"></i>
                </div>
                <p><?php echo $row['name']; ?></p>
                <span class="price">$<?php echo $row['price']; ?></span>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <ul class="buttons">
          <li><a href="" class="active">Womens</a></li>
          <li><a href="">Tops</a></li>
          <li><a href="">Mens</a></li>
        </ul>
      </div>
    </div>
    <!--end  more feature -->
    <!-- --------------------------------------------------------------------------- -->
    <!-- start helf -->
    <div class="shop-photo">
      <div class="container">
        <div class="big-img mor-css">
          <img src="images/14.webp" alt="">
        </div>
        <div class="small-img mor-css">
          <img src="images/15.webp" alt="">
        </div>
      </div>
    </div>
    <!-- end helf -->
    <!-- ---------------------------------------------------------------------------- -->
    <section class="company-facality">
      <div class="container">
        <div class="facality-row">
          <div class="col-lg-3 col-sm-6">
            <div class="single-facality">
              <div class="facality-icon">
                <i class="fa fa-rocket"></i>
              </div>
              <div class="facality-text">
                <h3 class="facality-heading-text">FREE SHIPPING</h3>
                <span>on order over $100</span>
              </div>
            </div>
          </div>
          <!-- SINGLE-FACALITY END -->
          <!-- SINGLE-FACALITY START -->
          <div class="col-lg-3 col-sm-6">
            <div class="single-facality">
              <div class="facality-icon">
                <i class="fa fa-umbrella"></i>
              </div>
              <div class="facality-text">
                <h3 class="facality-heading-text">24/7 SUPPORT</h3>
                <span>online consultations</span>
              </div>
            </div>
          </div>
          <!-- SINGLE-FACALITY END -->
          <!-- SINGLE-FACALITY START -->
          <div class="col-lg-3 col-sm-6">
            <div class="single-facality">
              <div class="facality-icon">
                <i class="fa fa-calendar"></i>
              </div>
              <div class="facality-text">
                <h3 class="facality-heading-text">DAILY UPDATES</h3>
                <span>Check out store for latest</span>
              </div>
            </div>
          </div>
          <!-- SINGLE-FACALITY END -->
          <!-- SINGLE-FACALITY START -->
          <div class="col-lg-3 col-sm-6">
            <div class="single-facality">
              <div class="facality-icon">
                <i class="fa fa-refresh"></i>
              </div>
              <div class="facality-text">
                <h3 class="facality-heading-text">30-DAY RETURNS</h3>
                <span>moneyback guarantee</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- --------------------------------------------------------------------------- -->
    <!-- start footer -->
    <?php require_once "../assets/footer.php"; ?>
    <?php echo (isset($_GET['order'])) ? "" : ""; ?>
    <!-- end footer -->
    <!-- --------------------------------------------------------------------------- -->

    <!-- Java script -->
    <script src="js/main.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <script src="js/main_1.js"></script>
    <script>
      $('.slick').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 2000,
        arrows: true,
        responsive: [{
          breakpoint: 800,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          }
        }, {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
          }
        }],
      });
      //////////////////////////////////////////
      function autoload() {
        const status = document.getElementById('status');
        console.log(status);
        if (JSON.stringify(status) != "null") {
          localStorage.removeItem("cart");
        }
      }
      window.onload = autoload();
      //////////////////////////////////////////////
    </script>
    <script src="../assets/cart.js"></script>

</body>

</html>