<?php session_start();
date_default_timezone_set('Asia/Kolkata');
require 'dashboard/include/dbconfig.php';

$blog_id = $_GET['urlname']; 
$img_blog1 = $blog_title = $blog_category = $descr = $url_c = $show_date1 = $bmeta_title = $bmeta_descr = '';
$sql = $con->query("select * from blogs where status = '1' and url = '".substr($blog_id, 0, -4)."'");
if($row_blogs = $sql->fetch_assoc())
  {  
    
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

    $bmeta_title = $row_blogs['meta_title'];
    $bmeta_descr = $row_blogs['meta_descr'];

  }

  $actual_link = "http://$_SERVER[HTTP_HOST]/".$base_url;


?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require 'include/header.php'; ?>
<meta name="description" content="<?php echo $bmeta_descr;?>">
<meta name="author" content="">
<link rel="canonical" href="<?php echo $actual_link; ?>" />

<title><?php echo $bmeta_title;?></title>

<meta property="og:url" content="<?php echo $actual_link; ?>" />
<meta property="og:type" content="<?php echo $blog_category; ?>" />
<meta property="og:title" content="<?php echo $bmeta_title; ?>" />
<meta property="og:description" content="<?php echo $bmeta_descr; ?>" />
<meta property="og:image" content="<?php echo $img_blog1; ?>" />

<style type="text/css">
  p{
    text-align: justify;
  }
  h1{
    font-size: 25px;
  }
  h2{
    font-size: 22px;
  }
  h3{
    font-size: 20px;
  }
  h4{
    font-size: 20px;
  }
  h5{
    font-size: 20px;
  }
  h6{
    font-size: 20px;
  }
  strong a{
      color: #39b54a;
  }
</style>


</head>
  
<body>

<!-- Wrap -->

<div id="wrap"> 

  

  <!-- header -->

  <?php require 'include/header_links.php'; ?>
  <section class="sub-bnr">
    <div class="position-center-center">
      <div class="container">
        <h4>Blogs</h4>
        <ol class="breadcrumb">
          <li><a href="javascript:void(0);">Home</a></li>
          <li>Blogs</li>
          <li class="active"><?php echo $blog_title; ?></li>
        </ol>
      </div>
    </div>
  </section>
  <!--======= HOME MAIN SLIDER =========-->
<section class="blog-list blog-list-3 single-post padding-top-100 padding-bottom-100">
      <div class="container">
        <div class="row">
          <div class="col-md-9"> 
            
            <!-- Article -->
            <article> 
              <!-- Post Img --> 
              <!-- Tittle -->
              <div class="post-tittle left"> <a href="javascript:void(0);" class="tittle"><?php echo $blog_title; ?></a> 
                <!-- Post Info --> 
                <span><i class="primary-color icon-user"></i> by admin</span> <span><i class="primary-color icon-calendar"></i> <?php echo $show_date1; ?></span>  <span><i class="primary-color icon-tag"></i> <?php echo $blog_category; ?></span> </div>
              <!-- Post Content -->
              <div class="text-left">
                
              <img class="img-responsive" src="<?php echo $img_blog1; ?>" alt="<?php echo $blog_title; ?>" > 
                <p><?php echo $descr; ?></p>
                
                <!-- Tags 
                <div class="row margin-top-50">
                  <div class="col-md-12">
                    <h5 class="shop-tittle">share with</h5>
                    <ul class="share-post">
                      <li><a href="javascript:void(0);"><i class="icon-social-facebook"></i> Facebook</a></li>
                      <li><a href="javascript:void(0);"><i class="icon-social-twitter"></i> twitter</a></li>
                    </ul>
                  </div>
                </div>-->
                
            
              </div>
            </article>
            <hr>
            
          </div>
          
          <!-- Sider Bar -->
          <div class="col-md-3">
            <div class="shop-sidebar"> 
              
              <!-- SEARCH -->
              <div class="search">
                <input class="form-control" type="search" placeholder="Search">
                <button type="submit"><i class="fa fa-search"></i></button>
              </div>
              
              <!-- Category -->
              <h5 class="shop-tittle margin-bottom-30">category</h5>
              <ul class="shop-cate">
                <?php 
                $blog_categ = $con->query("select categ_name from blog_categ_list order by id desc");
                while($row_categ = $blog_categ->fetch_assoc())
                { 
                  $count = $con->query("SELECT * FROM blogs WHERE status='1' and blog_category = '".$row_categ['categ_name']."'")->num_rows;
              ?>
                <li><a href="javascript:void(0);"> <?php echo $row_categ['categ_name']; ?> <span><?php echo $count; ?></span></a></li>
              <?php } ?>
              </ul>
              
              <!-- Recent Post -->
              <h5 class="shop-tittle margin-top-60 margin-bottom-30">recent post</h5>
              <ul class="papu-post margin-top-20">
                <?php 
                $blog_recent = $con->query("select * from blogs where status = '1' order by id desc LIMIT 5");
                while($row_recent = $blog_recent->fetch_assoc())
                { 
                  $img_blog = '';
                  if($row_recent['images'] == ''){
                    $img_blog = 'images/sm-post-1.jpg';
                  }else{
                    $img_blog = 'dashboard/'.$row_recent['images'];
                  }
                  $create_date = $row_recent['creation_date'];

                  $theDate    = new DateTime($create_date);
                  $show_date = $theDate->format('M d');
                  $url_c = $row_recent['url'];
                  $base_url  = $url_c;
              ?>
                <li class="media">
                  <div class="media-left"> <a href="javascript:void(0);"> <img class="media-object" src="<?php echo $img_blog; ?>" alt="<?php echo $row_recent['blog_title']; ?>"></a> </div>
                  <div class="media-body"> <a class="media-heading" href="<?php echo $base_url; ?>"><?php echo $row_recent['blog_title']; ?></a> <span>Posted on <?php echo $show_date; ?></span> </div>
                </li>
                <?php } ?>
              </ul>
              
            </div>
          </div>
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