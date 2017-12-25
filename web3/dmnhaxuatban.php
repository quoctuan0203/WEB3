<?php session_start();
	if(isset($_GET['ac'])=='logout'){
		unset($_SESSION['admin']);
		 header("location:index.php");
	}
?>
<?php 
	include "config/config.php";
  include ROOT."/include/autoload.php";
  $obj=new nhaxuatban();
include "leftadmin.php";
  ?>


<!-- Title area -->
<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h5>Nhà xuất bản</h5>
			<span>Quản lý nà xuất bản</span>
		</div>
		
		<div class="horControlB menu_action">
			<ul>
				<li><a href="themnxb.php">
					<img src="images/icons/control/16/add.png" />
					<span>Thêm mới</span>
				</a></li>
			</ul>
		</div>
		
		<div class="clear"></div>
	</div>
</div>
<div class="line"></div>

<?php $data=$obj->getAll_NXB();?>
<!-- Message -->
<!-- Main content wrapper -->
<div class="wrapper" id="main_product">
	<div class="widget">
	
		<div class="title">
			<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
			<h6>
				Danh sách nhà xuất bản	</h6>
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
					
					<td style="width:60px;">Mã nhà xuất bản</td>
					<td>Tên nhà xuất bản</td>
					<td style="width:120px;">Hành động</td>
				</tr>
			</thead>
			
 			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="6">
							
					     <div class='pagination'>
			               			            </div>
					</td>
				</tr>
			</tfoot>
			
			<tbody class="list_item">
				<?php foreach ($data as $value) {
		$m=$value['manxb']; ?>
		
			      			       <tr class='row_9' align="center">
					
					
					<td class="textC"><?php echo $value["manxb"];?></td>
					
					<td>
					
					
					
					<b><?php echo $value["tennxb"];?></b>
					</a>
					</td>
					
					
					
					<td class="option textC">
											   						
						 <a href="suanxb.php?manxb=<?php echo $m;?>" title="Chỉnh sửa" class="tipS">
							<img src="images/icons/color/edit.png" />
						</a>
						
						<a href="xoanxb.php?manxb=<?php echo $m;?>" title="Xóa" class="tipS verify_action" >
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