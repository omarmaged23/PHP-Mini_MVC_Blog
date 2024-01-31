<?php @session_start(); ?>
<div class="header">
  <div class="info">
    <div class="container">
      <ul class="right">
        <li>Welcome <span>Bstore</span></li>
        <li>Currency :<span>USD</span></li>
        <li>Language <span>English</span></li>
      </ul>
      <ul class="left">
        <li><a href="../check_out_page/payment.php"> Check Out</a></li>
        <li><a href="#"> Wishlist</a></li>
        <li><a href="../order_history/index.php"> My
            Orders</a></li>
        <!-- <?php //echo ($_SESSION) ? "?id=" . $_SESSION['user']['id'] : ""; 
              ?> -->
        <li><a href="../check_out_page/summary.php"> My Cart</a></li>
        <li>
          <a href="<?php echo ($_SESSION) ? "../assets/logout.php" : "../check_out_page/signin.php" ?>">
            <?php echo ($_SESSION) ? "welcome, " . $_SESSION['user']['username'] . " Logout" : "Sign in" ?></a>
        </li>
      </ul>
    </div>
  </div>
  <div class="bg">
    <div class="logo">
      <div class="image">
        <img src="images/logo.webp" alt="logo">
      </div>
      <div class="contact">
        <i class="fa-solid fa-phone"></i>
        <div>
          <h2>Call Us Free</h2>
          <span>0123-456-789</span>
        </div>
      </div>
    </div>
  </div>
  <nav>
    <div class="links">
      <div class="fas fa-bars toggle-menue"></div>
      <ul>
        <li class="active"><a href="../homepage/index.php">HOME</a></li>
        <li><a href="../men/index.php">MEN</a></li>
        <li><a href="../women/index.php">WOMEN</a></li>
        <!-- <li><a href="#">CLOTHING</a></li>
        <li><a href="#">TOPS</a></li>
        <li><a href="#">T-SHIRT</a></li>
        <li><a href="#">PAGE</a></li>
        <li><a href="#">ABOUT US</a></li> -->
      </ul>
    </div>
    <div class="mycart">
      <a href="../check_out_page/summary.php" class="cart">
        <i class="fa-solid fa-cart-shopping"></i>
        <span>MY CART</span>
      </a>
      <span class="count" id="cart-counter">0</span>
    </div>
  </nav>
</div>