<?php

session_start();
//echo "<pre>";
  if(!empty($_SESSION['cart'])){
    $s=0; 
    foreach ($_SESSION['cart'] as $key => $value) { 
       
      
      $s=$s+$_SESSION['cart'][$key]['giagoc']*$_SESSION['cart'][$key]['soluong'];
    }}
if(isset($_POST['dangnhap'])){
  $em=$_POST['email'];
  $mk=$_POST['mk'];
  $mk1=md5($mk);
  echo $em .'  '.$mk;
  $obj=new khachhang();
  $obj1=new admin();
  $data=$obj->ktkh($em,$mk1);
  $data1=$obj1->ktadmin($em,$mk);
  echo count($data);
  if (count($data)==1)
  {
    foreach($data as $arr)
    {
      $_SESSION['email']=$arr['tenkhachhang'];
    }
  }
  if (count($data1)==1)
  {
    foreach($data1 as $arr)
    {
      $_SESSION['admin']=$arr['taikhoan'];
     header("location:admin.php");
    }
  }
}
?>

<div class="header-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-5 col-md-5 col-xs-6"> 
            <!-- End Header Currency -->
            <div class="welcome-msg hidden-xs"> Chào mừng bạn đến với website của chúng tôi :) </div>
          </div>
          <div class="col-lg-7 col-md-7 col-xs-6"> 
            
            <!-- Header Top Links -->
            <div class="toplinks">
              <div class="links">
                <!--<div class="myaccount"><a title="My Account" href="login.html"><span>Đăng ký</span></a></div>-->
                <!-- End Header Company -->
                <?php
                  if(!isset($_SESSION['email']))
                    require "formlogin.php";
                  
                  else require "formhello.php";
                ?>
               
              </div>
            </div>
            <!-- End Header Top Links --> 
          </div>
        </div>
      </div>
    </div>
   
    <div class="header container">
      <div class="row">
        <div class="col-lg-3 col-sm-4 col-md-3"> 
          <!-- Header Logo -->
          <div class="logo"> <a title="Magento Commerce" href="index.html"><img alt="Magento Commerce" src="images/logo1.png"></a> </div>
          <!-- End Header Logo --> 
        </div>

        <div class="col-lg-9 col-xs-12">
          <div class="top-cart-contain">
            <div class="mini-cart">
              <div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle"> 
                <a href="shopping_cart.php"><span>Giỏ hàng <?php if(isset($_SESSION['cart'])) echo "(".count($_SESSION['cart'])." sản phẩm)"; else echo "chưa có sản phẩm";?></span></a></div>
              <div>
                <div style="display: none;" class="top-cart-content arrow_box">
                  <div class="block-subtitle">Những sản phẩm đã thêm gần đây</div>
                  
                  <ul id="cart-sidebar" class="mini-products-list">
                    
                   <?php  if(!empty($_SESSION['cart'])){ $i=0;
                   foreach ($_SESSION['cart'] as $key => $value) { $i++;  ?>
                    <li class="item last odd"> <a href="product_detail.html" title="Sample Product" class="product-image"><img src="products-images/<?php if(isset($_SESSION['cart'][$key]['urlhinh'])) echo $_SESSION['cart'][$key]['urlhinh'];?>"  width="55"></a>
                      <div class="product-details"> <a  href='xoacart.php?masach=<?php echo $key;?>' class="btn-remove1">Xóa sách này</a>
                        <p class="product-name"><a href="product_detail.html"><?php if(isset($_SESSION['cart'][$key]['tensach'])) echo $_SESSION['cart'][$key]['tensach'];?></a> </p>
                        <strong><?php if(isset($_SESSION['cart'])) echo $_SESSION['cart'][$key]['soluong'];?> </strong> x <span class="price"> <?php if(isset($_SESSION['cart'][$key]['giagoc'])) echo $_SESSION['cart'][$key]['giagoc'];?></span> </div><?php }} ?>
                    </li>
                 
                  </ul>
                  
                  <div class="top-subtotal">Tổng tiền: <span class="price"><?php if(isset($s)) echo $s;?></span></div>                  <div class="actions">

                    <button class="btn-checkout" ><span>Thanh toán</span></button>
                    <a href="shopping_cart.php"><button class="view-cart" ><span>Xem giỏ hàng</span></button></a>

                  </div>
                </div>
              </div>
            </div>
            <div id="ajaxconfig_info" style="display:none"> <a href="#/"></a>
              <input value="" type="hidden">
              <input id="enable_module" value="1" type="hidden">
              <input class="effect_to_cart" value="1" type="hidden">
              <input class="title_shopping_cart" value="Go to shopping cart" type="hidden">
            </div>
          </div>
        </div>
      </div>
    </div>
