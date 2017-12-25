<?php session_start();
include "config/config.php";
  include ROOT."/include/autoload.php";
	if(isset($_GET['ac'])=='logout'){
		unset($_SESSION['admin']);
		 header("location:index.php");
	}
	$obj = new theloai();
	if(isset($_POST['sua'])){
$matheloai = isset($_POST["matl"])?$_POST["matl"]:0;
$tentheloai = isset($_POST["tentl"])?$_POST["tentl"]:0;
echo $matheloai; echo $tentheloai;
$a=$obj->updateTheLoai($matheloai,$tentheloai);
//print_r($a);
header("location: dmtheloai.php");	
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
	var tentl   = $.trim($('#tentl').val());
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
<?php 
  
 

    $matl= isset($_GET["matheloai"])?$_GET["matheloai"]:0;echo $matl;
	$data=$obj->getTheLoai($matl);
	foreach ($data as $row) { ?>

<!-- Title area -->
<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h5>Sản phẩm</h5>
		</div>
		
		<div class="horControlB menu_action">
			<ul>
				<li><a href="admin/product/add.html">
					<img src="images/icons/control/16/add.png" />
					<span>Thêm mới</span>
				</a></li>
			
				<li>
					<a href="admin/product/?feature=1.html">
						<img src="images/icons/control/16/feature.png" />
						<span>Tiêu biểu</span>
					</a>
				</li>

				<li><a href="admin/product.html">
					<img src="images/icons/control/16/list.png" />
					<span>Danh sách</span>
				</a></li>
				
			</ul>
		</div>
		
		<div class="clear"></div>
	</div>
</div>



<!-- Message -->
<!-- Main content wrapper -->
<div class="wrapper" id="main_product">
		<form action="suatheloai.php" method="post" id="Test" name="Test">
			<fieldset><div class="widget">
				<div class="title">
						<img src="images/icons/dark/add.png" class="titleIcon" />
						<h6>Cập nhật thể loại</h6>
					</div>
	<div class="formRow">
	<label class="formLeft" for="param_name">Mã thể loại:<span class="req"></span></label>
	<div class="formRight">
		<span class="oneTwo"><input  name="matl" value="<?php echo $matl;?>" _autocheck="true" type="hidden" /><?php echo $matl;?></span>
		<span name="name_autocheck" class="autocheck"></span>
		<div name="name_error" class="clear error"></div>
	</div><div class="clear"></div></div>
	<div class="formRow">
	<label class="formLeft" for="param_name">Tên thể loại:<span class="req">*</span></label>
	<div class="formRight">
		<span class="oneTwo"><input id="tentl" name="tentl" value="<?php echo $row["tentheloai"];?>" _autocheck="true" type="text" /><label id="tentl_error" class="error"></label><br /></span><br />
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
<div class="wrapper" id="main_product">
	<div class="widget">
	
		<form action="suatheloai.php" method="post" id="Test" name="Test">
<label class="label"><u>Mã thể loại:</u> </label>
<input type="hidden" name="matl" value="<?php echo $matl;?>" /><?php echo $matl;?> 
<label id="matl_error" class="error"></label><br />
<label class="label"><u>Tên thể loại:</u> </label>
<input type="text" id="tentl" name="tentl" value="<?php echo $row["tentheloai"];?>" />
<label id="tentl_error" class="error"></label><br />
      <input type="submit" name="sua" value="Save" />
</form><?php }

?>
	        	
	        </div>
	     </div>
	<div class="clear"></div>
</body>
</html>