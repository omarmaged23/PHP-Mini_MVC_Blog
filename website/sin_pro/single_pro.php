<?php
require_once "../Connection.php";
require_once "../help.php";
// session_start();
$crud = new help();
if ($_GET)
  $rows = $crud->read_by_id($_GET['id']);
else
  header("location:../homepage/index.php");
$row = $rows[0];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Single Product</title>
  <!-- font awsome -->
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <!-- render all element normally -->
  <link rel="stylesheet" href="css/nrmalize.css">
  <!-- css file -->
  <link rel="stylesheet" href="css/master.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="../assets/hope.css?v=<?php echo time(); ?>">
</head>

<body>
  <?php require_once "../assets/header.php"; ?>
  <!-- -------------------------------------------------------------------------------------- -->
  <!-- main content -->
  <div class="container">
    <div class="page">
      <div class="left">
        <div class="le">
          <div class="s_p_image">
            <img src="<?php echo "../admin_panel/products/" . $row['image']; ?>" alt="single-product-image">
            <a class="new" href="#">new</a>
            <a class="fancybox" href=""><span class="large-btn">View larger <i class="fa fa-search-plus"></i></span></a>
          </div>
        </div>

        <div class="ri">
          <h2 id="h"><?php echo $row['name']; ?></h2>
          <div class="media">
            <ul id="u1">
              <li><a href="#"><i class="fa-brands fa-twitter"></i>Tweet</a></li>
              <li><a href="#"><i class="fa fa-share"></i>share</a></li>
              <li><a href="#"><i class="fa-brands fa-google"></i>Google+</a></li>
              <li><a href="#"><i class="fa-brands fa-pinterest"></i>Pinterest</a></li>
            </ul>
          </div>
          <div class="writeview">
            <ul id="u1">
              <li><a href=""><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                    class="fa fa-star"></i></a></li>
              <li><a href="#">Read Review (1)</a></li>
              <li><a href="#">Write a review</a></li>
            </ul>
          </div>
          <div class="referance">
            <p>Reference: <span>demo_1</span></p>
            <p>Condition: <span>New product</span></p>
          </div>
          <div class="salary">
            <h2>$<?php echo $row['price']; ?></h2>
          </div>
          <div class="desc">
            <p><?php echo $row['description']; ?></p>
            <div class="sto <?php echo ($row['status'] == "out_stock") ? "out" : ""; ?>">
              <p><?php echo $row['total_qty']; ?> Items<span><?php echo $row['status']; ?></span></p>
            </div>
          </div>
          <div class="quantity">
            <p id="q">Quantity</p>
            <div class="cart_qu">
              <div class="count">
                <input class="area1" id="product-qty" type="number" name="qtybutton" style="width:80%;" min=0
                  max='<?php echo $row['total_qty']; ?>' <?php echo ($row['total_qty']) ? "" : "disabled"; ?> value=1>
              </div>
            </div>
          </div>
          <div class="size">
            <p class="s">Size </p>
            <select name="product-size" id="product-size"
              <?php echo ($row['status'] == "out_stock") ? "disabled" : ""; ?>>
              <option value="S" <?php echo ($row['small_qty']) ? "" : "disabled"; ?>>S</option>
              <option value="M" <?php echo ($row['medium_qty']) ? "" : "disabled"; ?>>M</option>
              <option value="L" <?php echo ($row['large_qty']) ? "" : "disabled"; ?>>L</option>
            </select>
          </div>
          <div class="color">
            <p class="c">Color : <?php echo $row['color']; ?></p>
          </div>
          <div class="add-cart">
            <a class="add" id="<?php echo ($row['status'] == "out_stock") ? "" : "addTocart"; ?>"
              title="Add to cart">Add to cart</a>
          </div>
        </div>

        <div class="un_le">
          <ul class="more-info">
            <li class="active"><a href="#" data-bs-toggle="tab">more info</a></li>
            <li class="active"><a href="#" data-bs-toggle="tab">data sheet</a></li>
            <li><a href="#" data-bs-toggle="tab">reviews</a></li>
          </ul>
          <div class="tab-content">
            <p>Fashion has been creating well-designed collections since 2010. The brand
              offers feminine designs delivering stylish separates and statement
              dresses which have since evolved into a full ready-to-wear collection in
              which every item is a vital part of a woman's wardrobe. The result?
              Cool, easy, chic looks with youthful elegance and unmistakable signature
              style. All the beautiful pieces are made in Italy and manufactured with
              the greatest attention. Now Fashion extends to a range of accessories
              including shoes, hats, belts and more!</p>
          </div>
        </div>
      </div>


      <div class="right">
        <div class="first">
          <h2 class="view-pro">Viewed products</h2>
          <ul>
            <li>
              <a class="double" href="#"><img src="../admin_panel/products/1.webp" alt=""></a>
              <div class="r-sidebar-pro-content">
                <h5><a href="#">Faded Short ...</a></h5>
                <p>Faded short sleeves t-shirt with high...</p>
              </div>
            </li>
            <li>
              <a class="double" href="#"><img src="../admin_panel/products/2.webp" alt=""></a>
              <div class="r-sidebar-pro-content">
                <h5><a href="#">Printed Chif ..</a></h5>
                <p>Printed chiffon knee length dress...</p>
              </div>
            </li>
            <li>
              <a class="double" href="#"><img src="../admin_panel/products/3.webp" alt=""></a>
              <div class="r-sidebar-pro-content">
                <h5><a href="#">Printed Sum ...</a></h5>
                <p>Long printed dress with thin...</p>
              </div>
            </li>
            <li>
              <a class="double" href="#"><img src="../admin_panel/products/4.webp" alt=""></a>
              <div class="r-sidebar-pro-content">
                <h5><a href="#">Printed Dress </a></h5>
                <p>100% cotton double printed dress....</p>
              </div>
            </li>
          </ul>
        </div>

        <div class="second">
          <h2 class="view-pro">Tags</h2>
          <div class="tags">
            <a href="#">fashion</a>
            <a href="#">handbags</a>
            <a href="#">women</a>
            <a href="#">men</a>
            <a href="#">kids</a>
            <a href="#">New</a>
            <a href="#">Accessories</a>
            <a href="#">clothing</a>
            <a href="#">New</a>
          </div>
        </div>

        <div class="third">
          <div class="slider-right zoom-img">
            <a href="#"><img class="img-responsive" src="images/logo.webp" alt="sidebar left"></a>
          </div>
        </div>
      </div>
    </div>
  </div>
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

  <!-- start footer -->
  <?php require_once "../assets/footer.php"; ?>
  <!-- end footer -->

  <div id="product-id" style="display:none;"><?php echo $_GET['id'] ?? ""; ?> </div>
  <!-- Start Java Scipt Section -->
  <script src="../assets/cart.js"></script>
  <script>
  $(".toggle-menue").click(function() {
    $(".header nav .links ul").toggle({});
  });
  </script>
  <!-- End Java Scipt Section -->
</body>

</html>