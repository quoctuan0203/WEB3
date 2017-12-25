<?php session_start();?>
<h2>Danh sách sản phẩm đã mua</h2>
<table>
	<tr>
		<th>STT</th>
		<th>Tên sách</th>
		<th>Giá sách</th>
		<th>Số lượng sách</th>
		<th>Thành tiền</th>
		<th>Hành động</th>
	</tr>
	<?php
		if(!empty($_SESSION['cart'])){
			$i=0;
			foreach ($_SESSION['cart'] as $key => $value) {
				$i++;
			
	?>
	<tr align="center">
		<td><?php echo $i;?></td>
		<td>
			<div style="float: left;"><img height="30" width="30"  src="products-images/<?php echo $_SESSION['cart'][$key]['urlhinh'];?>" /></div><div  style="float: left; line-height: 30px; "><?php echo $_SESSION['cart'][$key]['tensach'];?></div>
			
		</td>
		<td>
			<?php echo $_SESSION['cart'][$key]['giagoc'];?>
		</td>
		<td>
			<?php echo $_SESSION['cart'][$key]['soluong'];?>
		</td>
		<td>
			<?php echo $_SESSION['cart'][$key]['soluong']*$_SESSION['cart'][$key]['giagoc'];?>
		</td>
		<td></td>
	</tr>
<?php }} ?>
</table>
<?php echo "<pre>";
print_r($_SESSION['cart']);
?>
