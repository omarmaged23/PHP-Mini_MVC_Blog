<?php
session_start();
require_once "../Connection.php";
require_once "../help.php";
if (!$_POST)
  die("Access Denied");
$price = 0;
function stringToItemsArray($inputString)
{
  $inputString = str_replace(['[', ']'], '', $inputString);

  $itemStrings = explode('],', $inputString);

  $items = [];
  foreach ($itemStrings as $itemString) {
    $itemData = explode('","', trim($itemString, ' "'));
    $items[] = $itemData;
  }

  return $items;
}
function products_array($items)
{
  $main = [];
  $j = 0;
  for ($i = 0; $i < count($items[0]); $i++) {
    if (($i % 7) == 0 && $i != 0) {
      $j++;
      $main[$j][$i % 7] = $items[0][$i];
      continue;
    }
    $main[$j][$i % 7] = $items[0][$i];
  }
  return $main;
}
$resultArray = stringToItemsArray($_POST['cart']);
$cart = products_array($resultArray);
$help = new help();
foreach ($cart as $item) {
  $price += $item[4] * $item[5];
}
$price += $_POST['shipping'];
$item_price = 0;
$order = $help->InsertOrder($_SESSION['user']['id'], $price);
foreach ($cart as $item) {
  $item_price = $item[4] * $item[5];
  $help->InsertOrderItem($order, $item[0], $item[5], $item_price, $item[6]);
  $help->updateProduct($item[0], $item[5], $item[6]);
}
header("location:../homepage/index.php?completed=" . true);
