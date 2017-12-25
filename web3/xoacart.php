<?php
session_start();
if(isset($_GET['id'])){
$id=$_GET['id'];
unset($_SESSION['cart'][$id]);
header("location:shopping_cart.php");}
if(isset($_GET['masach'])){
$id=$_GET['masach'];
unset($_SESSION['cart'][$id]);
header("location:index.php");}

?>