<?php session_start();
include "config/config.php";
  include ROOT."/include/autoload.php";
	if(isset($_GET['ac'])=='logout'){
		unset($_SESSION['admin']);
		 header("location:index.php");
	}
	$obj = new nhaxuatban();
	
?>
<?php
if (isset($_POST["ok"]))
	{
		$tennxb=isset($_POST["tennxb"])?$_POST["tennxb"]:false;
		if($tennxb !=false)
		{$obj->insertNXB($tennxb);
		header("location:dmnhaxuatban.php");}
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
	var tennxb    = $.trim($('#tennxb').val());
	if(tennxb=='')
	{
		$('#tennxb_error').text('Tên nhà xuất bản không được trống');
		flag=false;
	}
	else  $('#tennxb_error').text('');
	return flag;
	});
		});

</script>
<?php include "leftadmin.php"; ?>

<!-- Title area -->
<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h3>Thêm nhà xuất bản</h3>
		</div>
		
		
		
		<div class="clear"></div>
	</div>
</div>



<!-- Message -->
<!-- Main content wrapper -->
<div class="wrapper" id="main_product">
	<div class="widget">
	
		<form method="post" id="Test" name="Test" enctype="multipart/form-data" action="themnxb.php"  >
			<fieldset>
				
				    <div class="title">
						<img src="images/icons/dark/add.png" class="titleIcon" />
						<h6>Thêm mới Nhà xuất bản</h6>
					</div>
					<div class="tab_container">
					     <div id='tab1' class="tab_content pd0">
					         <div class="formRow">
	<label class="formLeft" for="param_name">Tên nhà xuất bản:<span class="req">*</span></label>
	<div class="formRight">
		<span class="oneTwo"><input name="tennxb" id="tennxb" placeholder="Nhập tên nhà xuất bản" _autocheck="true" type="text" /><label id="tennxb_error" class="error"></label></span>
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
