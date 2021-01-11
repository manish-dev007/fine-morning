<!DOCTYPE html>
<html lang="en">
    <?php $page_name = 'recover_pwd';require 'include/header.php'; ?>
<meta name="description" content="<?php echo $meta_descr; ?>">
<meta property="og:title" content="<?php echo $meta_title; ?>">
<meta name="author" content="Fine Morning Pharma">
<title><?php echo $meta_title; ?></title>

<link rel="canonical" href="https://www.finemorningpharma.com/recover_pwd" />

<?php extract($_GET); ?>

</head>

<body>
<?php
  if($tokenId == '' || $token_sname == ''){ ?>
        <script type="text/javascript">window.location.href = 'login';</script>
  <?php } ?>
<!-- Wrap -->
<div id="wrap"> 
  
  <!-- header -->
  <?php require 'include/header_links.php'; ?>

  <?php
        $today_dt = date("Y-m-d H:i");$auth_date = '';
        $fm_usr = $con->query("select * from user where token_auth = '".$tokenId."' and email = '".base64_decode($token_sname)."'");
          if($row_fmusr = $fm_usr->fetch_assoc())
          {
            $auth_date = $row_fmusr['auth_date'];
            if (strtotime($today_dt) < strtotime($auth_date)) { ?>
                

            
  <!--======= HOME MAIN SLIDER =========-->
  <section class="chart-page padding-100-pge padding-bottom-100">
      <div class="container"> 
        
        <!-- Payments Steps -->
        <div class="shopping-cart"> 
          
          <!-- SHOPPING INFORMATION -->
          <div class="cart-ship-info">
            <div class="row"> 
              
              <!-- ESTIMATE SHIPPING & TAX -->
              <div class="col-sm-7">
                <h6>SET NEW PASSWORD</h6>
                <form class="set-new-pwd-user" method="post">
                  <ul class="row">
                    <input type="hidden" name="token-auth" value="<?php echo $tokenId; ?>">
                    <input type="hidden" name="token-email" value="<?php echo base64_decode($token_sname); ?>">
                    <!-- Name -->
                    <li class="col-md-12">
                      <label> *NEW PASSWORD
                        <input type="password" name="newpwd" placeholder="New Password" required>
                      </label>
                    </li>
                    <!-- PHONE -->
                    <li class="col-md-12">
                      <label> *CONFIRM NEW PASSWORD
                        <input type="password" name="cpwd" placeholder="Confirm new Password" required>
                      </label>
                    </li>
                    
                    <!-- LOGIN -->
                    <li class="col-md-4">
                      <button type="submit" class="btn">Submit</button>
                    </li>
                    
                    <!-- CREATE AN ACCOUNT -->
                    <li class="col-md-4">
                    </li>
                    
                    <!-- FORGET PASS -->
                    <li class="col-md-4">
                      <div class="checkbox margin-0 margin-top-20 text-right">
                        <a href="login.php" class="link_arrow">Go to login</a>
                      </div>
                    </li>
                  </ul>
                </form>
                <div class="adfg">

                </div>
              </div>
              
            </div>
          </div>
          <br>
          <p>New to <b>pinktokri.com</b> ? <a href="register.php" class="link_arrow">Register here</a>
        </div>
      </div>
    </section>
    <?php }else{ ?> 
        <script type="text/javascript">alert('Token Expired..! Please Try Again..');window.location.href = 'login';</script>
    <?php }
              
          }else{ ?>
        <script type="text/javascript">alert('Token Not Found..! Please Try Again..');window.location.href = 'login';</script>
  <?php   }

  ?>
  </div>
  
  <!--======= FOOTER =========-->
  <?php require 'include/footer.php'; ?>
  <!--======= RIGHTS =========--> 
  
</div>
<?php require 'include/js.php'; ?>

</body>
</html>

