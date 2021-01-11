<!DOCTYPE html>
<html lang="en">
<head>
    <?php $page_name = 'change_password';require 'include/header.php'; ?>
<meta name="description" content="<?php echo $meta_descr; ?>">
<meta property="og:title" content="<?php echo $meta_title; ?>">
<meta name="author" content="Fine Morning Pharma">
<title><?php echo $meta_title; ?></title>

<link rel="canonical" href="https://www.finemorningpharma.com/change_password" />


</head>

<body>
<?php 
if (!isset($_SESSION['umobile'])) { ?>
  <script type="text/javascript">window.location.href = 'login.php';</script>
<?php }

?>

<!-- Wrap -->
<div id="wrap"> 
  
  <!-- header -->
  <?php require 'include/header_links.php'; ?>
 <section class="padding-top-50 padding-bottom-100 pages-in chart-page">
      <div class="container"> 

        <div class="shopping-cart profile_page">
          <div class="cart-ship-info">
            <div class="row"> 
              
              <!-- ESTIMATE SHIPPING & TAX -->
              <div class="col-sm-8">
                <h6>Change Password</h6>
                <form class="update_user_passswd" method="post">
                  <ul class="row">
                    
                    <!-- Name -->
                    <li class="col-md-12">
                      <label> *OLD PASSWORD
                        <input type="password" name="old_pwd" placeholder="Old Password" required>
                      </label>
                    </li>
                    
                    <!-- EMAIL ADDRESS -->
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
                    <input type="hidden" name="Uid">
                    
                    <li class="col-md-6">
                      <button type="submit" class="btn">UPDATE</button>
                    </li>
                  </ul>
                </form>
              </div>
            </div>
          </div>
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
  getProfileInfoId(<?php echo $uid; ?>);
  
</script>
</body>
</html>