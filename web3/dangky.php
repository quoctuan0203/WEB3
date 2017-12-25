


<body style="margin: 0 auto;">


<?php 
	include "config/config.php";
  include ROOT."/include/autoload.php";
  $obj=new khachhang();
  if (isset($_POST["submit"]))
	{
		$email=isset($_POST["email"])?$_POST["email"]:false;
		$password=isset($_POST["password"])? md5($_POST["password"]):false;
		$repassword=isset($_POST["repassword"])? md5($_POST["repassword"]):false;
		$ten=isset($_POST["ten"])?$_POST["ten"]:false;
		$sdt=isset($_POST["sdt"])?$_POST["sdt"]:false;
		$diachi=isset($_POST["diachi"])?$_POST["diachi"]:false;
		if( $email!=false && $password!=false && $repassword!=false && $ten!=false){
		$obj->insertKhachHang($email,$password,$ten,$diachi,$sdt);
		echo "<h3>Đăng ký thành công</h3>";
		}
	}
 ?>

<!DOCTYPE html>
<html lang="en">

<!-- Giao dien duoc chia se mien phi tai www.ptheme.net [Free HTML Download]. SKYPE[ptheme.net] - EMAIL[ptheme.net@gmail.com].-->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<meta charset="utf-8">
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>Bookstations - Website bán sách</title>

<!-- Favicons Icon -->
<link rel="icon" href="images/icon.png" type="image/x-icon" />
<link rel="shortcut icon" href="images/icon.png" type="image/x-icon" />

<!-- Mobile Specific -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS Style -->
<!--<link rel="stylesheet" href="css/animate.css" type="text/css">-->
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="css/owl.theme.css" type="text/css">
<link rel="stylesheet" href="css/font-awesome.css" type="text/css">
<link rel="stylesheet" href="css/style.css" type="text/css">

<!-- Google Fonts -->
<link href='https://fonts.googleapis.com/css?family=Bitter:400,700,400italic' rel='stylesheet' type='text/css'>
</head>

<body class="cms-index-index">
<div class="page"> 
  <!-- Header -->
  <header class="header-container">
    <?php include ROOT."/include/header.php" ?>
  </header>
  <!-- end header --> 
  <!-- Navbar -->
  <nav>
    <div class="container">
      <?php include ROOT."/include/navbar.php"; ?>
    </div>
  </nav>
  <!-- end nav -->  
  
  <!-- breadcrumbs -->
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <ul>
          <li class="home"> </li>
          <li class=""> </li>
          <li class="category13"><strong></strong></li>
        </ul>
      </div>
    </div>
  </div>

  <!-- End breadcrumbs --> 
  <!-- Two columns content -->
   <div class="main-container col2-left-layout">
    <div class="main container">
      <div class="row">
        <section class="col-main col-sm-9 col-sm-push-3">
        	<h2 align="center">Form đăng ký thành viên</h2><br>
<form action="dangky.php" method="post" id="Test" name="Test">
<table  align="center">
    <tr><td>Email:</td><td><input type="text" name="email" id="email">&nbsp(*)</td><td><label id="email_error" class="error"></label></td></tr>
	<tr><td>Mật khẩu:</td><td><input type="password" id="password" name="password">&nbsp(*)</td><td><label id="pass_error" class="error"></label></td></tr>
	<tr><td>Nhập lại mật khẩu:</td><td><input type="password" id="repassword" name="repassword">&nbsp(*)</td><td><label id="repass_error" class="error"></label></td></tr>
    <tr><td>Tên khách hàng:</td><td><input type="text" id="ten" name="ten">&nbsp(*)</td><td><label id="ten_error" class="error"></label></td></tr>  
	<tr><td>Số điện thoại:</td><td><input type="text" id="sdt" maxlength="11" onkeypress="return KTDT(/\d/,event); " name="sdt"></td><td><label id="sdt_error" class="error"></label></td></tr>
	<tr><td>Địa chỉ:</td><td><input type="text" id="diachi" name="diachi"></td><td><label id="diachi_error" class="error"></label></td></tr>
	<tr><td colspan="2" align="center">Lưu ý: Những trường có dấu (*) bắt buộc phải có dữ liệu</td></tr>
	<tr><td><br></td></tr>
    <tr><td colspan="2" align="center"><input type="submit" value="Đăng ký" name="submit">
	<input type="reset" value="reset" name="reset"></td></tr>
</table>
</form>
        </section>

        <aside class="col-right sidebar col-sm-3 col-xs-12 col-sm-pull-9">
         <?php include "include/nav-cate.php"; ?>
        </aside>
      </div>
    </div>
  </div>
  <!-- End Two columns content -->
  
  <!-- Footer -->
  <footer class="footer">
    <?php include ROOT."/include/footer.php"; ?>
  </footer>
  <!-- End Footer --> 
  
</div>
  <!--right-side-content hidden1--> 
</div>

<!-- JavaScript --> 
<script type="text/javascript" src="js/jquery.min.js"></script> 
<script type="text/javascript" src="js/bootstrap.min.js"></script> 
<script type="text/javascript" src="js/parallax.js"></script> 
<script type="text/javascript" src="js/common.js"></script> 
<script type="text/javascript" src="js/revslider.html"></script> 
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
</body>

<!-- Giao dien duoc chia se mien phi tai www.ptheme.net [Free HTML Download]. SKYPE[ptheme.net] - EMAIL[ptheme.net@gmail.com].-->
</html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bookstations - Website bán sách</title>
<style>
fieldset{width:60%; margin:100px auto;}
.error{
	color:#F00;
}
</style>
</head>
<script src="jquery-3.2.1.min.js"></script>
<script type="text/javascript">
	function KTDT(numcheck, e) 
	{
		var keynum, keychar, numcheck;
		if (window.event) 
		{	
			keynum = e.keyCode;
		}
		else if (e.which) 
		{
			keynum = e.which;
		}
		if (keynum == 8 || keynum == 127 || keynum == null || keynum == 9 || keynum == 0 || keynum == 13 ) 
			return true;
		keychar = String.fromCharCode(keynum);
		var result = numcheck.test(keychar);
		return result;
}	
$(document).ready(function()
	{
	$('#Test').submit(function(){
	var flag = true;
	var matkhau    = $.trim($('#password').val());
	var rematkhau    = $.trim($('#repassword').val());
	var ten    = $.trim($('#ten').val());
	var sdt    = $.trim($('#sdt').val());
	var diachi   = $.trim($('#diachi').val());
	var em=$.trim($('#email').val());
	if(em.indexOf("@")==-1 || em.indexOf(".")==-1 || em.indexOf("@")!=em.lastIndexOf("@")|| em.lastIndexOf(".")==em.length-1
	|| em.indexOf(".")==-1||em.lastIndexOf(".")<em.indexOf("@"))
	{
		$('#email').focus();
		 $('#email_error').text('Email sai định dạng');
	 flag=false;
	}
	else
		$('#email_error').text(" ");
	if( em=='')
		{
			$('#email').focus();
			 $('#email_error').text('Email không được trống');
			flag=false;
		}
	else  $('#email_error').text('');
	if( matkhau=='')
		{
			$('#password').focus();
			 $('#pass_error').text('Mật khẩu không được trống!');
			flag=false;
		}
	else  $('#pass_error').text('');
	if( rematkhau=='')
		{
			$('#repassword').focus();
			 $('#repass_error').text('Phải xác nhận lại mật khẩu!');
			flag=false;
		}
	else  $('#pass_error').text('');
	if( matkhau!=rematkhau)
		{
			$('#password').focus();
			 $('#repass_error').text('Mật khẩu và nhập lại mật khẩu phải giống nhau!');
			flag=false;
		}
	else  $('#repass_error').text('');
	if( ten=='')
		{
			$('#ten').focus();
			 $('#ten_error').text('Tên khách hàng không được trống');
			flag=false;
		}
	else  $('#ten_error').text('');
 	if(sdt.length<10 || sdt.length>11)
		 {	 $('#sdt').focus();
			 $('#sdt_error').text('So DT phai tu 10 den 11 ki tu');
		 flag=false;}	
	else  $('#sdt_error').text('');
	if( diachi=='')
		{
			$('#diachi').focus();
			 $('#diachi_error').text('Địa chỉ không được trống');
			flag=false;
		}
	else  $('#diachi_error').text('');
	return flag;
	});});
</script>