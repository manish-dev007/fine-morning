<!DOCTYPE html>
<html lang="en">
<head>
    <?php $page_name = 'solutions';require 'include/header.php'; ?>
<meta name="description" content="<?php echo $meta_descr; ?>">
<meta property="og:title" content="<?php echo $meta_title; ?>">
<meta name="author" content="Fine Morning Pharma">
<title><?php echo $meta_title; ?></title>

<link rel="canonical" href="https://www.finemorningpharma.com/solutions" />

</head>
<body>


<!-- Wrap -->
<div id="wrap"> 
  
  <!-- header -->
  <?php require 'include/header_links.php'; ?>
  <section class="sub-bnr">
    <div class="position-center-center">
      <div class="container">
        <h4>Our Solutions</h4>
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li class="active">Solutions</li>
        </ol>
      </div>
    </div>
  </section>
<section class="padding-top-50 padding-bottom-50 our_solutions our_sol_block">
            <div class="container">

                <!-- Main Heading -->
                <div class="heading text-center">
                    <span class="head2">“ AN AMALGAMATION OF HERBAL, AYURVEDIC & 100% ORGANIC SOLUTIONS FOR PILES AND STOMACH ISSUES. ˮ</span>
                    
                </div>
                <?php 
              $sol_pros = $con->query("select * from product where status=1 and id=45");
              if($row_sol_pros = $sol_pros->fetch_assoc())
              { $rand_n4 = rand(10,100); ?>
                <!-- Img -->
                <div class="col-sm-6 cosls_right"> <img class="img-responsive"
                        src="dashboard/<?php echo $row_sol_pros['pimg']; ?>" alt="<?php echo $row_sol_pros['img_alt']; ?>"> </div>
                <div class="col-sm-6">
                    <h4><?php echo $row_sol_pros['pname']; ?></h4>
                    <h5><?php echo $row_sol_pros['psdesc']; ?></h5>
                    <img class="img-responsive img_mob_sol_view"
                        src="dashboard/<?php echo $row_sol_pros['pimg']; ?>" alt="<?php echo $row_sol_pros['img_alt']; ?>">
                    <p><?php echo $row_sol_pros['pdesc']; ?></p>

                    <input type="hidden" class="hiddenprice-<?php echo $row_sol_pros['id']; ?>"
                        value="<?php echo $row_sol_pros['pprice']; ?>">

                    <span class="del_sols_cart-<?php echo $rand_n4; ?>"><a href="javascript:void(0);"
                            onclick="addToCartPros(<?php echo $row_sol_pros['id']; ?>,<?php echo $rand_n4; ?>);"
                            class="btn view_more add_cart_sols"><i class="icon-basket"></i> Add to Cart</a></span>
                    <a href="product_info?productId=<?php echo base64_encode($row_sol_pros['id']); ?>&pName=<?php echo base64_encode($row_sol_pros['pname']); ?>"
                        class="btn view_more">know more</a>
                </div>
                <?php } ?>

            </div>
        </section>
        <section class="light-gray-bg padding-top-50 padding-bottom-50 our_solutions our_sol_block">
            <div class="container">

                <?php 
              $sol_pros = $con->query("select * from product where status=1 and id=46");
              if($row_sol_pros = $sol_pros->fetch_assoc())
              { $rand_n5 = rand(10,100); ?>
                <!-- Img -->
                <div class="col-sm-6">
                    <h4><?php echo $row_sol_pros['pname']; ?></h4>
                    <h5><?php echo $row_sol_pros['psdesc']; ?></h5>
                    <img class="img-responsive img_mob_sol_view"
                        src="dashboard/<?php echo $row_sol_pros['pimg']; ?>" alt="<?php echo $row_sol_pros['img_alt']; ?>">
                    <p><?php echo $row_sol_pros['pdesc']; ?></p>
                    <span class="del_sols_cart-<?php echo $rand_n5; ?>"><a href="javascript:void(0);"
                            onclick="addToCartPros(<?php echo $row_sol_pros['id']; ?>,<?php echo $rand_n5; ?>);"
                            class="btn view_more add_cart_sols"><i class="icon-basket"></i> Add to Cart</a></span>
                    <a href="product_info?productId=<?php echo base64_encode($row_sol_pros['id']); ?>&pName=<?php echo base64_encode($row_sol_pros['pname']); ?>"
                        class="btn view_more">know more</a>

                    <input type="hidden" class="hiddenprice-<?php echo $row_sol_pros['id']; ?>"
                        value="<?php echo $row_sol_pros['pprice']; ?>">
                </div>
                <div class="col-sm-6 cosls_right"> <img class="img-responsive"
                        src="dashboard/<?php echo $row_sol_pros['pimg']; ?>" alt="<?php echo $row_sol_pros['img_alt']; ?>"> </div>
                <?php } ?>

            </div>
        </section>

        <section class="padding-top-50 padding-bottom-50 our_solutions our_sol_block">
            <div class="container">

                <?php 
              $sol_pros = $con->query("select * from product where status=1 and id=47");
              if($row_sol_pros = $sol_pros->fetch_assoc())
              { $rand_n6 = rand(10,100); ?>
                <!-- Img -->
                <div class="col-sm-6 cosls_right"> <img class="img-responsive"
                        src="dashboard/<?php echo $row_sol_pros['pimg']; ?>" alt="<?php echo $row_sol_pros['img_alt']; ?>"> </div>
                <div class="col-sm-6">
                    <h4><?php echo $row_sol_pros['pname']; ?></h4>
                    <h5><?php echo $row_sol_pros['psdesc']; ?></h5>
                    <img class="img-responsive img_mob_sol_view"
                        src="dashboard/<?php echo $row_sol_pros['pimg']; ?>" alt="<?php echo $row_sol_pros['img_alt']; ?>">
                    <p><?php echo $row_sol_pros['pdesc']; ?></p>
                    <span class="del_sols_cart-<?php echo $rand_n6; ?>"><a href="javascript:void(0);"
                            onclick="addToCartPros(<?php echo $row_sol_pros['id']; ?>,<?php echo $rand_n6; ?>);"
                            class="btn view_more add_cart_sols"><i class="icon-basket"></i> Add to Cart</a></span>
                    <a href="product_info?productId=<?php echo base64_encode($row_sol_pros['id']); ?>&pName=<?php echo base64_encode($row_sol_pros['pname']); ?>"
                        class="btn view_more">know more</a>
                    <input type="hidden" class="hiddenprice-<?php echo $row_sol_pros['id']; ?>"
                        value="<?php echo $row_sol_pros['pprice']; ?>">
                </div>
                <?php } ?>

            </div>
        </section>

        <section class="padding-top-50 padding-bottom-50 our_solutions our_sol_block">
            <div class="container">

                <?php 
              $sol_pros = $con->query("select * from product where status=1 and id=86");
              if($row_sol_pros = $sol_pros->fetch_assoc())
              { $rand_n7 = rand(10,100); ?>
                <!-- Img -->
                <div class="col-sm-6">
                    <h4><?php echo $row_sol_pros['pname']; ?></h4>
                    <h5><?php echo $row_sol_pros['psdesc']; ?></h5>
                    <img class="img-responsive img_mob_sol_view"
                        src="dashboard/<?php echo $row_sol_pros['pimg']; ?>" alt="<?php echo $row_sol_pros['img_alt']; ?>">
                    <p><?php echo $row_sol_pros['pdesc']; ?></p>
                    <span class="del_sols_cart-<?php echo $rand_n7; ?>"><a href="javascript:void(0);"
                            onclick="addToCartPros(<?php echo $row_sol_pros['id']; ?>,<?php echo $rand_n7; ?>);"
                            class="btn view_more add_cart_sols"><i class="icon-basket"></i> Add to Cart</a></span>
                    <a href="product_info?productId=<?php echo base64_encode($row_sol_pros['id']); ?>&pName=<?php echo base64_encode($row_sol_pros['pname']); ?>"
                        class="btn view_more">know more</a>
                    <input type="hidden" class="hiddenprice-<?php echo $row_sol_pros['id']; ?>"
                        value="<?php echo $row_sol_pros['pprice']; ?>">
                </div>
                <?php } ?>
                
                <div class="col-sm-6 cosls_right"> <img class="img-responsive"
                        src="dashboard/<?php echo $row_sol_pros['pimg']; ?>" alt="<?php echo $row_sol_pros['img_alt']; ?>"> </div>
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