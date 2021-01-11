<!DOCTYPE html>
<html lang="en">
<head>
    <?php $page_name = 'contact';require 'include/header.php'; ?>
<meta name="description" content="<?php echo $meta_descr; ?>">
<meta property="og:title" content="<?php echo $meta_title; ?>">
<meta name="author" content="Fine Morning Pharma">
<title><?php echo $meta_title; ?></title>

<link rel="canonical" href="https://www.finemorningpharma.com/contact" />


</head>
<body>


<!-- Wrap -->
<div id="wrap"> 
  
  <!-- header -->
  <?php require 'include/header_links.php'; ?>
  <section class="sub-bnr">
    <div class="position-center-center">
      <div class="container">
        <span>Contact us</span>
        <ol class="breadcrumb">
          <li><a href="javascript:void(0);">Home</a></li>
          <li class="active">Contact Us</li>
        </ol>
      </div>
    </div>
  </section>
  <!--======= HOME MAIN SLIDER =========-->
  <section class="contact padding-top-100 padding-bottom-100">
      <div class="container">
        <div class="contact-form">
          <h5>LET HERBS CREATE THE MAGIC , FILL UP THE FORM BELOW</h5>
          <div class="row">
            <div class="col-md-8"> 
              
              <!--======= Success Msg =========-->
              <div id="contact_message" class="success-msg"> <i class="fa fa-paper-plane-o"></i>Thank You. Your Message has been Submitted</div>
              
              <!--======= FORM  =========-->
              <form role="form" id="contact_form" class="contact-form" method="post">
                <ul class="row">
                  <li class="col-sm-6">
                    <label>full name *
                      <input type="text" class="form-control" name="name" id="name" placeholder="Full Name" required>
                    </label>
                  </li>
                  <li class="col-sm-6">
                    <label>Email *
                      <input type="text" class="form-control" name="email" id="email" placeholder="Email ID" required>
                    </label>
                  </li>
                  <li class="col-sm-6">
                    <label>Phone *
                      <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number" required>
                    </label>
                  </li>
                  <li class="col-sm-6">
                    <label>SUBJECT
                      <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                    </label>
                  </li>
                  <li class="col-sm-12">
                    <label>Message
                      <textarea class="form-control message_contact" name="message_contact" id="message" rows="5" placeholder="Message" required></textarea>
                    </label>
                  </li>
                    <button type="submit" value="submit" class="btn view_more" id="btn_submit" onClick="proceed();">SEND MAIL</button>
                  </li>
                </ul>
              </form>
            </div>
            
            <!--======= ADDRESS INFO  =========-->
            <div class="col-md-4">
              <div class="contact-info">
                <h6>OUR ADDRESS</h6>
                <ul class="address_comp">
                  
                  
                </ul>
              </div>
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