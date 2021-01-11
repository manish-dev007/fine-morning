<?php session_start();
extract($_GET);  
date_default_timezone_set('Asia/Kolkata');
require 'dashboard/include/dbconfig.php';
$product_id = $_GET['urlname']; 
if ($product_id == '') { ?>
  <script type="text/javascript">window.location.href="404";</script>
<?php }
$pro_url = substr($product_id, 0, -4);

$pro_cid = $pro_price = 0;
$rand_n = $product_img = $product_name = $product_netwt = $p_discount = $psdesc = $pall_img = $pmeta_title = $pmeta_descr = '';
$pro_id = 0;$img_alt = '';
$pros_info = $con->query("select * from product where url_slug='".$pro_url."'");
if($row_pros = $pros_info->fetch_assoc())
{
  $rand_n = rand(10,100);
  $product_img = $row_pros['pimg'];
  $product_ID = $row_pros['id'];
  $product_rel_img = $row_pros['prel'];
  $product_name = $row_pros['pname'];
  $product_netwt = $row_pros['pgms'];
  $pro_price = $row_pros['pprice'];
  $p_discount = $row_pros['discount'];
  $psdesc = $row_pros['psdesc'];
  $pdesc = $row_pros['pdesc'];
  $pro_id = $row_pros['id'];
  $img_alt = $row_pros['img_alt'];
  $pmeta_title = $row_pros['meta_title'];
  $pmeta_descr = $row_pros['meta_descr'];
  $h1_tag = $row_pros['h1_tag'];
  if ($product_rel_img == '') {
    $pall_img = $product_img;
  }else{
    $pall_img = $product_img.",".$product_rel_img;
  }
}else{ ?>
  <script type="text/javascript">window.location.href="404";</script>
<?php }
  $sb = explode(',',$pall_img);
  if($h1_tag != ''){
      $product_name = $h1_tag;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require 'include/header.php'; ?>
<meta name="description" content="<?php echo $pmeta_descr;?>">
<meta name="author" content="Fine Morning Pharma">
<link rel="canonical" href="https://www.finemorningpharma.com/products" />

<title><?php echo $pmeta_title; ?></title>

</head>

<body>

<!-- Wrap -->
<div id="wrap"> 
  
  <?php require 'include/header_links.php'; ?>
 
  <!--======= SUB BANNER =========-->
  <section class="sub-bnr" data-stellar-background-ratio="0.5">
    <div class="position-center-center">
      <div class="container">
        <span class="head"><?php echo $product_name; ?></span>
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li class="active">Products</li>
        </ol>
      </div>
    </div>
  </section>
  
  <!-- Content -->
  <div id="content"> 
    
    <!-- Popular Products -->
    <section class="padding-top-100 padding-bottom-100">
      <div class="container"> 
        
        <!-- SHOP DETAIL -->
        <div class="shop-detail">
          <div class="row"> 

            <div class="col-md-7"> 
              
              <?php 
                    foreach($sb as $bb){
                  ?>
                  <div class="show" href="dashboard/<?php echo $bb; ?>">
                    <img src="dashboard/<?php echo $bb; ?>" id="show-img" alt="<?php echo $img_alt; ?>">
                  </div>
                <?php break; } ?>
            <div class="small-img">
              <img src="img/icon_right@2x.png" class="icon-left" alt="icon right" id="prev-img">
              <div class="small-container">
                <div id="small-img-roll">
                  <?php
                    foreach($sb as $bb){
                  ?>
<img src="dashboard/<?php echo $bb; ?>" class="show-small-img" alt="<?php echo $img_alt; ?>">
<?php } ?>
                </div>
              </div>
              <img src="img/icon_right@2x.png" class="icon-right" alt="" id="next-img">
            </div>
            </div>
            
            <!-- COntent -->
            <div class="col-md-5">
              <h1><?php echo $product_name; ?></h1>
            <label class="pros_price">
              <span class="price"><span>₹<?php echo $pro_price; ?></span></span>
              </label>
              <!-- Sale Tags -->
              <?php if($p_discount > 0){ ?>
              <div class="on-sale"> <?php echo $p_discount; ?>% <span>OFF</span> </div>
              <?php } ?>
             <p><?php echo $psdesc; ?></p>
               <?php
                    $total_qty = 1;
                    if (isset($_COOKIE['cart_items_cookie'])) {
                    $json_arrays2  = json_decode($_COOKIE['cart_items_cookie'], true);
                    foreach($json_arrays2 as $key => $val) {
                      if ($key == $pro_id) {
                        $dec_info = explode(',', $val);
                        $total_qty = $dec_info[0];
                        break;
                      }
                    } 
                  }
                  ?>
              <input type="hidden" class="hiddennetwt" value="<?php echo $product_netwt; ?>">
              <input type="hidden" class="hiddenpprice" value="<?php echo $pro_price; ?>">

              <input type="hidden" class="hiddenprice-<?php echo $product_ID; ?>" value="<?php echo $product_ID; ?>">
              <!-- Short By -->
              <div class="some-info">
                <ul class="row margin-top-30">
                  

                  <li class="col-xs-3 qty_inc">
                    <div class="quinty"> 
                                        <div class="input-group">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-left-minus btn btn-number"  data-type="minus" data-field="">
                                          <span class="glyphicon glyphicon-minus"></span>
                                        </button>
                                    </span>
                                    <input type="text" id="quantity" name="quantity" class="form-control input-number" value="<?php echo $total_qty; ?>" min="1" max="100">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-right-plus btn btn-number" data-type="plus" data-field="">
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </button>
                                    </span>
                                </div>
                    </div>
                  </li>
                  
                  <!-- ADD TO CART -->
                  <?php
                    $exst = 0;
                    if (isset($_COOKIE['cart_items_cookie'])) {
                    $json_arrays1  = json_decode($_COOKIE['cart_items_cookie'], true);
                    foreach($json_arrays1 as $key => $val) {
                      if ($key == $pro_id) {
                        $exst = 1;
                        break;
                      }
                    } 
                  }
                  ?>
                  <li class="col-xs-12 add_crt_info"> 
                    <?php if ($exst == 0) { ?>
                        <a href="javascript:void(0);" class="btn btn_add_cart" onclick="addToCart('<?php echo ($pro_id); ?>');">ADD TO CART</a>
                  <?php  }if ($exst == 1) { ?>
                      <a href="javascript:void(0);" class="btn btn_update_cart008" onclick="UpdatecartPros('<?php echo $pro_id; ?>','<?php echo $rand_n; ?>');">Update Cart</a> 
                  <?php  } ?>                    
                    
                  </li>
                  
                </ul>


                <!-- INFOMATION 
                <div class="inner-info">
                  <h6>DELIVERY INFORMATION</h6>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum finibus ligula a scelerisque gravida. Nullam laoreet tortor ac maximus alique met, consectetur adipiscing elit. </p>
                  <h6>SHIPPING & RETURNS</h6>-->
                  <!--
                  <h6>SHARE THIS PRODUCT</h6>
                  
                  <ul class="social_icons">
                    <li><a href="javascript:void(0);"><i class="icon-social-facebook"></i></a></li>
                    <li><a href="javascript:void(0);"><i class="icon-social-twitter"></i></a></li>
                    <li><a href="javascript:void(0);"><i class="icon-social-tumblr"></i></a></li>
                    <li><a href="javascript:void(0);"><i class="icon-social-youtube"></i></a></li>
                    <li><a href="javascript:void(0);"><i class="icon-social-dribbble"></i></a></li>
                  </ul>
                </div>-->
                
              </div>
              
            </div>
          </div>
        </div>
        
        <!--======= PRODUCT DESCRIPTION =========-->
        <div class="item-decribe"> 
          <!-- Nav tabs -->
          <ul class="nav nav-tabs animate fadeInUp" data-wow-delay="0.4s" role="tablist">
            <li role="presentation" class="active"><a href="#descr" role="tab" data-toggle="tab">DESCRIPTION</a></li>
          </ul>
          
          <!-- Tab panes -->
          <div class="tab-content animate fadeInUp" data-wow-delay="0.4s"> 
            <!-- DESCRIPTION -->
            <div role="tabpanel" class="tab-pane fade in active" id="descr">
              <?php echo $pdesc; ?>
            </div>
            
          </div>
        </div>
      </div>
    </section>

    <section class="shop-page padding-top-100 padding-bottom-100 home_main_pros all_product_blk">
      <div class="container">
        <div class="heading text-center">
          <h4>You might be interested in</h4></div>
        
            <div class="papular-block our_produsct001 pros_info_page"> 
        <?php 
              $sel_pros = $con->query("select * from product where status=1 order by id desc LIMIT 10");
              while($row_pros = $sel_pros->fetch_assoc())
              { 
                $rand_n = rand(10,100);
                $base_url  = 'products/'.$row_pros['url_slug'];
        ?>
          <!-- Item -->
          <div class="item"> 
            <!-- Item img -->
            <div class="item-img"> <img class="img-1" src="dashboard/<?php echo $row_pros['pimg']; ?>" alt="<?php echo $row_pros['img_alt']; ?>" > <img class="img-2" src="dashboard/<?php echo $row_pros['pimg']; ?>" alt="<?php echo $row_pros['img_alt']; ?>" > 
              <!-- Overlay -->
              <div class="overlay">
                <div class="position-center-center">
                  <div class="inn">
                    <a href="<?php echo $base_url; ?>"  data-toggle="tooltip" data-placement="top" title="View Product" ><i class="icon-eye"></i></a> 
                    <span class="add_del_cart<?php echo $rand_n; ?>">
                    <?php
                    $abc = '';$key_f = '';
                    if (isset($_COOKIE['cart_items_cookie'])) {
                      $json_array_s  = json_decode($_COOKIE['cart_items_cookie'], true);
                      foreach($json_array_s as $key => $val) { 
                          if ($key == $row_pros['id']) {
                            $abc = explode(',',$val);
                            $key_f = $key;
                          }
                      }
                        if ($key_f == $row_pros['id']) { ?>
                          <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Remove From Cart" onclick="delteHomeCart('<?php echo base64_encode($key); ?>',<?php echo $rand_n; ?>);"><i class="icon-trash"></i></a> 
                      <?php  }else{ ?>
                        <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Add To Cart" onclick="addToCartPros(<?php echo $row_pros['id']; ?>,<?php echo $rand_n; ?>);"><i class="icon-basket"></i></a>  
                      <?php  }
                      ?>
                        
                    <?php
                    }else{ ?>
                      <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Add To Cart" onclick="addToCartPros(<?php echo $row_pros['id']; ?>,<?php echo $rand_n; ?>);"><i class="icon-basket"></i></a> 
                  <?php  }
                  ?>
                  </span>
                  </div>
                </div>
              </div>
            </div>
            <!-- Item Name -->
            <div class="item-name"> <a href="<?php echo $base_url; ?>"><?php echo $row_pros['pname']; ?></a>
              <?php echo substr($row_pros['psdesc'], 0, 80); ?>
            </div>
            <!-- Price --> 
            <input type="hidden" class="hiddennet-<?php echo $row_pros['id']; ?>" value="<?php echo $row_pros['pgms']; ?>">
                <input type="hidden" class="hiddenprice-<?php echo $row_pros['id']; ?>" value="<?php echo $row_pros['pprice']; ?>">
                 

            <p class="product_price pr-<?php echo $row_pros['id']; ?>"><span class="price pr_pro_<?php echo $rand_n; ?>"><small>₹</small><?php echo $row_pros['pprice']; ?></span></p> 
          <span class="add_cart_main del_sols_cart-<?php echo $rand_n; ?>"><a href="javascript:void(0);" onclick="addToCartPros(<?php echo $row_pros['id']; ?>,<?php echo $rand_n; ?>);" class="btn view_more add_cart_sols"><i class="icon-basket"></i> Add to Cart</a></span>
        </div>
              <?php } ?>
          
        </div>
        
        </div>
    </section>

  </div>
 
  <!--======= FOOTER =========-->
  <?php require 'include/footer.php'; ?>
  <!--======= RIGHTS =========--> 
  
</div>
<?php require 'include/js.php'; ?>

</body>
</html>