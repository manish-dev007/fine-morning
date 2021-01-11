<?php session_start();
require 'dashboard/include/dbconfig.php'; 
date_default_timezone_set('Asia/Kolkata');
$meta_title = '';
$meta_descr = ''; 


  $fm_meta = $con->query("select * from meta_info where page = '".$page_name."'");
  $count = $con->query("select * from meta_info where page = '".$page_name."'")->num_rows;
  
  if($count > 0){
    if($row_meta = $fm_meta->fetch_assoc())
    {
        $meta_title = $row_meta['meta_title'];
        $meta_descr = $row_meta['meta_descr'];
    }
  }


?>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1" user-scalable="6">

<base href="https://www.finemorningpharma.com/">

<link rel="shortcut icon"  href="dashboard/<?php echo $fset['favicon'];?>">

<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
<link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.css" media="screen" />

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="css/ionicons.min.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/action.css?ver=1" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">

<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<!-- JavaScripts -->
<script src="js/modernizr.js"></script>

<!-- Online Fonts -->
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900' rel='stylesheet' type='text/css'>

<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;400&display=swap" rel="stylesheet">


  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-NB17DLPZ5B"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-NB17DLPZ5B');
</script>

<style type="text/css">
    .blog-list-home h1{
        display: none;
      }
      .blog-list-home .post-tittle.left a.tittle{
        font-size: 18px;
      }
</style>
