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
$crud->delete($_GET['id']);
header("location:home.php");
