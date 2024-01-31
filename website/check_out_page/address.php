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
  <link rel="stylesheet" href="css/nrmalize.css?v=<?php echo time(); ?>">
  <!-- css file -->
  <link rel="stylesheet" href="css/master.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="../assets/hope.css?v=<?php echo time(); ?>">

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
  $stmt = new help();
  if ($_POST) {
    $address = $stmt->updateAddress($_SESSION['user']['id'], $_POST['address']);
    header("location:shipping.php");
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
          <li class="step-current third">
            <span>03. Address</span>
          </li>
          <li class="step-todo four">
            <span>04. Shipping</span>
          </li>
          <li class="step-todo last">
            <span>05. Payment</span>
          </li>
        </ul>
      </div>

      <div class="row">
        <div class="col-lg-6">
          <div class="first_item primari-box">
            <!-- DELIVERY ADDRESS START -->
            <form action="" method="post">
              <ul class="address">
                <li>
                  <h3 class="page-subheading box-subheading">
                    Your delivery address
                  </h3>
                </li>
                <li><span class="address_name"><input type="text" name="address" required placeholder="Enter Address" value="<?php echo $stmt->getAddress($_SESSION['user']['id']); ?>"></span></li>
              </ul>
              <!-- DELIVERY ADDRESS END -->
          </div>
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
  <script src="loadCart.js"></script>
  <!-- end footer -->
</body>

</html>