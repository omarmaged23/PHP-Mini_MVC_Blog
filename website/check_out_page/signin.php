<?php
require_once "../Connection.php";
require_once "Create_Account.php";
require_once "Validation.php";
require_once "../help.php";
$errors = [];
$log_errors = [];
if (isset($_POST['reg'])) {
  $val = new Validation($_POST);
  $errors = $val->validateRegisterForm();
}
if (!$errors && isset($_POST['reg'])) {
  $create = new Create_Account();
  $create->Create($_POST['username'], $_POST['email'], $_POST['password']);
}
if (isset($_POST['log'])) {
  $log = new Validation($_POST);
  $log_errors = $log->validateLoginForm();
  if (!$log_errors) {
    $user = new help();
    $row = $user->getUser($_POST['email']);
    session_start();
    $_SESSION['user']['id'] = $row['user_id'];
    $_SESSION['user']['username'] = $row['username'];
    header("location:address.php");
  }
}

?>
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
          <li class="step-current second">
            <span>02. Sign in</span>
          </li>
          <li class="step-todo third">
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
          <!-- CREATE-NEW-ACCOUNT START -->
          <div class="create-new-account">
            <form class="new-account-box primari-box" id="create-new-account" method="post" action="">
              <h3 class="box-subheading">Create an account</h3>
              <div class="form-content">
                <p>Please enter your email address to create an account.</p>
                <div class="form-group primary-form-group">
                  <label for="email">Email address</label>
                  <input type="text" value="" name="email" id="email" class="form-control input-feild" required="">
                  <div class="message"><?php echo $errors['email'] ?? ""; ?></div>
                </div>
                <div class="form-group primary-form-group">
                  <label for="name">User Name</label>
                  <input type="text" value="" name="username" id="name" class="form-control input-feild" required="">
                  <div class="message"><?php echo $errors['username'] ?? ""; ?></div>
                </div>
                <div class="form-group primary-form-group">
                  <label for="password">Password</label>
                  <input type="password" value="" name="password" id="password" class="form-control input-feild"
                    required="">
                  <div class="message"><?php echo $errors['password'] ?? ""; ?></div>
                </div>
                <div class="form-group primary-form-group">
                  <label for="password">Confirm Password</label>
                  <input type="password" value="" name="confirm_password" id="ConfirmPassword"
                    class="form-control input-feild" required="">
                  <div class="message"><?php echo $errors['password'] ?? ""; ?></div>
                </div>
                <input type="hidden" name="reg" value="1">
                <div class="submit-button">
                  <span>
                    <i class="fa fa-user submit-icon"></i>
                    <input type="submit" value="Create an account" id="SubmitCreate" class="btn main-btn">
                  </span>
                </div>
              </div>
            </form>
          </div>
          <!-- CREATE-NEW-ACCOUNT END -->
        </div>

        <div class="col-lg-6">
          <!-- REGISTERED-ACCOUNT START -->
          <div class="primari-box registered-account">
            <form class="new-account-box" id="accountLogin" method="post" action="#">
              <h3 class="box-subheading">Already registered?</h3>
              <div class="form-content">
                <div class="form-group primary-form-group">
                  <label for="email">Email address</label>
                  <input type="text" value="" name="email" id="email" class="form-control input-feild">
                </div>
                <div class="form-group primary-form-group">
                  <label for="password">Password</label>
                  <input type="password" value="" name="password" id="password" class="form-control input-feild">
                  <div class="message"></div>
                </div>
                <div class="message">
                  <?php echo $log_errors['login'] ?? ""; ?>
                </div>
                <input type="hidden" name="log" value="1">
                <div class="submit-button">
                  <span>
                    <i class="fa fa-lock submit-icon"></i>
                    <input type="submit" value="login" id="signinCreate" class="btn main-btn">
                  </span>
                </div>
              </div>
            </form>
          </div>
          <!-- REGISTERED-ACCOUNT END -->
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
  <script src="../assets/cart.js"></script>
  <script src="loadCart.js"></script>
  <!-- end footer -->
</body>

</html>