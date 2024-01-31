<?php
require_once "../Connection.php";
require_once "../check_out_page/Validation.php";
require_once "../help.php";
if ($_POST) {
    $log = new Validation($_POST);
    $log_errors = $log->validateLoginForm();
    if (!$log_errors) {
        $user = new help();
        $row = $user->getUser($_POST['email']);
        if ($row['role'] == "admin") {
            session_start();
            $_SESSION['Admin']['id'] = $row['user_id'];
            $_SESSION['Admin']['username'] = $row['username'];
            header("location:home.php");
        } else {
            header("location:login.php");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- font awsome -->.
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <!-- render all element normally -->
  <link rel="stylesheet" href="css/nrmalize.css">
  <!-- css file -->
  <link rel="stylesheet" href="css/master.css">
</head>

<body>
  <main>
    <section class="login-form">
      <div class="container">
        <div class="login-content">
          <h1>Log In</h1>
          <form action="" method="post">
            <div class="form-group">
              <input type="email" placeholder="email" name="email" required>
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" name="password" required>
            </div>
            <div class="form-group">
              <input type="submit" value="Log in">
            </div>
          </form>
        </div>
      </div>
    </section>
  </main>
</body>

</html>