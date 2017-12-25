<?php 
  include "config/config.php";
  include ROOT."/include/autoload.php";
  if(!empty($_SESSION['cart'])){
    $s=0; 
    foreach ($_SESSION['cart'] as $key => $value) { 
       
      
      $s=$s+$_SESSION['cart'][$key]['giagoc']*$_SESSION['cart'][$key]['soluong'];
    }}
?>
<script >
  function confirmxoa()
  {
    if(window.confirm("Bạn có muốn xóa sản phẩm này không?"))
    {
      return true;
    }else{
      return false;
    }
  }
</script>
<!DOCTYPE html>
<html lang="en">
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<meta charset="utf-8">
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>Bookstations - Website bán sách</title>
<script src="jquery-3.2.1.min.js"></script>
<!-- Favicons Icon -->
<link rel="icon" href="images/icon.png" type="image/x-icon" />
<link rel="shortcut icon" href="images/icon.png" type="image/x-icon" />

<!-- Mobile Specific -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS Style -->
<!--<link rel="stylesheet" href="css/animate.css" type="text/css">-->
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="css/slider.css" type="text/css">
<link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="css/owl.theme.css" type="text/css">
<link rel="stylesheet" href="css/font-awesome.css" type="text/css">
<link rel="stylesheet" href="css/style.css" type="text/css">

<!-- Google Fonts -->
<link href='https://fonts.googleapis.com/css?family=Bitter:400,700,400italic' rel='stylesheet' type='text/css'>
</head>

<body class="cms-index-index">
<div class="page"> 
  <!-- Header -->
  <header class="header-container">
    <?php include ROOT."/include/header.php"; ?>
   </header>
  <!-- end header --> 
  <!-- Navbar -->
  <nav>
    <div class="container">
      
        <!-- End Search-col --> 
      <?php include ROOT."/include/navbar.php"; ?>
    </div>
  </nav>
  <div class="page-title" style="margin-left: 70">
    <br>
            <h2>Giỏ hàng của bạn</h2><br>
          </div>
          <div class="table-responsive" style="margin-left: 70">
            <?php 
            if(isset($_SESSION['cart'])&& !empty($_SESSION['cart'])){?>
            <form method="post" action="updatecart.php">
              <fieldset>
                <table id="shopping-cart-table" class="data-table cart-table">
                  <thead>
                    <tr class="first last" align="center">
                      <th rowspan="1">STT</th>
                      <th rowspan="1"><span class="nobr">Tên sách</span></th>
                      <th class="hidden-phone" rowspan="1"><span class="nobr">Giá sách</span></th>
                      <th rowspan="1" class="a-center ">Số lượng sách</th>
                      <th class="a-center" colspan="1">Thành tiền</th>
                      <th rowspan="1" class="a-center">Hành động</th>
                    </tr>
                  </thead>
                  <tfoot>
                   
                    <tr class="first last">
                      <td colspan="8" class="a-right last"><button title="Continue Shopping" class="button btn-continue" name="ttmh"><span>Tiếp tục mua hàng </span></button>
                        <button type="submit" name="ok" value="update_qty" title="Update Cart" class="button btn-update"><span>Cập nhật </span></button>
                        <button type="submit" name="update_cart_action" value="empty_cart" title="Clear Cart" class="button" id="empty_cart_button"><span>Xóa hết</span></button></td>
                    </tr></form>
                    <?php
    if(!empty($_SESSION['cart'])){
      $i=0;
      foreach ($_SESSION['cart'] as $key => $value) {
        $i++;
      
  ?>
                  </tfoot>
                  <tbody>
                    
                    <tr >
    <td><?php echo $i;?></td>
    <td>
      <div style="float: left;"><img height="30" width="30"  src="products-images/<?php if(isset($_SESSION['cart'][$key]['urlhinh'])) echo $_SESSION['cart'][$key]['urlhinh'];?>" /></div><div  style="float: left; line-height: 30px; "><?php if(isset($_SESSION['cart'][$key]['tensach'])) 
      echo $_SESSION['cart'][$key]['tensach'];?></div>
      
    </td>
    <td>
      <?php if(isset($_SESSION['cart'][$key]['giagoc'])) echo $_SESSION['cart'][$key]['giagoc'];?>
    </td>
    <td><input type="text" name="<?php echo $key ?>" id="sl_<?php echo $key ?>" value="<?php echo $_SESSION['cart'][$key]['soluong'];?>">
    </td>
    <td>
      <?php if(isset($_SESSION['cart'][$key]['giagoc']))  echo $_SESSION['cart'][$key]['soluong']*$_SESSION['cart'][$key]['giagoc'];?>
    </td>
    <td>
      <a  href='xoacart.php?id=<?php echo $key;?>' onclick='return confirmxoa()'>Xóa</a>
    </td>
  </tr>
<?php }?> 
                  </tbody>
                </table>

               
              </fieldset>
            </form>
          </div><?php } } ?>
          
  <!-- End main container --> 
  <div class="cart-collaterals row">
            <div class="col-sm-4">
              <div class="shipping">
               
                <div class="shipping-form">
                  
                        <div class="input-box">
                          
                        </div>
                     
                        <div class="input-box">
                          
                          
                        </div>
                     
                        <div class="input-box">
                          
                        </div>
                      
                    <div class="buttons-set11">
                  
                    </div>
                   
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="discount">
                
              </div>
            </div>
            <div class="totals col-sm-4">
              <h3>Tổng tiền giỏ hàng</h3>
              <div class="inner">
                <table id="shopping-cart-totals-table"> 
                  <tfoot>
                    <tr>
                      <td colspan="1" class="a-left" style=""><strong>Tổng cộng</strong></td>
                      <td class="a-right" style=""><strong><span style="font-size: 20" class="price"><?php if(isset($s)) echo number_format($s);?></span></strong></td>
                    </tr>
                  </tfoot>
                  <tbody>
                    
                  </tbody>
                </table>
                <ul class="checkout">
                  <li>
                    <button class="button btn-proceed-checkout" title="Proceed to Checkout" type="button"><span>ĐỒNG Ý THANH TOÁN</span></button>
                  </li>
                  
                </ul>
              </div>
              <!--inner--> 
              
            </div>
          </div>
  <!-- Latest Blog -->
  
  <!-- Footer -->
  <footer class="footer">
    <?php include ROOT."/include/footer.php"; ?>
  </footer>
  <!-- End Footer --> 
  
</div>

<!-- JavaScript --> 
<script type="text/javascript" src="js/jquery.min.js"></script> 
<script type="text/javascript" src="js/bootstrap.min.js"></script> 
<script type="text/javascript" src="js/parallax.js"></script> 
<script type="text/javascript" src="js/common.js"></script> 
<script type="text/javascript" src="js/slider.js"></script> 
<script type="text/javascript" src="js/owl.carousel.min.js"></script> 
<script type="text/javascript">
    //<![CDATA[
  jQuery(function() {
    jQuery(".slideshow").cycle({
      fx: 'scrollHorz', easing: 'easeInOutCubic', timeout: 10000, speedOut: 800, speedIn: 800, sync: 1, pause: 1, fit: 0,       pager: '#home-slides-pager',
      prev: '#home-slides-prev',
      next: '#home-slides-next'
    });
  });
    //]]>
    </script>
</body>

</html>