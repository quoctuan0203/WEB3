<?php session_start();
include "config/config.php";
  include ROOT."/include/autoload.php";
	if(isset($_GET['ac'])=='logout'){
		unset($_SESSION['admin']);
		 header("location:index.php");
	}
	$obj = new sach();
	
?>
<?php
if (isset($_POST["ok"]))
	{
		$tensach=isset($_POST["tensach"])?$_POST["tensach"]:false;
		$mota=isset($_POST["mota"])?$_POST["mota"]:false;
		$giagoc=isset($_POST["giagoc"])?$_POST["giagoc"]:false;
		$giagiam=isset($_POST["giagiam"])?$_POST["giagiam"]:false;
		$urlhinh=$_FILES['hinh']['name'];
		$temp = $_FILES["hinh"]["tmp_name"];
		move_uploaded_file($temp, "products-images/".$urlhinh);
		$manxb=isset($_POST["listnxb"])?$_POST["listnxb"]:false;
		$matheloai=isset($_POST["listtheloai"])?$_POST["listtheloai"]:false;
		if($tensach!=false && $mota!=false && $giagoc!=false && $giagiam!=false && $urlhinh!=false && $manxb!=false && $matheloai!=false){
		$obj->insertSach($tensach,$mota,$giagoc,$giagiam,$urlhinh,$manxb,$matheloai);
		header("location:dmsach.php");
		}
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
	var tensach    = $.trim($('#tensach').val());
	var giagoc    = eval($.trim($('#giagoc').val()));
	var giagiam    = eval($.trim($('#giagiam').val()));
	var urlhinh    = $.trim($('#hinh').val());
	var mota    = $.trim($('#mota').val());
	var extension = $('#hinh').val().split('.').pop().toLowerCase();
	
	if(jQuery.inArray(extension, ['gif','png','jpg','jpeg','']) == -1)
 			  {
   				 $('#hinh_error').text('Không phải file hình!');
   				 flag=false;
  			 }
  	else  $('#hinh_error').text('');
	if( tensach=='')
		{
			 $('#tensach_error').text('Tên sách không được trống');
			flag=false;
		}
		else  $('#tensach_error').text('');
	if(mota=='')
	{
		$('#mota_error').text('Mô tả không được trống');
		flag=false;
	}
	else  $('#mota_error').text('');
	if(giagoc=='')
	{
		$('#giagoc_error').text('Giá gốc không được trống');
		flag=false;
	}
	else  $('#giagoc_error').text('');
	if(giagiam=='')
	{
		$('#giagiam_error').text('Giá giảm không được trống');
		flag=false;
	}
	else  $('#giagiam_error').text('');
	if(giagiam>=giagoc)
	{
		$('#giagiam_error').text('Giá giảm phải nhỏ hơn giá gốc');
		flag=false;
	}
	else  $('#giagiam_error').text('');
	if(urlhinh=='')
	{
		$('#hinh_error').text('Chưa chọn hình!');
		flag=false;
	}
	else  $('#hinh_error').text('');
	return flag;
	//$('#Test').load('capnhatsach.php');
	});
	
	});

</script>
<?php include "leftadmin.php"; ?>

<!-- Title area -->
<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h3>Thêm sách</h3>
		</div>
		
		
		
		<div class="clear"></div>
	</div>
</div>



<!-- Message -->
<!-- Main content wrapper -->
<div class="wrapper" id="main_product">
	<div class="widget">
	
		<form method="post" id="Test" name="Test" enctype="multipart/form-data" action="themsach.php"  > 	
	<label class="label"><u>Tên sách:</u> </label>
	</br>
	<input name="tensach" id="tensach" type="text" size="60" placeholder="Nhập tên sách" />
	<label id="tensach_error" class="error"></label>
	</br>
	<label class="label"><u>Mô tả:</u> </label>
	</br>
	<textarea name="mota" id="mota"  size="60" placeholder="Nhập mô tả" rows="5" cols="62" maxlength="200"></textarea>  
	<label id="mota_error" class="error"></label>
	</br>
	<label class="label"><u>Giá gốc:</u> </label>
	</br>
	<input name="giagoc" id="giagoc" type="text" size="60" placeholder="Nhập giá gốc" />
	<label id="giagoc_error" class="error"></label>
	</br>
	<label class="label"><u>Giá giảm:</u> </label>
	</br>
	<input name="giagiam" id="giagiam" type="text" size="60" placeholder="Nhập giá giảm" />
	<label id="giagiam_error" class="error"></label>
	</br>
	<label class="label"><u>Mã thể loại:</u> </label>
	</br>
	<?php
			$a= new theloai();
			$b=$a->getAll_TL(); ?>
	<select name="listtheloai">
		<?php
			foreach ($b as $value) { ?>
				<option value="<?php echo $value['matheloai']; ?>"> <?php echo $value['matheloai']; ?></option>
			<?php } ?>
		?>
	</select>
	
	
	</br>
	<label class="label"><u>Mã nhà xuất bản:</u> </label>
	</br>
	<?php
			$c= new nhaxuatban();
			$d=$c->getAll_NXB(); ?>
	<select name="listnxb">
		<?php
			foreach ($d as $v) { ?>
				<option value="<?php echo $v['manxb']; ?>"> <?php echo $v['manxb']." - ". $v["tennxb"] ; ?></option>
			<?php } ?>
		?>
	</select>
	</br>
	<label class="label"><u>Hình:</u> </label>
	</br>
	<input type="file" name="hinh" id="hinh">
	<label id="hinh_error" class="error"></label>
	</br>
	<input name="ok" id="submit" type="submit" value="Submit"  class="nut"  />
</form>


	        	
	        </div>
	     </div>
	<div class="clear"></div>
</body>
</html>
