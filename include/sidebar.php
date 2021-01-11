<style type="text/css">
 
</style>
<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <span class="icon-bar"><i class="fa fa-navicon"></i></span>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="#">&nbsp;</a>
        <div id="close-sidebar">
          <i class="fa fa-times"></i>
        </div>
      </div>
      <div class="sidebar-header">
        <?php if ($umob != '') { ?>
        <div class="user-pic">
          <a href="profile"><img class="img-responsive img-rounded" src="img/user.jpg"
            alt="User picture"></a>
        </div>
        <div class="user-info">
          <span class="user-name"><a href="profile"><?php echo strtoupper($uname); ?></a></span>
          <span class="user-role"><a href="profile"><?php echo strtoupper($umob); ?></a></span>
        </div>
      <?php }else{ ?>
        <div class="user-pic">
          <img class="img-responsive img-rounded" src="img/user.jpg"
            alt="User picture">
        </div>
        <div class="user-info">
          <span class="user-name">&nbsp;</span>
          <a href="login"><span class="user-name">LOGIN or REGSITER</span></a>
        </div>
      <?php } ?>
      </div>
      <!-- sidebar-search  -->
      <div class="sidebar-menu">
        <ul>
          <li>
            <a href="index">
              <i class="fa fa-home"></i>
              <span>Home</span>
            </a>            
          </li>
          <?php if ($umob != '') { ?>
          <li>
            <a href="order_history">
              <i class="fa fa-shopping-cart"></i>
              <span>My Orders</span>
            </a>
          </li>
          <li>
            <a href="my_address">
              <i class="fa fa-map-marker"></i>
              <span>My Address</span>
            </a>       
            
            <a href="profile">
              <i class="fa fa-user"></i>
              <span>My Profile</span>
            </a>            
          </li>
          <li>
            <a href="change_password">
              <i class="fa fa-user"></i>
              <span>Change Password</span>
            </a>            
          </li>
        <?php } ?>
          <li>
            <a href="#">
              <i class="fa fa-comments"></i>
              <span>Feedback</span>
            </a>
          </li>
          <li>
            <a href="contact">
              <i class="fa fa-phone"></i>
              <span>Contact Us</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-share-alt"></i>
              <span>Share</span>
            </a>
          </li>
          <?php if ($umob != '') { ?>
          <li>
            <a href="include/logout">
              <i class="fa fa-sign-out"></i>
              <span>Logout</span>
            </a>
          </li>    
          <?php } ?>      
          <li class="header-menu">
          <a href="about">About Us</a>
          </li>
          <li class="header-menu">
          <a href="policy">Privacy Policy</a>
          </li>
          <li class="header-menu">
          <a href="terms">Terms & Conditions</a>
          </li>
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    
  </nav>
  </div>

