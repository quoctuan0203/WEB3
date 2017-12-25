<?php session_start();
include "config/config.php";
  include ROOT."/include/autoload.php";
	if(isset($_GET['ac'])=='logout'){
		unset($_SESSION['admin']);
		 header("location:index.php");
	}
	$obj = new nhaxuatban();
	if(isset($_POST['sua'])){
$manxb = isset($_POST["manxb"])?$_POST["manxb"]:0;
$tennxb = isset($_POST["tennxb"])?$_POST["tennxb"]:0;
$a=$obj->updateNXB($manxb,$tennxb);
print_r($a);
header("location: dmnhaxuatban.php");	}
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
	var tennxb   = $.trim($('#tennxb').val());
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
<?php 
 	
    $manxb= isset($_GET["manxb"])?$_GET["manxb"]:0;
	$data=$obj->getNXB($manxb);
	foreach ($data as $row) { ?>

<!-- Title area -->
<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h5>Nhà xuất bản</h5>
		</div>
		
		<div class="horControlB menu_action">
			<ul>
				<li><a href="admin/product/add.html">
					<img src="images/icons/control/16/add.png" />
					<span>Thêm mới</span>
				</a></li>
			
				
			</ul>
		</div>
		
		<div class="clear"></div>
	</div>
</div>



<!-- Message -->
<!-- Main content wrapper -->
<div class="wrapper" id="main_product">
		<form action="suanxb.php" method="post" id="Test" name="Test">
			<fieldset><div class="widget">
				<div class="title">
						<img src="images/icons/dark/add.png" class="titleIcon" />
						<h6>Cập nhật nhà xuất bản</h6>
					</div>
	<div class="formRow">
	<label class="formLeft" for="param_name">Mã nhà xuất bản:<span class="req"></span></label>
	<div class="formRight">
		<span class="oneTwo"><input name="manxb" value="<?php echo $manxb;?>" _autocheck="true" type="hidden" /><?php echo $manxb;?></span>
		<span name="name_autocheck" class="autocheck"></span>
		<div name="name_error" class="clear error"></div>
	</div><div class="clear"></div></div>
	<div class="formRow">
	<label class="formLeft" for="param_name">Tên nhà xuất bản:<span class="req">*</span></label>
	<div class="formRight">
		<span class="oneTwo"><input id="tennxb" name="tennxb" value="<?php echo $row["tennxb"];?>" _autocheck="true" type="text" /><label id="tennxb_error" class="error"></label><br /></span><br />
		<span name="name_autocheck" class="autocheck"></span>
	</div><div class="clear"></div></div>
	<div class="formSubmit">
	           			<input type="submit" value="Cập nhật" name="sua" class="redB" />
	           			<input type="reset" value="Hủy bỏ" class="basic" />
	           		</div>
	        		<div class="clear"></div>
				</div>
			</fieldset>
		</form>
<?php }

?>
	        	
	        </div>
	     </div>
	<div class="clear"></div>
</body>
</html>