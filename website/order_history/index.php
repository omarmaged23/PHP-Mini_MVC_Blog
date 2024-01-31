<?php

require_once "../Connection.php";
require_once "../help.php";
$crud = new help();
@session_start();
if (isset($_SESSION['user']['id'])) {
  $results = $crud->getOrders($_SESSION['user']['id']);
} else {
  die("you dont have access to this page");
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
  <link rel="stylesheet" href="../homepage/css/header.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <!-- render all element normally -->
  <link rel="stylesheet" href="css/nrmalize.css">
  <!-- css file -->
  <link rel="stylesheet" href="../assets/hope.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="css/master.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="../admin_panel/css/master.css?v=<?php echo time(); ?>">
  <script src="Jquery.js"></script>
  <script src="men.js"></script>
</head>

<body>
  <?php require_once "../assets/header.php"; ?>
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
                <!-- <form action="status.php" method="post"> -->
                <td data-label="Id"><?php echo $i; ?></td>
                <td data-label="Username"><?php echo $_SESSION["user"]["username"]; ?></td>
                <td data-label="Order_Date"><?php echo $row["order_date"]; ?></td>
                <td data-label="Price"><?php echo $row["invoice_price"]; ?></td>
                <td data-label="Status">
                  <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                  <select name="status-select" id="statusSelect" disabled>
                    <option value="Pending">Pending</option>
                    <option value="Completed" <?php echo ($row['status'] == "Completed") ? "selected" : "" ?>>
                      Completed
                    </option>
                    <option value="Canceled" <?php echo ($row['status'] == "Canceled") ? "selected" : "" ?>>Canceled
                    </option>
                  </select>
                  <?php if ($row['status'] == "Pending") : ?>
                    <input type="submit" value="Cancel Order">
                  <?php endif; ?>
                </td>
                <!-- </form> -->
              </tr>
            <?php $i++;
            endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
  <?php require_once "../assets/footer.php"; ?>
  <script src="../assets/cart.js"></script>
  <!-- end footer -->
</body>

</html>