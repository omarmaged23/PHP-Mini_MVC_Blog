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
// session_start();
if (!$_SESSION) {
  die("please login to continue ");
}
if ($_POST) {
  header("location:payment.php?shipping=" . $_POST['shipping-method']);
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
          <li class="step-current four">
            <span>04. Shipping</span>
          </li>
          <li class="step-todo last">
            <span>05. Payment</span>
          </li>
        </ul>
      </div>

      <div class="row">
        <div class="table-content table-responsive">
          <!-- TABLE START -->
          <table class="table table-bordered delivery-table" id="store-shipping">
            <!-- TABLE BODY START -->
            <tbody>
              <!-- SINGLE CART_ITEM START -->
              <form action="" method="post">
                <tr>
                  <td class="delivery-radio">
                    <input type="radio" name="shipping-method" value=0>
                  </td>
                  <td class="delivery-icon">
                    <img src="images/bank.webp" alt="">
                  </td>
                  <td class="carry-info">
                    <strong>Bstore</strong><br>
                    Delivery time: Pick up in-store <br>
                    The best price and speed
                  </td>
                  <td class="carry-cost">Free</td>
                </tr>
                <!-- SINGLE CART_ITEM END -->
            </tbody>
            <!-- TABLE BODY END -->
          </table>
          <!-- TABLE END -->
          <table class="table table-bordered delivery-table" id="delivery-shipping">
            <!-- TABLE BODY START -->
            <tbody>
              <!-- SINGLE CART_ITEM START -->
              <tr>
                <td class="delivery-radio">
                  <input type="radio" name="shipping-method" value=5>
                </td>
                <td class="delivery-icon">
                  <img src="images/delivery-method.webp" alt="">
                </td>
                <td class="carry-info">
                  <strong>Bstore</strong><br>
                  Delivery time: Pick up from your home <br>
                  The best price and speed
                </td>
                <td class="carry-cost">$5.00 (tax.)</td>
              </tr>

              <!-- SINGLE CART_ITEM END -->
            </tbody>
            <!-- TABLE BODY END -->
          </table>
          <!-- TABLE END -->
        </div>
      </div>
      <div class="return-continue-shop">
        <a href="#" class="continue-shoping"><i class="fa fa-chevron-left"></i>Continue shopping</a>
        <input type="submit" class="proced-tocheckout" value="Proceed to checkout">
      </div>
      </form>
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
  <script src="../assets/cart.js"></script>
  <!-- <script src="loadCart.js"></script> -->
  <!-- end footer -->
</body>

</html>