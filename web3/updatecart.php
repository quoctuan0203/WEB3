<?php
session_start();
if(isset($_POST['ok'])){
	unset($_POST['ok']);
	echo "<pre>";
	print_r($_POST);
	print_r($_SESSION['cart']);
		foreach ($_POST as $key => $value) {
		$_SESSION['cart'][$key]['soluong']=$value;
		}
}
header("location:shopping_cart.php");
?>