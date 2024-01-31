<?php
require_once "Admin.php";
require_once "../Connection.php";
session_start();
if (!$_SESSION) {
  die("ACCESS DENIED");
}
$crud = new Admin();
$rows = $crud->read();
$results = $crud->order_list();
?>
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
  <link rel="stylesheet" href="css/master.css?v=<?php echo time(); ?>">
</head>

<body>
  <!-- Start Header Section -->
  <header>
    <div class="logo">
      <img src="assets/logo.webp" alt="">
    </div>
    <div class="fas fa-bars toggle-menue"></div>
        
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
            <a class="dashboard" id="dashboard_btn">
              <i class="fa-solid fa-gauge-high"></i>
              Dashboard
            </a>
          </li>
          <li>
            <a class="mange-product" id="products_btn">
              <i class="fa-solid fa-dolly"></i>
              Products
            </a>
          </li>
          <li>
            <a class="mange-orders" id="orders_btn">
              <i class="fa-solid fa-cart-shopping"></i>
              Orders
            </a>
          </li>
          <li>
            <a class="settings" id="settings_btn">
              <i class="fa-solid fa-gear"></i>
              Settings
            </a>
          </li>
          <li>
            <a href="logout.php" class="logout" id="logout_btn">
              <i class="fa-solid fa-right-from-bracket"></i>
              Logout
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
          <h1>Create product</h1>
          <form action="index.php" enctype="multipart/form-data" method="post" class="product-info">
            <!-- Prodcut Name -->
            <div class="input-box">
              <label for="">Name</label>
              <input name="name" type="text" required id="p-name" placeholder="Type here">
            </div>
            <!-- Product Desc -->
            <div class="input-box">
              <label for="">Description</label>
              <input name="desc" type="text" required id="p-desc" placeholder="Type here">
            </div>
            <!-- Product Price -->
            <div class="input-box">
              <label for="">Price</label>
              <input name="price" type="number" required id="p-price" placeholder="Select">
            </div>
            <!-- Prodcut S-size -->
            <div class="input-box">
              <label for="">S-Size</label>
              <input name="sm_qty" type="number" min=0 required id="p-small" placeholder="Select">
            </div>
            <!-- Prodcut M-size -->
            <div class="input-box">
              <label for="">M-Size</label>
              <input name="med_qty" type="number" min=0 required id="p-mideum" placeholder="Select">
            </div>
            <!-- Prodcut L-size -->
            <div class="input-box">
              <label for="">L-Size</label>
              <input name="lg_qty" type="number" min=0 required id="p-large" placeholder="Select">
            </div>
            <!-- Prodcut Color -->
            <div class="input-box">
              <label for="">Color</label>
              <input name="color" required id="p-color" placeholder="Type here">
            </div>
            <!-- Product Category -->
            <div class="input-box">
              <label for="">Category</label>
              <select name="cat" id="p-category" placeholder="Select">
                <option name="" value=1>Men</option>
                <option name="" value=2>Women</option>
              </select>
            </div>
            <!-- Prodcut Image -->
            <div class="input-box">
              <div class="image">
                <input type="file" name="image" id="fileToUpload">
              </div>
            </div>
            <input type="submit" id="submit-btn" value="Add">
          </form>
        </div>
      </section>
      <!-- Start Mange Product Section -->

      <section class="mange-product-section" id="mange-product">
        <div class="container">
          <h1>List of Products</h1>
          <div class="content">
            <button id="add_newProduct">new product</button>
            <table class="product-list">
              <thead>
                <tr>
                  <th class="id-col">id</th>
                  <th class="name-col">name</th>
                  <th class="description-col">description</th>
                  <th class="price-col">price</th>
                  <th class="s-size-col">s-size</th>
                  <th class="m-size-col">m-size</th>
                  <th class="l-size-col">l-size</th>
                  <th class="color-col">color</th>
                  <th class="category-col">category</th>
                  <th class="status-col">status</th>
                  <th class="action-col">action</th>

                </tr>
              </thead>
              <tbody>
                <?php $i = 1;
                foreach ($rows as $row) : ?>
                  <tr class="row">
                    <td data-label="Id"><?php echo $i; ?></td>
                    <td data-label="Name"><?php echo $row["name"]; ?></td>
                    <td data-label="Description"><?php echo $row["description"]; ?></td>
                    <td data-label="Price"><?php echo $row["price"]; ?></td>
                    <td data-label="S-Size"><?php echo $row["small_qty"]; ?></td>
                    <td data-label="M-Size"><?php echo $row["medium_qty"]; ?></td>
                    <td data-label="L-Size"><?php echo $row["large_qty"]; ?></td>
                    <td data-label="Color"><?php echo $row["color"]; ?></td>
                    <td data-label="Category"><?php echo ($row["category_id"] == 1) ? "men" : "women" ?></td>
                    <td data-label="Status"><?php echo $row["status"]; ?></td>
                    <td data-label="Action">
                      <a href="edit_js.php?id=<?php echo $row["product_id"]; ?>" id="edit-btn">edit</a>
                      <a href="delete.php?id=<?php echo $row["product_id"]; ?>" id="delete-btn">delete</a>
                    </td>
                  </tr>
                  </tr>
                <?php $i++;
                endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </section>
      <!--  End  Mange Product Section -->
      <!-- Start Dashboard Section -->
      <section class="dashboard-section" id="dashboard-sec">
        <div class="container">
          <h1 style="color:black;">Dashboard</h1>
          <div class="dashboard-cards">
            <div class="card">
              <div class="card-image">
                <i class="fa-solid fa-dollar-sign"></i>
              </div>
              <div class="card-stack">
                <div class="card-content">
                  <h3>Total Sales</h3>
                </div>
                <div class="card-action">
                  <?php $price = 0;
                  foreach ($results as $row) :
                    if ($row['status'] != "Completed")
                      continue;
                    $price += $row['invoice_price'];
                  endforeach; ?>
                  <strong>$<?php echo $price; ?></strong>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-image">
                <i class="fa-solid fa-cart-shopping"></i>
              </div>
              <div class="card-stack">
                <div class="card-content">
                  <h3>Total Orders</h3>
                </div>
                <div class="card-action">
                  <strong><?php echo count($crud->get_total_orders()); ?></strong>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-image">
                <i class="fa-solid fa-dolly"></i>
              </div>
              <div class="card-stack">
                <div class="card-content">
                  <h3>Total Products</h3>
                </div>
                <div class="card-action">
                  <strong><?php echo count($crud->read()); ?></strong>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Dashboard Section -->

      <!-- Start View Orders Section -->
      <section class="orders-section mange-product-section" id="orders-sec">
        <div class="container">
          <h1>List Of Orders</h1>
          <div class="content">
            <table class="product-list">
              <thead>
                <tr>
                  <th class="id-col">id</th>
                  <th class="name-col">Username</th>
                  <th class="orderDate-col">Order Date</th>
                  <th class="price-col">Invoice Price</th>
                  <th class="status-col">Status</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1;
                foreach ($results as $row) : ?>
                  <tr class="row">
                    <form action="status.php" method="post">
                      <td data-label="Id"><?php echo $i; ?></td>
                      <td data-label="Username"><?php echo $row["username"]; ?></td>
                      <td data-label="Order_Date"><?php echo $row["order_date"]; ?></td>
                      <td data-label="Price"><?php echo $row["invoice_price"]; ?></td>
                      <td data-label="Status">
                        <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                        <select name="status-select" id="statusSelect">
                          <option value="Pending">Pending</option>
                          <option value="Completed" <?php echo ($row['status'] == "Completed") ? "selected" : "" ?>>
                            Completed
                          </option>
                          <option value="Canceled" <?php echo ($row['status'] == "Canceled") ? "selected" : "" ?>>Canceled
                          </option>
                        </select>
                        <input type="submit" value="SetStatus">
                      </td>
                    </form>
                  </tr>
                <?php $i++;
                endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </section>
      <!-- End View Orders Section -->
      <!-- Start Setting Section -->
      <section class="settings-section" id="settings-sec">
        <div class="container">
          <div class="profile-content">
            <h1 style="color:black;">Profile Settings</h1>
            <form action="">
              <div class="form-input">
                <label for="">Username</label>
                <input type="text" placeholder="Enter username" required>
              </div>
              <div class="form-input">
                <label for="">Password</label>
                <input type="text" placeholder="Enter password" required>
              </div>
              <div class="form-input">
                <label for="">Email</label>
                <input type="email" placeholder="Enter email" required>
              </div>
              <div class="form-input">
                <label for="">Address</label>
                <input type="text" placeholder="Address" required>
              </div>
              <div class="form-input">
                <a href="#">Save changes</a>
              </div>

            </form>
          </div>
        </div>
      </section>
      <!-- End Setting Section -->
    </div>
  </main>
  <!-- End Main Secion -->
  <script src="../admin_panel/show_hide_sec.js"></script>
  <script src="../admin_panel/darkmode.js"></script>
  <!-- <script src="/admin_panel/jquery.js"></script>
    <script src="/admin_panel/jquery2.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script>
    $(".toggle-menue").click(function() {
      $("main nav  ul").toggle({});
    });
  </script>
</body>

</html>