<?php session_start();
	if(isset($_GET['ac'])=='logout'){
		unset($_SESSION['admin']);
		 header("location:index.php");
	}
?>
<?php 
	include "config/config.php";
  include ROOT."/include/autoload.php";
  $obj=new sach();
include "leftadmin.php";
  ?>


<!-- Title area -->
<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h5>Sách</h5>
			<span>Quản lý sách</span>
		</div>
		
		<div class="horControlB menu_action">
			<ul>
				<li><a href="themsach.php">
					<img src="images/icons/control/16/add.png" />
					<span>Thêm mới</span>
				</a></li>
			</ul>
		</div>
		
		<div class="clear"></div>
	</div>
</div>
<div class="line"></div>

<?php $data=$obj->getAll();?>
<!-- Message -->
<!-- Main content wrapper -->
<div class="wrapper" id="main_product">
	<div class="widget">
	
		<div class="title">
			<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
			<h6>
				Danh sách Sách		</h6>
		 	<div class="num f12">Số lượng: <b><?php echo count($data);?></b></div>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
			
			<thead class="filter"><tr><td colspan="6">
				<form class="list_filter form" action="index.php/admin/product.html" method="get">
					<table cellpadding="0" cellspacing="0" width="80%"><tbody>
					
						<tr>
							<td class="label" style="width:40px;"><label for="filter_id">Tên</label></td>
							<td class="item" style="width:155px;" ><input name="name" value="" id="filter_iname" type="text" style="width:155px;" /></td>	
							<td style='width:150px'>
							<input type="submit" class="button blueB" value="Lọc" />
							</td>
							
						</tr>
					</tbody></table>
				</form>
			</tr></thead>
			
			<thead>
				
				<tr>
					
					<td style="width:60px;">Mã sách</td>
					<td>Tên sách</td>
					<td>Giá gốc</td>
					<td>Giá giảm</td>
					<td style="width:75px;">Mã nxb</td>
					<td style="width:75px;">Mã thể loại</td>
					<td style="width:120px;">Hành động</td>
				</tr>
			</thead>
			
 			<tfoot class="auto_check_pages">
				
			</tfoot>
			
			<tbody class="list_item">
				<?php foreach ($data as $value) {
		$m=$value['masach']; ?>
		
			      			       <tr class='row_9' align="center">
					
					
					<td class="textC"><?php echo $value["masach"];?></td>
					
					<td>
					<div class="image_thumb">
						<img  src="products-images/<?php echo $value['urlhinh'];?>" />
						<div class="clear"></div>
					</div>
					
					<a href="product/view/9.html" class="tipS" title="" target="_blank">
					<b><?php echo $value["tensach"];?></b>
					</a>
					</td>
					
					<td class="textR">
					<?php echo $value["giagoc"];?>
                           				
					</td>

					<td class="textR">
					<?php echo $value["giagiam"];?>
                           				
					</td>
					<td class="textC"><?php echo $value["manxb"];?></td>
					<td class="textC"><?php echo $value["matheloai"];?></td>
					<td class="option textC">
											   						
												<a  href="product/view/9.html" target='_blank' class='tipS' title="Xem chi tiết sản phẩm">
								<img src="images/icons/color/view.png" />
						 </a>
						 <a href="suasach.php?masach=<?php echo $m;?>" title="Chỉnh sửa" class="tipS">
							<img src="images/icons/color/edit.png" />
						</a>
						
						<a href="xoasach.php?masach=<?php echo $m;?>" title="Xóa" class="tipS verify_action" >
						    <img src="images/icons/color/delete.png" />
						</a>
					</td>
				</tr>	
		        			</tbody>
			<?php } ?>
		</table>
	</div>
	
</div>		<div class="clear mt30"></div>
		
	    <!-- Footer -->
	    <div id="footer">
	    		        <div class="wrapper">
	        	
	        </div>
	     </div>
	</div>
	<div class="clear"></div>
</body>
</html>