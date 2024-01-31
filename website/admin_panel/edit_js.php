<?php
require_once "Admin.php";
require_once "../Connection.php";
session_start();
if (!$_SESSION) {
  die("ACCESS DENIED");
}
if (!$_GET) {
  die("can't enter the page");
}
$crud = new Admin();
$row = $crud->read_by_id($_GET["id"]);
$row = $row[0]; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>admin</title>
  <!-- font awsome -->
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <!-- render all element normally -->
  <link rel="stylesheet" href="css/nrmalize.css">
  <!-- css file -->
  <link rel="stylesheet" href="css/master.css">
</head>

<body>
  <!-- Start Header Section -->
  <header>
    <div class="logo">
      <img src="assets/logo.webp" alt="">
    </div>
    <nav>
      <ul>
        <li><a href="#"><i class="fa-solid fa-circle-half-stroke"></i></a></li>
        <li><a href="#"><img src="assets/icons8-user-64 (1).png" alt=""></a></li>
      </ul>
    </nav>
  </header>
  <!-- End Header Section -->
  <!-- Start Aside Section -->
  <!-- End Aside Section -->
  <!-- Start Main Secion -->
  <main>
    <div class="left-side">

      <nav>
        <ul>
          <li>
            <a href="home.php" class="dashboard">
              <i class="fa-solid fa-gauge-high"></i>
              Return to home
            </a>
          </li>
        </ul>
      </nav>
    </div>
    <div class="right-side">
      <!-- Start Create New Product Section -->
      <!-- End Create New Product Section -->
      <section class="product-details" id="create-product">
        <div class="container">
          <h1>Update product</h1>
          <form action="edit_action.php?id=<?php echo $row["product_id"]; ?>" enctype="multipart/form-data"
            method="post" class="product-info">
            <!-- Prodcut Name -->
            <div class="input-box">
              <label for="">Name</label>
              <input name="name" type="text" required id="p-name" value="<?php echo $row['name'] ?>">
            </div>
            <!-- Product Desc -->
            <div class="input-box">
              <label for="">Description</label>
              <input name="desc" type="text" required id="p-desc" value="<?php echo $row['description'] ?>">
            </div>
            <!-- Product Price -->
            <div class="input-box">
              <label for="">Price</label>
              <input name="price" type="number" required id="p-price" value="<?php echo $row['price'] ?>">
            </div>
            <!-- Prodcut S-size -->
            <div class="input-box">
              <label for="">S-Size</label>
              <input name="sm_qty" type="number" required id="p-small" min=0 value="<?php echo $row['small_qty'] ?>">
            </div>
            <!-- Prodcut M-size -->
            <div class="input-box">
              <label for="">M-Size</label>
              <input name="med_qty" type="number" required id="p-mideum" min=0 value="<?php echo $row['medium_qty'] ?>">
            </div>
            <!-- Prodcut L-size -->
            <div class="input-box">
              <label for="">L-Size</label>
              <input name="lg_qty" type="number" required id="p-large" min=0 value="<?php echo $row['large_qty'] ?>">
            </div>
            <!-- Prodcut Color -->
            <div class="input-box">
              <label for="">Color</label>
              <input name="color" required id="p-color" value="<?php echo $row['color'] ?>">
            </div>
            <!-- Product Category -->
            <div class="input-box">
              <label for="">Category</label>
              <select name="cat" id="p-category" value="<?php echo $row['category_id'] ?>">
                <option name="" value=1 <?php echo ($row['category_id'] == 1) ? "selected" : " " ?>>Men</option>
                <option name="" value=2 <?php echo ($row['category_id'] == 2) ? "selected" : " " ?>>Women</option>
              </select>
            </div>
            <!-- Prodcut Image -->
            <div class="input-box">
              <div class="image">
                <img src="products/<?php echo $row['image']; ?>" width="100%" height="100%" alt="">
              </div>
              <input type="file" name="image" id="fileToUpload">
            </div>
            <input type="submit" id="submit-btn" value="Update">
          </form>
        </div>
      </section>
      <!-- Start Mange Product Section -->
    </div>
  </main>
  <!-- End Main Secion -->

</body>

</html>