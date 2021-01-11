<!DOCTYPE html>
<html lang="en">
<head>
    <?php $page_name = 'checkout';require 'include/header.php'; ?>
<meta name="description" content="<?php echo $meta_descr; ?>">
<meta property="og:title" content="<?php echo $meta_title; ?>">
<meta name="author" content="Fine Morning Pharma">
<title><?php echo $meta_title; ?></title>

<link rel="canonical" href="https://www.finemorningpharma.com/checkout" />


</head>
<body>

<!-- Wrap -->
<div id="wrap"> 
<style>
  .hr-50{margin-top: 50px;margin-bottom: 50px;} .guest-btn{margin: 0 auto;display: block;width: 50%;}
</style>
  
  <!-- header -->
  <?php require 'include/header_links.php'; ?>
 <section class="chart-page padding-bottom-100">
      <div class="container"> 

        
        <!-- Payments Steps -->
        <div class="shopping-cart"> 
          
          <!-- SHOPPING INFORMATION -->
          <?php           
          if (!isset($_COOKIE['cart_items_cookie']) || empty($_COOKIE['cart_items_cookie'])) { ?>
            <div class="cart-err"><h3>You have no items in your Cart..!</h3><a href="products" class="btn  btn-dark margin-top-30">CONTINUE SHOPPING</a></div>
          <?php  }else{

            if (isset($_COOKIE['cart_items_cookie'])){
            $arr_cookie = json_decode($_COOKIE['cart_items_cookie']);
            if (empty($arr_cookie)) { ?>
              <div class="cart-err"><h3>You have no items in your Cart..!</h3><a href="products" class="btn  btn-dark margin-top-30">CONTINUE SHOPPING</a></div>
          <?php  }else{ ?>                
          
          <div class="cart-ship-info">
            <div class="row"> 
              
                  <div class="col-sm-7">
              <!-- ESTIMATE SHIPPING & TAX -->
              <?php if ($umob == '') { ?>
                    <h6>BILLING DETAILS</h6>
                      
                      <div class="container"> 
        <!-- Payments Steps -->

        <div class="shopping-cart"> 

          <!-- SHOPPING INFORMATION -->

          <div class="cart-ship-info">

            <div class="row"> 

              

              <!-- ESTIMATE SHIPPING & TAX -->

              <div class="col-sm-7">
                  
                  <a href="guest-checkout" class="btn guest-btn btn-dark">Guest User</a>
              <p style="text-align: center;margin: 25px 0;font-weight: 800;">OR</p>
              <hr class="hr-50">

<p style="font-size: 20px;margin: unset;">Please Login First To continue..</p><br>
                <form class="login-user" method="post">

                  <ul class="row">

                    

                    <!-- Name -->

                    <li class="col-md-12">

                      <label> MOBILE NUMBER

                        <input type="text" name="user-mobile" placeholder="Mobile Number" required>

                      </label>

                    </li>

                    <!-- LAST NAME -->

                    <li class="col-md-12">

                      <label> PASSWORD

                        <input type="password" name="password" placeholder="Password" required>

                      </label>

                    </li>

                    

                    <!-- LOGIN -->

                    <li class="col-md-4">

                      <button type="submit" class="btn">LOGIN</button>

                    </li>

                    

                    <!-- CREATE AN ACCOUNT -->

                    <li class="col-md-4">

                    </li>

                    

                    <!-- FORGET PASS -->

                    <li class="col-md-4">

                      <div class="checkbox margin-0 margin-top-20 text-right">

                        <a href="forgot_pwd">Forget Password ?</a>

                      </div>

                    </li>

                  </ul>

                </form>

                

              </div>

              

            </div>

          </div>

          <br>

          <p>New to <b>Fine Morning Pharmacy</b> ? <a href="register" class="link_arrow">Register here</a></p>

        </div>

      </div>
              <?php }else{ ?>
                <h6>BILLING DETAILS</h6>
                <a href="javascript:void(0);" class="add_new_adr_chk"><i class="fa fa-plus" aria-hidden="true"></i> Add New Address</a><a href="javascript:void(0);" class="cancel_chk_adr"><i class="fa fa-times" aria-hidden="true"></i> Cancel</a>
                <div class="checkout_addr adr_block_checkout">

                </div>
                <form class="form_add_addr_check add_new_adrs_form">
                  <ul class="row">
                    
                    <!-- Name -->
                    <li class="col-md-6">
                      <label> *FIRST NAME
                        <input type="text" name="first-name" placeholder="First Name" required>
                      </label>
                    </li>
                    <!-- LAST NAME -->
                    <li class="col-md-6">
                      <label> *LAST NAME
                        <input type="text" name="last-name" placeholder="Last Name">
                      </label>
                    </li>
                    
                    <!-- EMAIL ADDRESS -->
                    <li class="col-md-4">
                      <label> *City
                        <input type="text" name="city" placeholder="City" required>
                      </label>
                    </li>
                    <li class="col-md-4">
                      <label> *State
                        <input type="text" name="state" placeholder="State" required>
                      </label>
                    </li>
                    <!-- PHONE -->
                    <li class="col-md-4">
                      <label> *Landmark
                        <input type="text" name="landmark" placeholder="Landmark" required>
                      </label>
                    </li>
                    
                    <!-- LAST NAME -->
                    <li class="col-md-12">
                      <label> *Address
                        <input type="text" name="address" placeholder="Enter Full Address" required>
                      </label>
                    </li>
                    <input type="hidden" name="adr_id" value="0">
                    
                    <!-- LAST NAME -->
                    <li class="col-md-6">
                      <label> *Address Type
                        <select class="select_adr_type">
                            <option value="Home">Home</option>
                            <option value="Office">office</option>
                        </select>
                      </label>
                    </li>
                    <li class="col-md-6">
                      <label> *Pincode
                        <input type="number" name="pincode" placeholder="Enter Pincode" required>
                      </label>
                    </li>
                    <li class="col-md-12">
                      <label>
                        <button type="submit" class="btn btn-dark pull-left margin-top-30">Submit</button>
                      </label>
                    </li>
                    
                  </ul>
                </form>
                

              <?php } ?>

              
              
              
              </div>

              <div class="msg_odr"></div>
              
              <!-- SUB TOTAL -->
              <div class="col-sm-5 cols_mob_odr">
                <h6>YOUR ORDER</h6>
                <div class="order-place">
                  <div class="overlayLoad"><div class="lds-ring loading"><div></div><div></div><div></div></div></div>
                  <div class="order-detail checkout_order_detail">
                    <?php
                  $total = 0;
                  $ptax = 0;
                  if (isset($_COOKIE['cart_items_cookie'])) {
                    $json_arrays  = json_decode($_COOKIE['cart_items_cookie'], true);
                      foreach($json_arrays as $key => $val) {
                          $cart_pro = $con->query("select * from product where id='".$key."'");
                          if($row_cart = $cart_pro->fetch_assoc())
                          {
                            $pro_price = '';
                            $ab = explode(',',$val);

                            $subT = $ab[0]*$ab[1];
                            $total +=$subT;
                            $rand_n = rand(10,100);
                            $ptax += ($subT*12/100);
                           ?>
                           <div class="checkout_pg_items">
                              <li class="cartItem-<?php echo $key; ?>">
                                <div class="media-left">
                                  <div class="cart-img"> <a href="javascript:void(0);"> <img class="media-object img-responsive" src="dashboard/<?php echo $row_cart['pimg']; ?>" alt="<?php echo $row_cart['pname']; ?>"> </a> </div>
                                </div>
                                <div class="media-body product_price pr-<?php echo $key; ?>">
                                  <h5><?php echo $row_cart['pname']; ?></h5>
                                  <span class="price pr_pro_<?php echo $rand_n; ?>"><small>₹</small><?php echo $ab[1]; ?></span>

                                  <div class="add_more_input_inc">
                          <input type="text" value="<?php echo $ab[0]; ?>" min="0" max="100" class="cls_add_more_item_cart_<?php echo $key; ?>"><div id="inc-button" class="spinner-button" onclick="addToCartProsInc(<?php echo $key; ?>,<?php echo $rand_n; ?>);">+</div><div id="dec-button" class="spinner-button" onclick="addToCartProsDec(<?php echo $key; ?>,<?php echo $rand_n; ?>);">-</div></div>


                           <br><p class="subtotal">Subtotal: ₹ <?php echo $subT; ?><span style="float: right;"><i class="fa fa-trash" onclick="deletecartItem('<?php echo base64_encode($key); ?>',<?php echo $subT; ?>);" style="color: javascript:void(0);af1a1a;cursor: pointer;" aria-hidden="true"></i></span></p>  </div>
                              </li>
                           </div>

                        <?php  }
                      }
                    }
                  ?>
                    <?php
                        $shipping_charge = $ship_c = 0;
                        $cart_sett = $con->query("select * from setting");
                        if($row_sett = $cart_sett->fetch_assoc())
                        {    
                            $ship_c =  $row_sett['shipping_charge'];   
                            if ($total < $o_min) {
                              $shipping_charge = $row_sett['shipping_charge'];
                            }elseif ($total >= 500) {
                              $shipping_charge = 0;
                            }else{
                              $shipping_charge = $row_sett['shipping_charge']-20;
                            }   
                        }

                        

                    ?>
                    <!-- SUB TOTAL -->
                    <p class="total_b001">Subtotal : <span class="spN_subt">₹ <b> <?php echo $total; ?></b></span></p>
                    <p class="total_b001">Total Tax : <span class="spN_tax">₹ <b><?php echo $ptax; ?></b></span></p>
                    <p class="total_b001 total_shiping">Shipping Charge :  <span class="spN_shipping_c"><b>₹ <?php echo $shipping_charge; ?></b></span></p>
                        
                    
                    <input type="hidden" class="ship-charge" value="<?php echo $shipping_charge; ?>" data-val="">

                    <p class="all-total">TOTAL COST <span class="spN_total_cost">₹ <b><?php echo $total+$shipping_charge; ?></b></span></p>
                  </div>
                  <div class="pay-meth">
                    <div class="row">
                        <div class="col-md-8">
                            <p class="check_avl"><span>Check Availability </span><input type="text" class="form-control zip_chk" placeholder="Enter Pincode/Zipcode"><span class="zip_err"></span></p>
                        </div>
                        <div class="col-md-4">
                            <p class="btn_blk_prom"><span style="display: block;">&nbsp; </span><a href="javascript:void(0);" class="btn  btn-dark pull-right btn_chkPincode" onclick="check_pincode();">CHECK</a></p>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-md-8">
                            <p><span>Have Promocode ? </span><input type="text" class="form-control promo_chk" placeholder="Enter Promocode"><span class="promo_err"></span></p>
                        </div>
                        <div class="col-md-4">
                            <p class="btn_blk_prom btn_promo"><span>&nbsp; </span><a href="javascript:void(0);" class="btn  btn-dark pull-right btn_aplyPromo" onclick="apply_promo();">Apply</a></p>
                        </div>
                    </div>
                    <input type="hidden" class="hiddnZip" value="0">
                    
                    <ul class="pay_option">

                    </ul>
                    <ul>
                      <li>
                        <div class="checkbox">
                          <input id="checkbox3-4" class="styled" name="check_terms" type="checkbox">
                          <label for="checkbox3-4"> I’VE READ AND ACCEPT THE <span class="color"> <a href="terms">TERMS & CONDITIONS</a> </span> </label>
                        </div>
                      </li>
                    </ul>
                    <input type="hidden" class="ship-charge-all" value="<?php echo $ship_c; ?>" data-val="">
                    <a href="javascript:void(0);" class="btn  btn-dark pull-right margin-top-30 btn_odr_plc">PLACE ORDER</a> </div>
                </div>
              </div>
            </div>
          </div>
          <?php  
          }
            }
             } ?>
        </div>
      </div>
    </section>

    
    <br><br><br><br>
  </div>
  <?php require 'include/model.php'; ?>
  
  <!--======= FOOTER =========-->
  <?php require 'include/footer.php'; ?>
  <!--======= RIGHTS =========--> 
  
</div>
<?php require 'include/js.php'; ?>
<script type="text/javascript">
  getAddresHistoryCheckout(<?php echo $uid; ?>);
  getPaymethod();
</script>
</body>
</html>