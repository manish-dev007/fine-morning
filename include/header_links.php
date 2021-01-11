<div id="loader">
  <div class="position-center-center">
    <img class="img-responsive" src="dashboard/<?php echo $fset['logo']; ?>" alt="" >
  </div>
</div>
<div class="row">
  <div class="top_offers"><span>Use Promo Code <b>FMP10</b> | Free Shipping on Order of <b>Rs. 500</b> or above.</span></div>
</div>
  <header>
    <?php
          $base = "http://" . $_SERVER['SERVER_NAME'];
          $o_min = 500;
          $umob = $uemail = $uname = $uid = '';
              if(isset($_SESSION['umobile'])){
                $umob = $_SESSION['umobile'];
              }else{
                $umob = '';
              }

              if(isset($_SESSION['uemail'])){
                $umob = $_SESSION['uemail'];
                $uemail = $_SESSION['uemail'];
              }else{
                $umob = '';
                $uemail ='';
              }

              if(isset($_SESSION['uname'])){
                $uname = $_SESSION['uname'];
              }else{
                $uname = '';
              }

              if(isset($_SESSION['uid'])){
                $uid = $_SESSION['uid'];
              }else{
                $uid = '';
              }

          ?>
          <input type="hidden" value="<?php echo $uid; ?>" class="hiddenuId">
          <input type="hidden" value="<?php echo $umob; ?>" class="hiddenuMob">
          <input type="hidden" value="<?php echo $uname; ?>" class="hiddenuname">
          <input type="hidden" value="<?php echo $uemail; ?>" class="hiddenueamil">
    <div class="sticky">
      <div class="container"> 
        
        <!-- Logo -->
        <div class="logo logo_web"> <a href="<?php echo $base; ?>"><img class="img-responsive" src="dashboard/<?php echo $fset['logo']; ?>" alt="" ></a> </div>
        <nav class="navbar ownmenu">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-open-btn" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"><i class="fa fa-navicon"></i></span> </button>
          </div>
          
          <!-- NAV -->
          <div class="collapse navbar-collapse" id="nav-open-btn">
            <ul class="nav">
              <li> <a href="<?php echo $base; ?>">Home</a></li>              
              <li> <a href="about">About </a> </li>
              <li> <a href="products">Shop </a> </li>
              <li> <a href="solutions">Products</a> </li>              
              <li> <a href="faq">FAQ's</a> </li>
              <li> <a href="blogs"> Blogs</a> </li>               
            </ul>
          </div>
          
          <!-- Nav Right -->
          <div class="nav-right">
            <ul class="navbar-right">
              
              <!-- USER INFO -->
              <?php if ($umob == '') { ?>
                <li class="user-acc"> <a href="login"><i class="icon-user"></i> </a></li>
              <?php }else{ ?>
              
              <li class="dropdown user-acc"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" ><i class="icon-user"></i> </a>
                <ul class="dropdown-menu">
                  <li>
                    <h6>HELLO! <b><?php echo strtoupper($uname); ?></b></h6>
                  </li>
                  <li><a href="checkout">View CART</a></li>
                  <li><a href="profile">ACCOUNT INFO</a></li>
                  <li><a href="change_password">CHANGE PASSWORD</a></li>
                  <li><a href="order_history">ORDER HISTORY</a></li>
                  <li><a href="my_address">MY ADDRESS</a></li>
                  <li><a href="include/logout">LOG OUT</a></li>
                </ul>
              </li>
            <?php } ?>
            <?php
              $elementCount = 0;
                if (isset($_COOKIE['cart_items_cookie'])) {
                  $json_array  = json_decode($_COOKIE['cart_items_cookie'], true);
                  $elementCount  = count($json_array);
                }
              ?>
              <!-- USER BASKET -->
              <li class="dropdown user-basket"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="icon-basket-loaded"></i><span class="span_cart_num"><?php echo $elementCount; ?></span> </a>
                <ul class="dropdown-menu">
                  <?php
                  $total = 0;
                  if (isset($_COOKIE['cart_items_cookie'])) {
                    $json_arrays  = json_decode($_COOKIE['cart_items_cookie'], true);
                      foreach($json_arrays as $key => $val) {
                          $cart_pro = $con->query("select * from product where id='".$key."'");
                          if($row_cart = $cart_pro->fetch_assoc())
                          {
                            $ab = explode(',',$val);
                            $subT = $ab[0]*$ab[1];
                            $total +=$subT;
                           ?>
                            <li class="cartItem-<?php echo $key; ?>">
                                <div class="media-left">
                                  <div class="cart-img"> <a href="#"> <img class="media-object img-responsive" src="dashboard/<?php echo $row_cart['pimg']; ?>" alt="..."> </a> </div>
                                </div>
                                <div class="media-body">
                                  <h6 class="media-heading"><?php echo $row_cart['pname']; ?> (₹ <?php echo $ab[1]; ?>)</h6>
                                  <span class="qty">QTY: <b><?php echo $ab[0]; ?></b></span> <span class="price">Subtotal: ₹ <?php echo $subT; ?><i class="fa fa-trash" onclick="deletecartItem('<?php echo base64_encode($key); ?>',<?php echo $subT; ?>);" style="float: right;color: #af1a1a;cursor: pointer;" aria-hidden="true"></i></span>  </div>
                              </li>
                        <?php  }
                      }
                    }
                  ?>
                  <?php if ($elementCount < 1) { ?>
                    <li class="head_drop_subt"><h5 class="text-center">no items in your cart</h5></li>
                  <?php }else{ ?>
                    <li class="head_drop_subt"><h5 class="text-center">SUBTOTAL: <label class="spN_subt spn-0089">₹ <b><?php echo $total; ?></b></label></h5></li>
                  <?php } ?>
                  <input type="hidden" class="cart_subTval" value="<?php echo $total; ?>">
                  <li class="margin-0 head_drop_links">
                    <div class="row">
                      <div class="col-xs-12 "> 
                        <?php if ($elementCount < 1) { ?>
                          <a href="index" class="btn view_more">Shop Now</a>
                        <?php }else{ ?>
                            <a href="checkout" class="btn view_more">CHECK OUT</a>
                        <?php } ?>
                        
                      </div>
                    </div>
                  </li>
                </ul>
              </li>
              
              <!-- SEARCH BAR -->
              <li class="dropdown"> <a href="javascript:void(0);" class="search-open"><i class=" icon-magnifier"></i></a>
                <div class="search-inside animated bounceInUp"> <i class="icon-close search-close"></i>
                  <div class="search-overlay"></div>
                  <div class="position-center-center">
                    <div class="search">
                      <form>
                        <input type="search" class="searchItem" placeholder="Search Shop"> 
                        <button type="submit"><i class="icon-check"></i></button>
                      </form>
                      <ul class="resultSearch">

                      </ul>
                    </div>
                  </div>
                </div>
              </li>
              <li class="dropdown media-icons"> <a style="margin-left: 50px;" href="https://www.facebook.com/finemorningpharma" target="_blank"><i class="fa fa-facebook-square"></i></a>
              </li>
                <li class="dropdown media-icons"> <a href="https://www.instagram.com/finemorningpharma/"
                        target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i>
</a></li>

                <li class="dropdown media-icons"> <a href="https://twitter.com/finemorningph"
                        target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i>
</a></li>

                <li class="dropdown media-icons"> <a href="https://www.linkedin.com/company/finemorningpharma"
                        target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i>
</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </header>
          <input type="hidden" class="o_min">
          <input type="hidden" class="min_odr_ship" value="<?php echo $o_min; ?>">

  <div class="col-md-12 progrs_pay">
                <div class="progress red">
                    <div class="progress-bar progress-bar-danger progress-bar-striped active" style="width:100%;">

                    </div><br>
                    <p>Redirecting to Payment Page...</p>
                </div>
            </div>