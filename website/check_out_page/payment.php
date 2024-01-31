<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bstore</title>
  <!-- font awsome -->
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <!-- render all element normally -->
  <link rel="stylesheet" href="css/nrmalize.css">
  <!-- css file -->
  <link rel="stylesheet" href="css/master.css">
  <link rel="stylesheet" href="../assets/hope.css">
  <script src="../Jquery.js"></script>
  <script src="../men.js"></script>
</head>

<body>
  <?php require_once "../assets/header.php"; ?>
  <?php
  require_once "../Connection.php";
  require_once "../help.php";
  if (!$_SESSION || !$_GET) {
    die("please login to continue ");
  }
  ?>
  <!-- -------------------------------------------------------------------------------------- -->
  <!-- ////////////////////////////////  main content ///////////// -->
  <div class="page">
    <div class="container">
      <div class="home">
        <a href="#">Home</a>
        <span><i class="fa fa-caret-right"></i></span>
        <span>Sign in / Register</span>
      </div>
      <h2>Sign in / Register</h2>
      <div class="list">
        <ul>
          <li class="step-todo first">
            <span>01. Summary</span>
          </li>
          <li class="step-todo second">
            <span>02. Sign in</span>
          </li>
          <li class="step-todo third">
            <span>03. Address</span>
          </li>
          <li class="step-todo four">
            <span>04. Shipping</span>
          </li>
          <li class="step-current last">
            <span>05. Payment</span>
          </li>
        </ul>
      </div>
      <div class="row">
        <div class="table-content table-responsive">
          <!-- TABLE START -->
          <table class="table table-bordered" id="cart-summary">
            <!-- TABLE HEADER START -->
            <thead>
              <tr>
                <th class="cart-product">Product</th>
                <th class="cart-description">Description</th>
                <th class="cart-avail ">Availability</th>
                <th class="cart-unit text-right">Unit price</th>
                <th class="cart_quantity text-center">Qty</th>
                <th class="cart-total text-right" colspan="2">Total</th>
              </tr>
            </thead>
            <!-- TABLE HEADER END -->
            <!-- TABLE BODY START -->
            <tbody>

            </tbody>
            <!-- TABLE BODY END -->
            <!-- TABLE FOOTER START -->
            <tfoot>

            </tfoot>
            <!-- TABLE FOOTER END -->
          </table>
          <!-- TABLE END -->
        </div>
      </div>
      <form action="order.php" method="post">
        <div class="return-continue-shop">
          <a href="#" class="continue-shoping"><i class="fa fa-chevron-left"></i>Continue shopping</a>
          <input type="hidden" id="s1" name="cart" value="">
          <script type="text/javascript">
            var elem = document.getElementById("s1");
            elem.value = localStorage.getItem('cart') || [];
          </script>
          <input type="hidden" name="shipping" value="<?php echo $_GET['shipping']; ?>">
          <input type="submit" class="proced-tocheckout" value="Proceed to checkout">
        </div>
      </form>
      <div id="shipping" style="display:none;">
        <?php echo $_GET['shipping']; ?>
      </div>
    </div>
  </div>

  <!-- Start Company Facclity -->
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
  <!-- End Company Facclity -->




  <!-- start footer -->
  <?php require_once "../assets/footer.php"; ?>
  <script src="../assets/cart.js?v=1"></script>
  <script src="../check_out_page/invoice.js?v=1"></script>
  <!-- end footer -->
</body>

</html>