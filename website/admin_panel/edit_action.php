<?php
require_once "Admin.php";
require_once "../Connection.php";
session_start();
if (!$_SESSION) {
  die("ACCESS DENIED");
}
$crud = new Admin();
if (!$_GET) {
  die("can't enter the page");
}
$row = $crud->read_by_id($_GET["id"]);
$row = $row[0];
if ($_POST) {
  function get($data)
  {
    if (!isset($data)) {
      die("$data is missing");
    }
    $data = htmlspecialchars(strip_tags(trim($data)));
    return $data;
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
  if ($_FILES["image"]["name"]) {
    $filename = $_FILES["image"]["name"];
    $destination = __DIR__ . "/products/" . $filename;
    if (!move_uploaded_file($_FILES["image"]["tmp_name"], $destination))
      exit("Error cant update image please try again");
  } else {
    $filename = $row["image"];
  }
  $crud->update($_GET['id'], $name, $description, $price, $color, $filename, $sm_qty, $med_qty, $lg_qty, $category, $status);
  header("location:home.php");
}
