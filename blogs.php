<!DOCTYPE html>
<html lang="en">
<head>
    <?php $page_name = 'blogs';require 'include/header.php'; ?>
<meta name="description" content="<?php echo $meta_descr; ?>">
<meta property="og:title" content="<?php echo $meta_title; ?>">
<meta name="author" content="Fine Morning Pharma">
<title><?php echo $meta_title; ?></title>
<link rel="canonical" href="https://www.finemorningpharma.com/blogs" />
<style type="text/css">
  h1{
    font-size: 16px;
  }
  .blog-list article p{
    text-align: justify;
    margin-top: 15px;    font-size: 15px;
  }
  .blog-list article h1{
    display: none;
  }
  .blog-list .post-tittle a.tittle{
        font-size: 19px;margin: unset;
  }
  .blog-list .post-tittle span{
    margin-bottom: unset;
  }
  .blog-list .red-more{
    margin-top: unset;
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
          <li class="active">Blogs</li>
        </ol>
      </div>
    </div>
  </section>

  <!--======= HOME MAIN SLIDER =========-->

  <section class="blog-list blog-list-3 padding-top-100 padding-bottom-100">
      <div class="container">
        <div class="row">
          <div class="col-md-9"> 
          <?php
              $showRecordPerPage = 10;
              if(isset($_GET['page']) && !empty($_GET['page'])){
              $currentPage = $_GET['page'];
              }else{
              $currentPage = 1;
              }
              $startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;
              $totalBlogs = $con->query("SELECT * FROM blogs WHERE status='1' ")->num_rows;
              $lastPage = ceil($totalBlogs/$showRecordPerPage);
              $firstPage = 1;
              $nextPage = $currentPage + 1;
              $previousPage = $currentPage - 1;                 
          ?>

            <!-- Article -->
            <?php 
              $blog_all = $con->query("select * from blogs where status = '1' order by id desc LIMIT $startFrom, $showRecordPerPage");
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
            <article>
              <div class="row">
                <div class="col-sm-5"> 
                  <img src="<?php echo $img_blog1; ?>" alt="<?php echo $blog_title; ?>" style="width:100%;">
                </div>
                <div class="col-sm-7"> 
                  <!-- Tittle -->
                  <div class="post-tittle left"> <a href="<?php echo $base_url; ?>" class="tittle"><?php echo $blog_title; ?></a> 
                  
                    <!-- Post Info --> 
                    <span><i class="primary-color icon-user"></i> by admin</span> <span><i class="primary-color icon-calendar"></i> <?php echo $show_date1; ?></span>  <span title="<?php echo $blog_category; ?>"><i class="primary-color icon-tag"></i> <?php echo substr($blog_category, 0, 15)."..."; ?> </span> </div>
                  <!-- Post Content -->
                  <div class="text-left">
                    <p>
                      <?php echo mb_substr(strip_tags($descr), 0, 260,'utf-8')."..."; ?>
                    </p>
                    <a href="<?php echo $base_url; ?>" class="red-more">READ MORE</a> </div>
                </div>
              </div>
            </article>
              <?php } ?>
            <!-- Pagination -->
          <?php
            if($totalBlogs > $showRecordPerPage){ ?>
            <ul class="pagination in-center">
            <?php if($currentPage != $firstPage) { ?>
              <li><a href="?page=<?php echo $firstPage ?>"><i class="fa fa-angle-left"></i></a></li>
            <?php } ?>
            <?php if($currentPage >= 2) { ?>
              <li><a href="?page=<?php echo $previousPage ?>"><?php echo $previousPage ?></a></li>
            <?php } ?>
            <li class="active"><a href="?page=<?php echo $currentPage ?>"><?php echo $currentPage ?></a></li>
            <?php if($currentPage != $lastPage) { ?>
              <li><a href="?page=<?php echo $nextPage ?>"><?php echo $nextPage ?></a></li>
              <li><a href="?page=<?php echo $lastPage ?>"><i class="fa fa-angle-right"></i></a></li>            
            <?php } ?>
            </ul>
            <?php } ?>
          </div>
          
          <!-- Sider Bar -->
          <div class="col-md-3"> 
            
            <!-- SEARCH -->
            <div class="search">
              <input class="form-control" type="search" placeholder="Search">
              <button type="submit"><i class="fa fa-search"></i></button>
            </div>
            <div class="shop-sidebar"> 
              
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
                    $img_blog = 'img/sm-post.jpg';
                  }else{
                    $img_blog = 'dashboard/'.$row_recent['images'];
                  }
                  $create_date = $row_recent['creation_date'];

                  $theDate    = new DateTime($create_date);
                  $show_date = $theDate->format('M d');

                  $url_c = $row_recent['url'];
                  $base_url  = 'blogs/'.$url_c;
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