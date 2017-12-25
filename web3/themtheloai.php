<?php session_start();
include "config/config.php";
  include ROOT."/include/autoload.php";
	if(isset($_GET['ac'])=='logout'){
		unset($_SESSION['admin']);
		 header("location:index.php");
	}
	$obj = new theloai();
	
?>
<?php
if (isset($_POST["ok"]))
	{
		$matheloai=isset($_POST["matl"])?$_POST["matl"]:false;
		$tentheloai=isset($_POST["tentl"])?$_POST["tentl"]:false;
		if($matheloai !=false && $tentheloai!=false)
		{$obj->insertTheLoai($matheloai,$tentheloai);
		header("location:dmtheloai.php");}
	}
?>
<script src="js/jquery-3.2.1.min.js"></script>
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
		var matl    = $.trim($('#matl').val());
	var flag = true;
	var tentl    = $.trim($('#tentl').val());
	if( matl=='')
		{
			 $('#matl_error').text('Mã thể loại không được trống');
			flag=false;
		}
		else  $('#matl_error').text('');

	if(tentl=='')
	{
		$('#tentl_error').text('Tên thể loại không được trống');
		flag=false;
	}
	else  $('#tentl_error').text('');
	return flag;
	});
		});

</script>
<?php include "leftadmin.php"; ?>

<!-- Title area -->
<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h3>Thêm thể loại</h3>
		</div>
		
		
		
		<div class="clear"></div>
	</div>
</div>



<!-- Message -->
<!-- Main content wrapper -->
<div class="wrapper" id="main_product">
		<form method="post" id="Test" name="Test" enctype="multipart/form-data" action="themtheloai.php"  >
			<fieldset><div class="widget">
				<div class="title">
						<img src="images/icons/dark/add.png" class="titleIcon" />
						<h6>Thêm mới Thể loại</h6>
					</div>
	<div class="formRow">
	<label class="formLeft" for="param_name">Mã thể loại:<span class="req"></span></label>
	<div class="formRight">
		<span class="oneTwo"><input name="matl" id="matl" placeholder="Nhập mã thể loại"  _autocheck="true" type="text" /><label id="matl_error" class="error"> </label></span>
		<span name="name_autocheck" class="autocheck"></span>
		<div name="name_error" class="clear error"></div>
	</div><div class="clear"></div></div>
	<div class="formRow">
	<label class="formLeft" for="param_name">Tên thể loại:<span class="req">*</span></label>
	<div class="formRight">
		<span class="oneTwo"><input name="tentl" id="tentl" placeholder="Nhập tên thể loại"  _autocheck="true" type="text" /><label id="tentl_error" class="error"></label></span><br />
		<span name="name_autocheck" class="autocheck"></span>
	</div><div class="clear"></div></div>
	<div class="formSubmit">
	           			<input type="submit" value="Thêm mới" name="ok" id="submit" class="redB" />
	           			<input type="reset" value="Hủy bỏ" class="basic" />
	           		</div>
	        		<div class="clear"></div>
				</div>
			</fieldset>
		</form>


</html>
