<?php
$servername= "localhost";
$user= "root";
$pass="";
$dbname="quanlysach";
$connect=mysqli_connect($servername,$user,$pass,$dbname);
mysqli_set_charset($connect,'utf8');
include "config/config.php";
  include ROOT."/include/autoload.php";
  session_start();
  	//$obj=new sach();

	if(isset($_GET['masach'])){
		$masach=$_GET['masach'];
		$sql="select * from sach where masach ='$masach'";
		$results = mysqli_query($connect, $sql);
		$data=mysqli_fetch_row($results);
		//$data=$obj->getSach($masach);
		
		if(!empty($_SESSION['cart'])){
			$cart=$_SESSION['cart'];
			if(array_key_exists($masach, $cart)){
				$cart[$masach]=array(
					"soluong"=>(int)$cart[$masach]['soluong']+1,
							"giagoc"=>$data[3],
					"tensach"=>$data[1],
					"urlhinh"=>$data[5]
			);
			
			}else{
				$cart[$masach]=array(
					"soluong"=>1,
								"giagoc"=>$data[3],
					"tensach"=>$data[1],
					"urlhinh"=>$data[5]
			);
				
			}

		}
		else{
			$cart[$masach]=array(
				"soluong"=>1,
								"giagoc"=>$data[3],
					"tensach"=>$data[1],
					"urlhinh"=>$data[5]
			);
		}
		$_SESSION['cart']=$cart;
	}else{

	}
	header("location:index.php");



