<?php session_start();
include "config/config.php";
  include ROOT."/include/autoload.php";
	if(isset($_GET['ac'])=='logout'){
		unset($_SESSION['admin']);
		 header("location:index.php");
	}
	$obj = new tacgia();
	if(isset($_POST['sua'])){
$matacgia = isset($_POST["matg"])?$_POST["matg"]:0;
$tentacgia = isset($_POST["tentg"])?$_POST["tentg"]:0;
$a=$obj->updatetacgia($matacgia,$tentacgia);

header("location: dmtacgia.php");	}
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
<?php 
 	$matg= isset($_GET["matacgia"])?$_GET["matacgia"]:0;
    
	$data=$obj->getTacGia($matg);
	foreach ($data as $row) { ?>

<!-- Title area -->
<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h5>Sửa thông tin tác giả</h5>
		</div>
		
		
		
		<div class="clear"></div>
	</div>
</div>



<!-- Message -->
<!-- Main content wrapper -->
<div class="wrapper" id="main_product">
		<form action="suatacgia.php" method="post" id="Test" name="Test">
			<fieldset><div class="widget">
				<div class="title">
						<img src="images/icons/dark/add.png" class="titleIcon" />
						<h6>Thêm mới Sản phẩm</h6>
					</div>
	<div class="formRow">
	<label class="formLeft" for="param_name">Mã tác giả:<span class="req"></span></label>
	<div class="formRight">
		<span class="oneTwo"><input name="matg" value="<?php echo $matg;?>" _autocheck="true" type="hidden" /><?php echo $matg;?></span>
		<span name="name_autocheck" class="autocheck"></span>
		<div name="name_error" class="clear error"></div>
	</div><div class="clear"></div></div>
	<div class="formRow">
	<label class="formLeft" for="param_name">Tên tác giả:<span class="req">*</span></label>
	<div class="formRight">
		<span class="oneTwo"><input id="tentg" name="tentg" value="<?php echo $row["tentacgia"];?>" _autocheck="true" type="text" /></span><label id="tentg_error" class="error"></label><br />
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