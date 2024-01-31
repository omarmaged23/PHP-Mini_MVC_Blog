<?php
require_once "Admin.php";
require_once "../Connection.php";
function get($data)
{
  if (!$data) {
    die("$data is missing");
  }
  $data = htmlspecialchars(strip_tags(trim($data)));
  return $data;
}
if (!($_POST && $_FILES)) {
  die("please make sure you entered all required data");
}
$name = get($_POST["name"]);
$description = get($_POST["desc"]);
$price = get($_POST["price"]);
$sm_qty = get($_POST["sm_qty"]);
$med_qty = get($_POST["med_qty"]);
$lg_qty = get($_POST["lg_qty"]);
$color = get($_POST["color"]);
$category = get($_POST["cat"]);
$total_qty = $sm_qty + $med_qty + $lg_qty;
if ($total_qty > 0) {
  $status = "in_stock";
} else {
  $status = "out_stock";
}
$filename = $_FILES["image"]["name"];
$destination = __DIR__ . "/products/" . $filename;
if (!move_uploaded_file($_FILES["image"]["tmp_name"], $destination)) {
  exit("Error cant save the file please try again");
} else {
  echo "File Uploaded Successfully";
}

$crud = new Admin();
$crud->add($name, $description, $price, $color, $filename, $sm_qty, $med_qty, $lg_qty, $category, $status);
header("location:home.php");
