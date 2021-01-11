<!DOCTYPE html>
<html lang="en">
<head>
<?php $page_name = 'index';require 'include/header.php'; ?>
<meta name="description" content="<?php echo $meta_descr; ?>">
<meta property="og:title" content="<?php echo $meta_title; ?>">
<meta name="author" content="Fine Morning Pharma">
<title><?php echo $meta_title; ?></title>



<meta property="og:type" content="business.business">

<meta property="og:description" content="<?php echo $meta_descr; ?>" />
<meta property="og:url" content="https://www.finemorningpharma.com/">
<meta property="og:image" content="https://www.finemorningpharma.com/dashboard/website/logo.png">
<meta property="business:contact_data:street_address" content="D-9 Narayani, Laxminagar, Nagpur - 440022, Maharashtra.">
<meta property="business:contact_data:locality" content="nagpur">
<meta property="business:contact_data:region" content="Maharashtra">
<meta property="business:contact_data:postal_code" content="440022">
<meta property="business:contact_data:country_name" content="India">

<link rel="canonical" href="https://www.finemorningpharma.com/" />


<meta name="google-site-verification" content="google-site-verification=1eG-7ybvWyxdRue830OigbuIygywIWqrWxd5TOhgzbg">
<link rel="stylesheet" type="text/css" href="css/animate.css">


<link rel="stylesheet" type="text/css" href="css/slick.css">

<link rel="stylesheet" type="text/css" href="css/util.css">
<link rel="stylesheet" type="text/css" href="css/main1.css">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Pharmacy",
  "name": "Fine Morning Pharma",
  "image": "https://www.finemorningpharma.com/dashboard/website/logo.png",
  "@id": "",
  "url": "https://www.finemorningpharma.com/",
  "telephone": "+91-8767287918",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "D-9 Narayani, Laxminagar, Nagpur - 440022, Maharashtra.",
    "addressLocality": "nagpur",
    "postalCode": "440022",
    "addressCountry": "IN"
  },
  "openingHoursSpecification": {
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday",
      "Saturday",
      "Sunday"
    ],
    "opens": "00:00",
    "closes": "23:59"
  },
  "sameAs": [
    "https://www.facebook.com/finemorningpharma",
    "https://www.instagram.com/finemorningpharma/",
    "https://twitter.com/finemorningph",
    "https://www.linkedin.com/company/finemorningpharma"
  ] 
}
</script>

</head>

<body>


    <!-- Wrap -->
    <div id="wrap">

        <!-- header -->
        <?php require 'include/header_links.php'; ?>

        <!--======= HOME MAIN SLIDER =========-->


        <section class="section-slide">
            <div class="wrap-slick1">
                <div class="slick1">
                    <?php
          $fm_banner = $con->query("select * from banner");
          while($row_banner = $fm_banner->fetch_assoc())
          {
            $banner_txt1 = $row_banner['banner_text1'];
            $banner_txt2 = $row_banner['banner_text2'];
            $banner_subtxt = $row_banner['banner_subtxt'];
            $banner_btn = $row_banner['banner_btn'];
            $banner_btn_text = $row_banner['banner_btn_text'];
            $btn_url = $row_banner['btn_url'];
            ?>
                    <div class="item-slick1"
                        style="background-image: url(dashboard/<?php echo $row_banner['bimg']; ?>);">
                        <div class="container h-full">
                            
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>


        <div class="opensideZContact_wp" style="right: 0px;"><a
                href="https://wa.me/918767287918" target="_blank"><img
                    src="img/Whatsapp-512.png" alt="Whatsapp Icon"></a></div>
        <div class="opensideZContact" style="right: 0px;"><img src="img/contact-us.jpg" alt="quick enquiry" width="57"
                height="240"></div>
        <div class="sideZContact" style="right: -310px;">

            <div class="closesideZContact">x</div>

            <h6>Quick Enquiry</h6>

            <div id="divRSV">

                <form name="frmEnquiryleft" id="contact_form" id="frmEnquiryleft" method="post">

                    <input name="name" id="name" type="text" placeholder="Name*" class="inp" maxlength="75">

                    <input name="email" id="email" type="text" class="inp" placeholder="Email*" maxlength="75">

                    <input name="phone" id="phone" type="text" class="inp" maxlength="16" placeholder="Phone*">

                    <input name="subject" id="subject" type="text" class="inp" maxlength="16" placeholder="Subject*">

                    <textarea name="message_contact" class="inp message_contact" placeholder="Message"></textarea>

                    <div id="divRSVLoader">

                        <input name="submit" type="Submit" value="Submit" class="btn view_more">

                    </div>

                </form>

            </div>

        </div>


        <!-- Content -->
        <div id="content">

            <!-- New Arrival -->
            <section class="padding-top-30 padding-bottom-30 light-gray-bg top_head_icons">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="logo_dash">
                                <img src="dashboard/img/made-in-india.png" alt="made-in-india">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="logo_dash">
                                <img src="dashboard/img/100-safe.png" alt="100 percent safe">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="logo_dash">
                                <img src="dashboard/img/herbal.png" alt="herbal and natural">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="logo_dash">
                                <img src="dashboard/img/clinically.png" alt="fda approved">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="logo_dash">
                                <img src="dashboard/img/gut-health.png" alt="gut health">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="logo_dash">
                                <img src="dashboard/img/immunity.png" alt="immunity booster">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="padding-bottom-50 light-gray-bg">
                <div class="container">
                    <?php 
        $ads_img = $ads_content = $about_us = '';
        $sol_sett = $con->query("select ads_img,ads_content,about_home_page from setting");
        if($row_sett = $sol_sett->fetch_assoc())
        {
            $ads_img = $row_sett['ads_img'];
            $ads_content = $row_sett['ads_content'];
            $about_us = $row_sett['about_home_page'];
        }
    ?>
                    <!-- Main Heading -->
                    <div class="heading text-center">
                        <h4>about fine morning</h4>
                        <hr class="hr_row">
                        <span><?php echo substr($about_us, 0, 550); ?></span>
                        <a href="about" class="btn view_more">read more</a>
                    </div>
                </div>

            </section>

            <!-- Popular Products -->
            <section class="padding-bottom-50 padding-top-50">
                <div class="container">

                    <!-- Main Heading -->
                    <div class="heading text-center">
                        <h4>our products</h4>
                        <hr class="hr_row">
                        <span class="head2">“ CRAFTED METICULOUSLY FOR YOU ˮ</span>
                        <p>With an Ayurvedic combination of herbal leaves and medicines, Fine Morning Pharma has brought you ayurvedic medicines for the treatment of piles, laxative for Constipation, medicines for piles and fissure, along with stamina and immunity booster medicines. </p>
                    </div>

                    <!-- Popular Item Slide -->
                    <div class="papular-block block-slide our_produsct001 home_main_pros">
                        <?php 
              $sel_pros = $con->query("select * from product where status=1 and pcateg=0 order by id ASC LIMIT 10");
              while($row_pros = $sel_pros->fetch_assoc())
              { 
                $rand_n = rand(10,100);
                $base_url  = 'products/'.$row_pros['url_slug'];
        ?>
                        <!-- Item -->
                        <div class="item">
                            <!-- Item img -->
                            <div class="item-img"> <img class="img-1" src="dashboard/<?php echo $row_pros['pimg']; ?>"
                                    alt="<?php echo $row_pros['img_alt']; ?>"> <img class="img-2" src="dashboard/<?php echo $row_pros['pimg']; ?>" alt="<?php echo $row_pros['img_alt']; ?>">
                                <!-- Overlay -->
                                <div class="overlay">
                                    <div class="position-center-center">
                                        <div class="inn">
                                            <a href="<?php echo $base_url; ?>"
                                                data-toggle="tooltip" data-placement="top" title="View Product"><i
                                                    class="icon-eye"></i></a>
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
                                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                    title="Remove From Cart"
                                                    onclick="delteHomeCart('<?php echo base64_encode($key); ?>',<?php echo $rand_n; ?>);"><i
                                                        class="icon-trash"></i></a>
                                                <?php  }else{ ?>
                                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                    title="Add To Cart"
                                                    onclick="addToCartPros(<?php echo $row_pros['id']; ?>,<?php echo $rand_n; ?>);"><i
                                                        class="icon-basket"></i></a>
                                                <?php  }
                      ?>

                                                <?php
                    }else{ ?>
                                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                    title="Add To Cart"
                                                    onclick="addToCartPros(<?php echo $row_pros['id']; ?>,<?php echo $rand_n; ?>);"><i
                                                        class="icon-basket"></i></a>
                                                <?php  }
                  ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Item Name -->
                            <div class="item-name"> <a
                                    href="<?php echo $base_url; ?>"><?php echo $row_pros['pname']; ?></a>

                            </div>
                            <!-- Price -->
                            <input type="hidden" class="hiddennet-<?php echo $row_pros['id']; ?>"
                                value="<?php echo $row_pros['pgms']; ?>">
                            <input type="hidden" class="hiddenprice-<?php echo $row_pros['id']; ?>"
                                value="<?php echo $row_pros['pprice']; ?>">


                            <p class="product_price pr-<?php echo $row_pros['id']; ?>"><span
                                    class="price pr_pro_<?php echo $rand_n; ?>"><small>₹</small><?php echo $row_pros['pprice']; ?></span>
                            </p>
                            <?php if ($key_f == $row_pros['id']) { ?>
                            <span class="add_cart_main del_sols_cart-<?php echo $rand_n; ?>"><a
                                    title="Remove From Cart" onclick="delteHomeCart('<?php echo base64_encode($key); ?>',<?php echo $rand_n; ?>);"
                                    class="btn view_more add_cart_sols"><i class="icon-trash"></i> Remove From
                                    Cart</a></span>
                            <?php }else{ ?>
                                <span class="add_cart_main del_sols_cart-<?php echo $rand_n; ?>"><a
                                    href="javascript:void(0);"
                                    onclick="addToCartPros(<?php echo $row_pros['id']; ?>,<?php echo $rand_n; ?>);"
                                    class="btn view_more add_cart_sols"><i class="icon-basket"></i> Add to
                                    Cart</a></span>
                                <?php } ?>
                        </div>
                        <?php } ?>

                    </div>
                </div>
            </section>

            <section class="light-gray-bg shop-page padding-top-100 padding-bottom-100 home_main_pros">
                <div class="container">
                    <div class="heading text-center">
                        <h4>Combos Product</h4>
                        <hr class="hr_row">
                        <span class="head2">“ YOUR NEEDS AND OUR SOLUTION ˮ</span>
                        <p>Experience a relaxing day with herbal solutions that set you free from any discomfort about gut troubles or issues related to piles. Treat piles and fissures with the best ayurvedic medicines and get relief from Constipation with a natural laxative. </p>
                    </div>

                    <div class="papular-block our_produsct001 pros_info_page">
                        <?php 
              $sel_pros1 = $con->query("select * from product where status=1 and pcateg=1 order by id desc LIMIT 10");
              while($row_pros1 = $sel_pros1->fetch_assoc())
              { 
                $rand_n1 = rand(101,999);
                $base_url1  = 'products/'.$row_pros1['url_slug'];
        ?>
                        <!-- Item -->
                        <div class="item">
                            <!-- Item img -->
                            <div class="item-img"> <img class="img-1" src="dashboard/<?php echo $row_pros1['pimg']; ?>"
                                    alt="<?php echo $row_pros1['img_alt']; ?>"> <img class="img-2" src="dashboard/<?php echo $row_pros1['pimg']; ?>" alt="<?php echo $row_pros1['img_alt']; ?>">
                                <!-- Overlay -->
                                <div class="overlay">
                                    <div class="position-center-center">
                                        <div class="inn">
                                            <a href="<?php echo $base_url1; ?>"
                                                data-toggle="tooltip" data-placement="top" title="View Product"><i
                                                    class="icon-eye"></i></a>
                                            <span class="add_del_cart<?php echo $rand_n1; ?>">
                                                <?php
                    $abc1 = '';$key_f1 = '';
                    if (isset($_COOKIE['cart_items_cookie'])) {
                      $json_array_s1  = json_decode($_COOKIE['cart_items_cookie'], true);
                      foreach($json_array_s1 as $key => $val) { 
                          if ($key == $row_pros1['id']) {
                            $abc1 = explode(',',$val);
                            $key_f1 = $key;
                          }
                      }
                        if ($key_f1 == $row_pros1['id']) { ?>
                                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                    title="Remove From Cart"
                                                    onclick="delteHomeCart('<?php echo base64_encode($key); ?>',<?php echo $rand_n1; ?>);"><i
                                                        class="icon-trash"></i></a>
                                                <?php  }else{ ?>
                                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                    title="Add To Cart"
                                                    onclick="addToCartPros(<?php echo $row_pros1['id']; ?>,<?php echo $rand_n1; ?>);"><i
                                                        class="icon-basket"></i></a>
                                                <?php  }
                      ?>

                                                <?php
                    }else{ ?>
                                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                    title="Add To Cart"
                                                    onclick="addToCartPros(<?php echo $row_pros1['id']; ?>,<?php echo $rand_n1; ?>);"><i
                                                        class="icon-basket"></i></a>
                                                <?php  }
                  ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Item Name -->
                            <div class="item-name"> <a
                                    href="<?php echo $base_url1; ?>"><?php echo $row_pros1['pname']; ?></a>
                                    <?php echo substr($row_pros1['psdesc'], 0, 80); ?>
                            </div>
                            <!-- Price -->
                            <input type="hidden" class="hiddennet-<?php echo $row_pros1['id']; ?>"
                                value="<?php echo $row_pros1['pgms']; ?>">
                            <input type="hidden" class="hiddenprice-<?php echo $row_pros1['id']; ?>"
                                value="<?php echo $row_pros1['pprice']; ?>">


                            <p class="product_price pr-<?php echo $row_pros1['id']; ?>"><span
                                    class="price pr_pro_<?php echo $rand_n1; ?>"><small>₹</small><?php echo $row_pros1['pprice']; ?></span>
                            </p>

                            <?php if ($key_f1 == $row_pros1['id']) { ?>
                            <span class="add_cart_main del_sols_cart-<?php echo $rand_n1; ?>"><a
                                    title="Remove From Cart" onclick="delteHomeCart('<?php echo base64_encode($key); ?>',<?php echo $rand_n1; ?>);"
                                    class="btn view_more add_cart_sols"><i class="icon-trash"></i> Remove From
                                    Cart</a></span>
                            <?php }else{ ?>
                                <span class="add_cart_main del_sols_cart-<?php echo $rand_n1; ?>"><a
                                    href="javascript:void(0);"
                                    onclick="addToCartPros(<?php echo $row_pros1['id']; ?>,<?php echo $rand_n1; ?>);"
                                    class="btn view_more add_cart_sols"><i class="icon-basket"></i> Add to
                                    Cart</a></span>
                                <?php } ?>

                        </div>
                        <?php } ?>

                    </div>

                </div>
        </div>
        </section>

        <section class="cultur-block banner_third009"
            style="background-image: url('<?php echo "http://".$_SERVER['SERVER_NAME']; ?>/dashboard/<?php echo $ads_img; ?>');">

            <!-- Culture Text -->
            <div class="position-center-center">
                <div class="container">
                    <div class="col-sm-6">
                        <?php echo $ads_content; ?>
                        <a href="products" class="btn view_more">Shop now</a>
                    </div>
                </div>
            </div>
        </section>



        <!-- Knowledge Share -->
        <section class="padding-top-50 padding-bottom-50 our_solutions our_sol_block">
            <div class="container">

                <!-- Main Heading -->
                <div class="heading text-center">
                    <h4>Our Solutions</h4>
                    <hr class="hr_row">
                    <span class="head2">“ GENTLE SOLUTIONS TO YOUR TRICKY TROUBLES ˮ</span>
                    <p>Wouldn't it be better to find the right advisable physician with an appropriate herbal solution
                        for you to have that relieving and pain-free feeling? </p>
                </div>
                <?php 
              $sol_pros = $con->query("select * from product where status=1 and id=45");
              if($row_sol_pros = $sol_pros->fetch_assoc())
              { $rand_n4 = rand(10,100);
                $base_url2  = 'products/'.$row_sol_pros['url_slug']; ?>
                <!-- Img -->
                <div class="col-sm-6 cosls_right"> <img class="img-responsive"
                        src="dashboard/<?php echo $row_sol_pros['pimg1']; ?>" alt="<?php echo $row_sol_pros['img_alt']; ?>"> </div>
                <div class="col-sm-6">
                    <h4><?php echo $row_sol_pros['pname']; ?></h4>
                    <h5><?php echo $row_sol_pros['psdesc']; ?></h5>
                    <img class="img-responsive img_mob_sol_view"
                        src="dashboard/<?php echo $row_sol_pros['pimg']; ?>" alt="<?php echo $row_sol_pros['img_alt']; ?>">
                    <p><?php echo substr($row_sol_pros['pdesc'], 0, 480)."..."; ?></p>

                    <input type="hidden" class="hiddenprice-<?php echo $row_sol_pros['id']; ?>"
                        value="<?php echo $row_sol_pros['pprice']; ?>">

                    <span class="del_sols_cart-<?php echo $rand_n4; ?>"><a href="javascript:void(0);"
                            onclick="addToCartPros(<?php echo $row_sol_pros['id']; ?>,<?php echo $rand_n4; ?>);"
                            class="btn view_more add_cart_sols"><i class="icon-basket"></i> Add to Cart</a></span>
                    <a href="<?php echo $base_url2; ?>"
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
              { $rand_n5 = rand(10,100);
                $base_url3  = 'products/'.$row_sol_pros['url_slug']; ?>
                <!-- Img -->
                <div class="col-sm-6">
                    <h4><?php echo $row_sol_pros['pname']; ?></h4>
                    <h5><?php echo $row_sol_pros['psdesc']; ?></h5>
                    <img class="img-responsive img_mob_sol_view"
                        src="dashboard/<?php echo $row_sol_pros['pimg']; ?>" alt="<?php echo $row_sol_pros['img_alt']; ?>">
                    <p><?php echo substr($row_sol_pros['pdesc'], 0, 350)."..."; ?></p>
                    <span class="del_sols_cart-<?php echo $rand_n5; ?>"><a href="javascript:void(0);"
                            onclick="addToCartPros(<?php echo $row_sol_pros['id']; ?>,<?php echo $rand_n5; ?>);"
                            class="btn view_more add_cart_sols"><i class="icon-basket"></i> Add to Cart</a></span>
                    <a href="<?php echo $base_url3; ?>" class="btn view_more">know more</a>

                    <input type="hidden" class="hiddenprice-<?php echo $row_sol_pros['id']; ?>"
                        value="<?php echo $row_sol_pros['pprice']; ?>">
                </div>
                <div class="col-sm-6 cosls_right"> <img class="img-responsive"
                        src="dashboard/<?php echo $row_sol_pros['pimg1']; ?>" alt="<?php echo $row_sol_pros['img_alt']; ?>"> </div>
                <?php } ?>

            </div>
        </section>

        <section class="padding-top-50 padding-bottom-50 our_solutions our_sol_block">
            <div class="container">

                <?php 
              $sol_pros = $con->query("select * from product where status=1 and id=47");
              if($row_sol_pros = $sol_pros->fetch_assoc())
              { $rand_n6 = rand(10,100);$base_url4  = 'products/'.$row_sol_pros['url_slug']; ?>
                <!-- Img -->
                <div class="col-sm-6 cosls_right"> <img class="img-responsive"
                        src="dashboard/<?php echo $row_sol_pros['pimg1']; ?>" alt="<?php echo $row_sol_pros['img_alt']; ?>"> </div>
                <div class="col-sm-6">
                    <h4><?php echo $row_sol_pros['pname']; ?></h4>
                    <h5><?php echo $row_sol_pros['psdesc']; ?></h5>
                    <img class="img-responsive img_mob_sol_view"
                        src="dashboard/<?php echo $row_sol_pros['pimg']; ?>" alt="<?php echo $row_sol_pros['img_alt']; ?>">
                    <p><?php echo substr($row_sol_pros['pdesc'], 0, 425)."..."; ?></p>
                    <span class="del_sols_cart-<?php echo $rand_n6; ?>"><a href="javascript:void(0);"
                            onclick="addToCartPros(<?php echo $row_sol_pros['id']; ?>,<?php echo $rand_n6; ?>);"
                            class="btn view_more add_cart_sols"><i class="icon-basket"></i> Add to Cart</a></span>
                    <a href="<?php echo $base_url4; ?>"
                        class="btn view_more">know more</a>
                    <input type="hidden" class="hiddenprice-<?php echo $row_sol_pros['id']; ?>"
                        value="<?php echo $row_sol_pros['pprice']; ?>">
                </div>
                <?php } ?>

            </div>
        </section>

        <section class="light-gray-bg padding-top-50 padding-bottom-50 our_solutions our_sol_block">
            <div class="container">

                <?php 
              $sol_pros = $con->query("select * from product where status=1 and id=86");
              if($row_sol_pros = $sol_pros->fetch_assoc())
              { $rand_n7 = rand(10,100);$base_url5  = 'products/'.$row_sol_pros['url_slug']; ?>
                <!-- Img -->
                <div class="col-sm-6">
                    <h4><?php echo $row_sol_pros['pname']; ?></h4>
                    <h5><?php echo $row_sol_pros['psdesc']; ?></h5>
                    <img class="img-responsive img_mob_sol_view"
                        src="dashboard/<?php echo $row_sol_pros['pimg']; ?>" alt="<?php echo $row_sol_pros['img_alt']; ?>">
                    <p><?php echo substr($row_sol_pros['pdesc'], 0, 350)."..."; ?></p>
                    <span class="del_sols_cart-<?php echo $rand_n7; ?>"><a href="javascript:void(0);"
                            onclick="addToCartPros(<?php echo $row_sol_pros['id']; ?>,<?php echo $rand_n7; ?>);"
                            class="btn view_more add_cart_sols"><i class="icon-basket"></i> Add to Cart</a></span>
                    <a href="<?php echo $base_url5; ?>"
                        class="btn view_more">know more</a>

                    <input type="hidden" class="hiddenprice-<?php echo $row_sol_pros['id']; ?>"
                        value="<?php echo $row_sol_pros['pprice']; ?>">
                </div>
                <div class="col-sm-6 cosls_right"> <img class="img-responsive"
                        src="dashboard/<?php echo $row_sol_pros['pimg1']; ?>" alt="<?php echo $row_sol_pros['img_alt']; ?>"> </div>
                <?php } ?>

            </div>
        </section>

        <!-- Testimonial -->
        <section class="testimonial padding-top-50 padding-bottom-50">
            <div class="container">
                <div class="heading text-center">
                    <h4>Our Customers Feedback</h4>
                    <hr class="hr_row">
                    <span class="head2">“ REVIEWS THAT BRING VALUE ˮ</span>
                </div>
                <div class="row">
                    <div class="col-sm-12">

                        <div class="single-slide">
                            <?php
                                $rate = '';
                                for ($i=0; $i < 5; $i++) { 
                                   $rate .= '<i class="fa fa-star"></i>';
                                }
                            ?>

                            <div class="testi-in">
                                <h5><a href="https://www.amazon.in/Fine-Morning-Pharma-Ayurvedic-Anafine/dp/B083Q3LPS1/ref=sr_1_1_sspa?crid=12KUV2I3RQWFR&dchild=1&keywords=anafine+powder&qid=1606210842&sprefix=ANAFINE+POWDER%2Caps%2C372&sr=8-1-spons&psc=1&spLa=ZW5jcnlwdGVkUXVhbGlmaWVyPUEyREtGSUdFNlhRMDkzJmVuY3J5cHRlZElkPUEwNjEwNzk1MTZPQjEwNkg3VUxFUyZlbmNyeXB0ZWRBZElkPUEwODg5NDMzM0QxUVVHT1hUQlk4VyZ3aWRnZXROYW1lPXNwX2F0ZiZhY3Rpb249Y2xpY2tSZWRpcmVjdCZkb05vdExvZ0NsaWNrPXRydWU=#customer_review-R2P7KBN8S4M36V" target="_blank">Shreya Maheshwari</a></h5>
                                <?php echo $rate; ?>
                                <p>“Anafine Powder is very effective for digestive problems. The Best product i have used so far and showed very quick results as well. I would highly recommend as It is 100% natural and safe. Just 1 teaspoon with water before you go to bed.” </p>
                            </div>

                            <div class="testi-in">
                                <h5><a href="https://www.amazon.in/Fine-Morning-Pharma-Ayurvedic-Anafine/dp/B083Q3LPS1/ref=sr_1_1_sspa?crid=12KUV2I3RQWFR&dchild=1&keywords=anafine+powder&qid=1606210842&sprefix=ANAFINE+POWDER%2Caps%2C372&sr=8-1-spons&psc=1&spLa=ZW5jcnlwdGVkUXVhbGlmaWVyPUEyREtGSUdFNlhRMDkzJmVuY3J5cHRlZElkPUEwNjEwNzk1MTZPQjEwNkg3VUxFUyZlbmNyeXB0ZWRBZElkPUEwODg5NDMzM0QxUVVHT1hUQlk4VyZ3aWRnZXROYW1lPXNwX2F0ZiZhY3Rpb249Y2xpY2tSZWRpcmVjdCZkb05vdExvZ0NsaWNrPXRydWU=#customer_review-R2P7KBN8S4M36V" target="_blank">R D Maurya</a></h5>
                                <?php echo $rate; ?>
                                <p>“Above all the product available in market today. Response is proper in respect of constipation. I am satisfied.” </p>
                            </div>

                            <div class="testi-in">
                                <h5><a href="https://www.amazon.in/Fine-Morning-Pharma-Ayurvedic-Anafine/dp/B083Q3LPS1/ref=sr_1_1_sspa?crid=12KUV2I3RQWFR&dchild=1&keywords=anafine+powder&qid=1606210842&sprefix=ANAFINE+POWDER%2Caps%2C372&sr=8-1-spons&psc=1&spLa=ZW5jcnlwdGVkUXVhbGlmaWVyPUEyREtGSUdFNlhRMDkzJmVuY3J5cHRlZElkPUEwNjEwNzk1MTZPQjEwNkg3VUxFUyZlbmNyeXB0ZWRBZElkPUEwODg5NDMzM0QxUVVHT1hUQlk4VyZ3aWRnZXROYW1lPXNwX2F0ZiZhY3Rpb249Y2xpY2tSZWRpcmVjdCZkb05vdExvZ0NsaWNrPXRydWU=#customer_review-R2P7KBN8S4M36V" target="_blank">Vishwas Gaur</a></h5>
                                <?php echo $rate; ?>
                                <p>“Tried for the first time for Mother in Law, where I had to do a perfect choice for constipation solution. This was one choice she gave thumbs up after using for two days. ” </p>
                            </div>

                            <div class="testi-in">
                                <h5><a href="https://www.amazon.in/Fine-Morning-Pharma-Ayurvedic-Bawaseal/dp/B083PW838C/ref=sr_1_8?crid=12KUV2I3RQWFR&dchild=1&keywords=anafine+powder&qid=1606210842&sprefix=ANAFINE+POWDER%2Caps%2C372&sr=8-8#customer_review-R29M4ZFZBCI8QQ" target="_blank">Vaishali Kodande</a></h5>
                                <?php echo $rate; ?>
                                <p>“This tablets were suggested by my doctor and after my surgery, i have been taking this bawaseal pills and i have so much relief and these tablets are helpful.” </p>
                            </div>

                            <div class="testi-in">
                                <h5><a href="https://www.amazon.in/Fine-Morning-Pharma-Ayurvedic-Bawaseal/dp/B083PW838C/ref=sr_1_8?crid=12KUV2I3RQWFR&dchild=1&keywords=anafine+powder&qid=1606210842&sprefix=ANAFINE+POWDER%2Caps%2C372&sr=8-8#customer_review-R29M4ZFZBCI8QQ" target="_blank">Sapna</a></h5>
                                <?php echo $rate; ?>
                                <p>“I bought it for my mother in law who was suffering from digestion issues, And this powder worked for her. There is no sideeffects and she is using it for last 7months.” </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <section class="light-gray-bg blog-list blog-list-home padding-top-50 padding-bottom-50 social_media_bottom">
            <div class="container">

                <!-- Main Heading -->
                <div class="heading text-center">
                    <h4>Recent Blogs</h4>
                    <hr class="hr_row">
                    <span class="head2">“ CONNECT TO STAY UPDATED ˮ</span>
                </div>

        <div class="row">
          <div class="col-md-12"> 
         

            <!-- Article -->
            <?php 
              $blog_all = $con->query("select * from blogs where status = '1' order by id desc LIMIT 3");
              while($row_blogs = $blog_all->fetch_assoc())
              {  
                $img_blog1 = '';
                  if($row_blogs['images'] == ''){
                    $img_blog1 = 'img/blog-list-img.jpg';
                  }else{
                    $img_blog1 = 'dashboard/'.$row_blogs['images'];
                  }
                  $blog_title = $row_blogs['blog_title'];
                  $blog_category = $row_blogs['blog_category'];
                  $descr = $row_blogs['descr'];
                  $create_date1 = $row_blogs['creation_date'];
                  $url_c = $row_blogs['url'];

                  $theDate1    = new DateTime($create_date1);
                  $show_date1 = $theDate1->format('F d, Y');
                  $base_url  = 'blogs/'.$url_c;
            ?>
                <div class="col-sm-4"> 
                  <a title="<?php echo $blog_title; ?>" href="<?php echo $base_url; ?>"><img src="<?php echo $img_blog1; ?>" style="width:100%;" alt="<?php echo $blog_title; ?>"></a>

                  <div class="post-tittle left"> <a title="<?php echo $blog_title; ?>" href="<?php echo $base_url; ?>" class="tittle"><?php echo substr($blog_title, 0, 30); ?></a> 
                  
                    <!-- Post Info --> 
                    <span><i class="primary-color icon-user"></i> by admin</span> <span><i class="primary-color icon-calendar"></i> <?php echo $show_date1; ?></span>  <span title="<?php echo $blog_category; ?>"><i class="primary-color icon-tag"></i> <?php echo substr($blog_category, 0, 15)."..."; ?> </span> </div>
                  <!-- Post Content -->
                  <div class="text-left blog_descr">
                    <p>
                      <?php echo substr(strip_tags($descr), 0, 80)."..."; ?>
                    </p>
                    <a href="<?php echo $base_url; ?>" class="red-more">READ MORE</a> </div>
                </div>
              <?php } ?>

          </div>
          
          <!-- Sider Bar -->
          
        </div><br>
                        <a href="blogs" class="btn view_more">read more</a>

            </div>
        </section>

        <!-- Instagram -->
        <section class="padding-top-50 padding-bottom-150 social_media_bottom">
            <div class="container">

                <!-- Main Heading -->
                <div class="heading text-center">
                    <h4>We will keep you posted</h4>
                    <hr class="hr_row">
                    <span class="head2">“ CONNECT TO STAY UPDATED ˮ</span>
                </div>
                <div class="insta_image_block">
                    <img src="dashboard/product/anafine-cream-bawaseal-tablet-bawaseal-powder-pk-3.png"
                        id="instagram_profile" alt="Instagram - Fine Morning Pharmacy">
                </div>
                <h5 class="link_uname"><a href="https://www.instagram.com/finemorningpharma/"
                        target="_blank">@finemorningpharma</a></h5>


                <div class="papular-block row" id="instaFeed-style1">
                </div>
                <a href="https://www.instagram.com/finemorningpharma/" target="_blank" class="btn view_more">View
                    More</a>

            </div>
        </section>
        <section class="news-letter padding-top-50 padding-bottom-50">
            <div class="container">
                <div class="heading light-head text-center margin-bottom-30">
                    <h4>SUBSCRIBE US</h4>
                    <span>You might not wish to fill your inbox, but your troubles might just need our regular
                        updates.</span>
                </div>
                <form class="newsletter-form">
                    <input type="text" name="phhone_news" placeholder="Enter your mobile number" required>
                    <button type="submit">SEND ME</button>
                </form>
            </div>
        </section>
    </div>

    <!--======= FOOTER =========-->
    <?php require 'include/footer.php'; ?>

    <!--======= RIGHTS =========-->

    </div>
    <?php require 'include/js.php'; ?>




    <script src="js/slick.min.js"></script>
    <script src="js/slick-custom.js"></script>
    
</body>

</html>