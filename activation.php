<!DOCTYPE html>
<html lang="en">
<head>
    <?php $page_name = 'activation';require 'include/header.php'; ?>
<meta name="description" content="<?php echo $meta_descr; ?>">
<meta property="og:title" content="<?php echo $meta_title; ?>">
<meta name="author" content="Fine Morning Pharma">
<title><?php echo $meta_title; ?></title>

<link rel="canonical" href="https://www.finemorningpharma.com/activation" />

<body>

<?php
      if(isset($_SESSION['umobile'])){ ?>
        <script type="text/javascript">window.location.href = 'index';</script>
  <?php    }

  ?>

<?php
      if(!isset($_SESSION['verfy_email'])){ ?>
        <script type="text/javascript">window.location.href = 'register';</script>
  <?php    }  ?>
<!-- Wrap -->
<div id="wrap"> 
  
  <!-- header -->
  <?php require 'include/header_links.php'; ?>
  <!--======= HOME MAIN SLIDER =========-->
  <section class="chart-page  padding-100-pge padding-bottom-100">
      <div class="container"> 
        
        <!-- Payments Steps -->
        <div class="shopping-cart"> 
          
          <!-- SHOPPING INFORMATION -->
          <div class="cart-ship-info">
            <div class="row"> 
              
              <!-- ESTIMATE SHIPPING & TAX -->
              <div class="col-sm-12">
                <h6>Account Verification</h6>
                <form class="VERIFY_user" method="post">
                  <ul class="row">
                    
                    <!-- Name -->
                    <input type="hidden" name="hiddenmail" value="<?php echo $_SESSION['verfy_email']; ?>">
                    <li class="col-md-6">
                      <label> *PLEASE ENTER AN OTP SENT ON YOUR EMAIL
                        <input type="text" name="otp_validate" placeholder="Enter OTP" required>
                      </label>
                    </li>
                    <!-- PHONE -->
                    <li class="col-md-6">
                      <label style="margin-bottom: 8px;"> &nbsp;</label>
                      <button type="submit" class="btn">VERIFY</button>
                    
                    </li>
                  </ul>
                </form>
              </div>
            </div>
          </div>
          <br>
          <p>Already Registered ? <a href="login.php" class="link_arrow">Login here</a>
        </div>
      </div>
    </section>
  </div>
  
  <!--======= FOOTER =========-->
  <?php require 'include/footer.php'; ?>
  <!--======= RIGHTS =========--> 
  
</div>
<?php require 'include/js.php'; ?>
<script type="text/javascript">
  getSelectArea();
</script>
</body>
</html>