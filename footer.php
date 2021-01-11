<?php
  if(!isset($_SESSION['session_popup'])){ ?>
      <script>setTimeout(function(){ $('#popupwindow').modal('show'); }, 5000);   </script>
<?php  }
?>
<footer>
    <div class="container"> 
      
      <!-- ABOUT Location -->
      <div class="col-md-3">
        <div class="about-footer"> <img class="margin-top-50 footewr_logo" src="dashboard/website/logo-white.png" alt="" >
        </div>
      </div>

      <!-- SHOP -->
      <div class="col-md-3">
        <h6>Free Consultation</h6>
        <ul class="link">
          <li> <a href="tel:918767287918"><i class="icon-call-end"></i> +91-8767287918</a></li>
          <li> <a href="mailto:finemorningpharma@gmail.com" target="_top"><i class="icon-envelope"></i> finemorningpharma@gmail.com</a> </li>
        </ul>
      </div>
      
      <!-- HELPFUL LINKS -->
      <div class="col-md-3">
        <h6>HELPFUL LINKS</h6>
        <ul class="link">
          <li><a href="policy"> Privacy Policy</a></li>
          <li><a href="blogs"> Blog</a></li>
          <li><a href="terms"> Terms & Conditions</a></li>
          <li><a href="about"> About Us</a></li>
          <li><a href="contact"> Contact</a></li>
          <li><a href="faq">FAQ's</a></li>
        </ul>
      </div>
      
      
      <!-- MY ACCOUNT -->
      <div class="col-md-3">
        <h6>REACH US</h6>
        <ul class="link address_comp">
        
        </ul>
      </div>
      
      <!-- Rights -->
      
      <div class="rights">
        <p class="footer_text foo_left">©  <script>new Date().getFullYear()>document.write(new Date().getFullYear());</script> <a class="footer_link_red" href=""><b>Fine Morning Pharma</b></a> All right reserved. </p>
        <p class="footer_text foo_right">Concept Designed By <a href="https://www.doorsstudio.com/" target="_blank"><img src="https://www.doorsstudio.com/images/doors-logo.svg" alt="Doors Studio" ></a> </p>
        <div class="scroll"> <a href="#wrap" class="go-up"><i class="lnr lnr-arrow-up"></i></a> </div>
      </div>
    </div>
  </footer> 

<div id="popupwindow" class="modal fade">
  <div class="modal-dialog modal-newsletter"> 
    <div class="modal-content">
      <form action="javascript:void(0);" class="popup-form" method="post">
        <div class="modal-header">
          <div class="icon-box mx-auto">            
            <i class="fa fa-phone"></i>
          </div>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="popupSession();"><span>&times;</span></button>
        </div>
        <div class="modal-body text-center">
          <h4>Share Your Contact Number to get more offers</h4> 
          <p>Join our subscribers list to get the latest news, updates and special offers delivered directly in your inbox.</p>
          <div class="input-group">
            <input type="number" class="form-control" name="phhone_news" placeholder="Enter your phone Number" required>
            <div class="input-group-append">
              <input type="submit" class="btn btn-primary" value="Subscribe">
            </div>
          </div>
        </div>
      </form>     
    </div>
  </div>
</div>
