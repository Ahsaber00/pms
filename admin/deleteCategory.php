<?php
require_once "../lib/category.php";
include_once "../core/functions.php";
session_start() ;
if(!isset($_SESSION['auth']))
{
  reDirect("auth/login.php");
}

$category=new Category();
$category->deleteCategory($_GET['id']);
reDirect('categoriesList.php');




?>