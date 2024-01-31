<?php
require_once "Admin.php";
require_once "../Connection.php";
session_start();
if (!$_SESSION) {
  die("ACCESS DENIED");
}
$crud = new Admin();
$crud->updt_order($_POST["order_id"], $_POST['status-select']);
header("location:home.php");
