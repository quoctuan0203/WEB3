<?php session_start();
include "config/config.php";
  include ROOT."/include/autoload.php";
	if(isset($_GET['ac'])=='logout'){
		unset($_SESSION['admin']);
		 header("location:index.php");
	}
	$obj = new tacgia();
	
?>
<?php
if (isset($_POST["ok"]))
	{
		$tentg=isset($_POST["tentg"])?$_POST["tentg"]:false;
		if($tentg !=false)
		{$obj->insertTacGia($tentg);
		header("location:dmtacgia.php");}
	}
?>
<script src="jquery-3.2.1.min.js"></script>
<style type="text/css">
	.label{
	color: #0431B4;
	font-weight:bold;
	font-size:19px;	}
	.error{
	color:#F00;
}

</style>
<script type="text/javascript" language="javascript">
$(document).ready(function()
	{
	$('#Test').submit(function(){
	var flag = true;
	var tentg    = $.trim($('#tentg').val());
	if(tentg=='')
	{
		$('#tentg_error').text('Tên tác giả không được trống');
		flag=false;
	}
	else  $('#tentg_error').text('');
	return flag;
	});
		});

</script>
<?php include "leftadmin.php"; ?>

<!-- Title area -->
<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h3>Thêm tác giả</h3>
		</div>
		
		
		
		<div class="clear"></div>
	</div>
</div>



<!-- Message -->
<!-- Main content wrapper -->
<div class="wrapper" id="main_product">
	<div class="widget">
	
		<form method="post" id="Test" name="Test" enctype="multipart/form-data" action="themtacgia.php"  >
			<fieldset>
				
				    <div class="title">
						<img src="images/icons/dark/add.png" class="titleIcon" />
						<h6>Thêm mới Sản phẩm</h6>
					</div>
					<div class="tab_container">
					     <div id='tab1' class="tab_content pd0">
					         <div class="formRow">
	<label class="formLeft" for="param_name">Tên tác giả:<span class="req">*</span></label>
	<div class="formRight">
		<span class="oneTwo"><input name="tentg" id="tentg" placeholder="Nhập tên tác giả" _autocheck="true" type="text" /></span>
		<label id="tentg_error" class="error"></label>
  </br>
    <div class="formSubmit">
	           			<input type="submit" name="ok" id="submit" value="Thêm mới" class="redB" />
	           			<input type="reset" value="Hủy bỏ" class="basic" />
	           		</div>
	</div>
	<div class="clear"></div>
</div>
</fieldset>
</form>

</html>
