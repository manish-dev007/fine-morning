<?php
extract($_GET);  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $page_name = 'products';require 'include/header.php'; ?>
<meta name="description" content="<?php echo $meta_descr; ?>">
<meta property="og:title" content="<?php echo $meta_title; ?>">
<meta name="author" content="Fine Morning Pharma">
<title><?php echo $meta_title; ?></title>

<link rel="canonical" href="https://www.finemorningpharma.com/products" />


</head>
<body>


<!-- Wrap -->
<div id="wrap"> 
  
  <!-- header -->
  <?php require 'include/header_links.php'; ?>
<?php
    $count1 = $con->query("SELECT * FROM product WHERE status=1 and pcateg = 0")->num_rows;
    if($count1 > 0){
?>
<section class="shop-page padding-top-50 padding-bottom-50">
      <div class="container">
        <div class="row"> 
          
          
          <!-- Item Content -->
          <div class="col-sm-12">
            <div class="item-display">
              <div class="row">
              <div class="col-xs-6"> <span class="product-num categ_head">Our Products</span> </div>
                <!-- Products Select -->
                <div class="col-xs-6">
                  <div class="pull-right"> 
                    
                    <!-- sort By -->
                    <select class="selectpicker select_filter_price">
                      <option value="0">Sort By</option>
                      <option value="h2l">Price - High to Low</option>
                      <option value="l2h">Price - Low to High</option>
                    </select>
                     </div>
                </div>
              </div>
            </div>
            </div>
            <div class="col-md-row">
            <!-- Popular Item Slide -->
            <div class="papular-block row all_product_blk home_main_pros"> 
          
          <?php 
              $sel_pros = $con->query("select * from product where status=1 and pcateg = 0 order by id ASC");
              while($row_pros = $sel_pros->fetch_assoc())
              {
                $rand_n = rand(10,100);
                $base_url4  = 'products/'.$row_pros['url_slug'];
              ?>
          <!-- Item -->
          <div class="col-md-3 pros_item">
            <div class="item"  data-price="<?php echo $row_pros['pprice']; ?>"> 
            <!-- Item img -->
            <div class="item-img"> <img class="img-1" src="dashboard/<?php echo $row_pros['pimg']; ?>" alt="<?php echo $row_pros['img_alt']; ?>" > <img class="img-2" src="dashboard/<?php echo $row_pros['pimg']; ?>" alt="<?php echo $row_pros['img_alt']; ?>" > 
              <!-- Overlay -->
              <div class="overlay">
                <div class="position-center-center">
                  <div class="inn">
                    <a href="<?php echo $base_url4; ?>"  data-toggle="tooltip" data-placement="top" title="View Product" ><i class="icon-eye"></i></a> 
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
            <div class="cols_info_pros">
            <div class="item-name"> <a href="<?php echo $base_url4; ?>"><?php echo $row_pros['pname']; ?></a>
             <?php echo substr($row_pros['psdesc'], 0, 80); ?>
            </div>
            
            <!-- Price --> 
            <input type="hidden" class="hiddennet-<?php echo $row_pros['id']; ?>" value="<?php echo $row_pros['pgms']; ?>">
                <input type="hidden" class="hiddenprice-<?php echo $row_pros['id']; ?>" value="<?php echo $row_pros['pprice']; ?>">
                 
            <p class="product_price pr-<?php echo $row_pros['id']; ?>"><span class="price pr_pro_<?php echo $rand_n; ?>"><small>₹</small><?php echo $row_pros['pprice']; ?></span></p> 
            <?php if ($key_f == $row_pros['id']) { ?>
            <span class="add_cart_main del_sols_cart-<?php echo $rand_n; ?>"><a href="javascript:void(0);" onclick="delteHomeCart(<?php echo $row_pros['id']; ?>,<?php echo $rand_n; ?>);" class="btn view_more add_cart_sols"><i class="icon-trash"></i> Remove from Cart</a></span>
          <?php }else{ ?>
            <span class="add_cart_main del_sols_cart-<?php echo $rand_n; ?>"><a href="javascript:void(0);" onclick="addToCartPros(<?php echo $row_pros['id']; ?>,<?php echo $rand_n; ?>);" class="btn view_more add_cart_sols"><i class="icon-basket"></i> Add to Cart</a></span>
          <?php } ?>
        </div>
          </div>
          </div>
<?php } ?>
        </div>
            
            <!-- Pagination
            <ul class="pagination">
              <li class="active"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
            </ul> -->
          </div>
        </div>
      </div>
    </section>

<?php
    }
    $count2 = $con->query("SELECT * FROM product WHERE status=1 and pcateg = 1")->num_rows;
    if($count2 > 0){
?>

    <section class="shop-page padding-bottom-100">
      <div class="container">
        <div class="row"> 
          
          
          <!-- Item Content -->
          <div class="col-sm-12">
            <div class="item-display">
              <div class="row">
              <div class="col-xs-6"> <span class="product-num categ_head">Product (Pack of 2)</span> </div>
                <!-- Products Select -->
                <div class="col-xs-6">
                  <div class="pull-right"> 
                    
                    <!-- sort By -->
                    <select class="selectpicker select_filter_price">
                      <option value="0">Sort By</option>
                      <option value="h2l">Price - High to Low</option>
                      <option value="l2h">Price - Low to High</option>
                    </select>
                     </div>
                </div>
              </div>
            </div>
            </div>
            <div class="col-md-row">
            <!-- Popular Item Slide -->
            <div class="papular-block row all_product_blk home_main_pros"> 
          
          <?php 
              $sel_pros = $con->query("select * from product where status=1 and pcateg = 1 order by id ASC");
              while($row_pros = $sel_pros->fetch_assoc())
              {
                
                $rand_n = rand(10,100);
                $base_url  = 'products/'.$row_pros['url_slug'];
              ?>
          <!-- Item -->
          <div class="col-md-3 pros_item">
            <div class="item"  data-price="<?php echo $row_pros['pprice']; ?>"> 
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
            <div class="cols_info_pros">
            <div class="item-name"> <a href="<?php echo $base_url; ?>"><?php echo $row_pros['pname']; ?></a>
              <?php echo substr($row_pros['psdesc'], 0, 80); ?>
            </div>
            
            <!-- Price --> 
            <input type="hidden" class="hiddennet-<?php echo $row_pros['id']; ?>" value="<?php echo $row_pros['pgms']; ?>">
                <input type="hidden" class="hiddenprice-<?php echo $row_pros['id']; ?>" value="<?php echo $row_pros['pprice']; ?>">
                 

            <p class="product_price pr-<?php echo $row_pros['id']; ?>"><span class="price pr_pro_<?php echo $rand_n; ?>"><small>₹</small><?php echo $row_pros['pprice']; ?></span></p> 
            <?php if ($key_f == $row_pros['id']) { ?>
            <span class="add_cart_main del_sols_cart-<?php echo $rand_n; ?>"><a href="javascript:void(0);" onclick="delteHomeCart(<?php echo $row_pros['id']; ?>,<?php echo $rand_n; ?>);" class="btn view_more add_cart_sols"><i class="icon-trash"></i> Remove from Cart</a></span>
          <?php }else{ ?>
            <span class="add_cart_main del_sols_cart-<?php echo $rand_n; ?>"><a href="javascript:void(0);" onclick="addToCartPros(<?php echo $row_pros['id']; ?>,<?php echo $rand_n; ?>);" class="btn view_more add_cart_sols"><i class="icon-basket"></i> Add to Cart</a></span>
          <?php } ?>
            
          </div>
        </div>
          </div>
<?php } ?>
        </div>
            
            <!-- Pagination
            <ul class="pagination">
              <li class="active"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
            </ul> -->
          </div>
        </div>
      </div>
    </section>
<?php
    }
    $count3 = $con->query("SELECT * FROM product WHERE status=1 and pcateg = 2")->num_rows;
    if($count3 > 0){
?>
    <section class="shop-page padding-bottom-100">
      <div class="container">
        <div class="row"> 
          
          
          <!-- Item Content -->
          <div class="col-sm-12">
            <div class="item-display">
              <div class="row">
              <div class="col-xs-6"> <span class="product-num categ_head">Product (Pack of 3)</span> </div>
                <!-- Products Select -->
                <div class="col-xs-6">
                  <div class="pull-right"> 
                    
                    <!-- sort By -->
                    <select class="selectpicker select_filter_price">
                      <option value="0">Sort By</option>
                      <option value="h2l">Price - High to Low</option>
                      <option value="l2h">Price - Low to High</option>
                    </select>
                     </div>
                </div>
              </div>
            </div>
            </div>
            <div class="col-md-row">
            <!-- Popular Item Slide -->
            <div class="papular-block row all_product_blk home_main_pros"> 
          
          <?php 
              $sel_pros = $con->query("select * from product where status=1 and pcateg = 2 order by id ASC");
              while($row_pros = $sel_pros->fetch_assoc())
              {
                
                $rand_n = rand(10,100);
                $base_url1  = 'products/'.$row_pros['url_slug'];

              ?>
          <!-- Item -->
          <div class="col-md-3 pros_item">
            <div class="item"  data-price="<?php echo $row_pros['pprice']; ?>"> 
            <!-- Item img -->
            <div class="item-img"> <img class="img-1" src="dashboard/<?php echo $row_pros['pimg']; ?>" alt="<?php echo $row_pros['img_alt']; ?>" > <img class="img-2" src="dashboard/<?php echo $row_pros['pimg']; ?>" alt="<?php echo $row_pros['img_alt']; ?>" > 
              <!-- Overlay -->
              <div class="overlay">
                <div class="position-center-center">
                  <div class="inn">
                    <a href="<?php echo $base_url1; ?>"  data-toggle="tooltip" data-placement="top" title="View Product" ><i class="icon-eye"></i></a> 
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
            <div class="cols_info_pros">
            <div class="item-name"> <a href="<?php echo $base_url1; ?>"><?php echo $row_pros['pname']; ?></a>
              <?php echo substr($row_pros['psdesc'], 0, 80); ?>
            </div>
            
            <!-- Price --> 
            <input type="hidden" class="hiddennet-<?php echo $row_pros['id']; ?>" value="<?php echo $row_pros['pgms']; ?>">
                <input type="hidden" class="hiddenprice-<?php echo $row_pros['id']; ?>" value="<?php echo $row_pros['pprice']; ?>">
                 

            <p class="product_price pr-<?php echo $row_pros['id']; ?>"><span class="price pr_pro_<?php echo $rand_n; ?>"><small>₹</small><?php echo $row_pros['pprice']; ?></span></p>
            <?php if ($key_f == $row_pros['id']) { ?>
            <span class="add_cart_main del_sols_cart-<?php echo $rand_n; ?>"><a href="javascript:void(0);" onclick="delteHomeCart(<?php echo $row_pros['id']; ?>,<?php echo $rand_n; ?>);" class="btn view_more add_cart_sols"><i class="icon-trash"></i> Remove from Cart</a></span>
          <?php }else{ ?>
            <span class="add_cart_main del_sols_cart-<?php echo $rand_n; ?>"><a href="javascript:void(0);" onclick="addToCartPros(<?php echo $row_pros['id']; ?>,<?php echo $rand_n; ?>);" class="btn view_more add_cart_sols"><i class="icon-basket"></i> Add to Cart</a></span>
          <?php } ?>

          </div>
        </div>
          </div>
<?php } ?>
        </div>
            
            <!-- Pagination
            <ul class="pagination">
              <li class="active"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
            </ul> -->
          </div>
        </div>
      </div>
    </section>

<?php
    }
    $count4 = $con->query("SELECT * FROM product WHERE status=1 and pcateg = 3")->num_rows;
    if($count4 > 0){
?>
    <section class="shop-page padding-bottom-100">
      <div class="container">
        <div class="row"> 
          
          
          <!-- Item Content -->
          <div class="col-sm-12">
            <div class="item-display">
              <div class="row">
              <div class="col-xs-6"> <span class="product-num categ_head">Product (Pack of 4)</span> </div>
                <!-- Products Select -->
                <div class="col-xs-6">
                  <div class="pull-right"> 
                    
                    <!-- sort By -->
                    <select class="selectpicker select_filter_price">
                      <option value="0">Sort By</option>
                      <option value="h2l">Price - High to Low</option>
                      <option value="l2h">Price - Low to High</option>
                    </select>
                     </div>
                </div>
              </div>
            </div>
            </div>
            <div class="col-md-row">
            <!-- Popular Item Slide -->
            <div class="papular-block row all_product_blk home_main_pros"> 
          
          <?php 
              $sel_pros = $con->query("select * from product where status=1 and pcateg = 3 order by id ASC");
              while($row_pros = $sel_pros->fetch_assoc())
              {
                
                $rand_n = rand(10,100);
                $base_url2  = 'products/'.$row_pros['url_slug'];
              ?>
          <!-- Item -->
          <div class="col-md-3 pros_item">
            <div class="item"  data-price="<?php echo $row_pros['pprice']; ?>"> 
            <!-- Item img -->
            <div class="item-img"> <img class="img-1" src="dashboard/<?php echo $row_pros['pimg']; ?>" alt="<?php echo $row_pros['img_alt']; ?>" > <img class="img-2" src="dashboard/<?php echo $row_pros['pimg']; ?>" alt="<?php echo $row_pros['img_alt']; ?>" > 
              <!-- Overlay -->
              <div class="overlay">
                <div class="position-center-center">
                  <div class="inn">
                    <a href="<?php echo $base_url2; ?>"  data-toggle="tooltip" data-placement="top" title="View Product" ><i class="icon-eye"></i></a> 
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
            <div class="cols_info_pros">
            <div class="item-name"> <a href="<?php echo $base_url2; ?>"><?php echo $row_pros['pname']; ?></a>
              <?php echo substr($row_pros['psdesc'], 0, 80); ?>
            </div>
            
            <!-- Price --> 
            <input type="hidden" class="hiddennet-<?php echo $row_pros['id']; ?>" value="<?php echo $row_pros['pgms']; ?>">
                <input type="hidden" class="hiddenprice-<?php echo $row_pros['id']; ?>" value="<?php echo $row_pros['pprice']; ?>">
                 

            <p class="product_price pr-<?php echo $row_pros['id']; ?>"><span class="price pr_pro_<?php echo $rand_n; ?>"><small>₹</small><?php echo $row_pros['pprice']; ?></span></p> 
            <?php if ($key_f == $row_pros['id']) { ?>
            <span class="add_cart_main del_sols_cart-<?php echo $rand_n; ?>"><a href="javascript:void(0);" onclick="delteHomeCart(<?php echo $row_pros['id']; ?>,<?php echo $rand_n; ?>);" class="btn view_more add_cart_sols"><i class="icon-trash"></i> Remove from Cart</a></span>
          <?php }else{ ?>
            <span class="add_cart_main del_sols_cart-<?php echo $rand_n; ?>"><a href="javascript:void(0);" onclick="addToCartPros(<?php echo $row_pros['id']; ?>,<?php echo $rand_n; ?>);" class="btn view_more add_cart_sols"><i class="icon-basket"></i> Add to Cart</a></span>
          <?php } ?>
          
          </div>
        </div>
          </div>
<?php } ?>
        </div>
            
            <!-- Pagination
            <ul class="pagination">
              <li class="active"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
            </ul> -->
          </div>
        </div>
      </div>
    </section>
  <?php } ?>
    <br><br><br><br>
  </div>
  <?php require 'include/model.php'; ?>
  
  <!--======= FOOTER =========-->
  <?php require 'include/footer.php'; ?>
  <!--======= RIGHTS =========--> 
  
</div>
<?php require 'include/js.php'; ?>

</body>
</html>