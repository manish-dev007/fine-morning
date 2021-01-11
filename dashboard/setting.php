<?php 
  require 'include/header.php';
  function resizeImage($resourceType,$image_width,$image_height,$resizeWidth,$resizeHeight) {
    // $resizeWidth = 100;
    // $resizeHeight = 100;
    $imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
    $background = imagecolorallocate($imageLayer , 0, 0, 0);
        // removing the black from the placeholder
        imagecolortransparent($imageLayer, $background);

        // turning off alpha blending (to ensure alpha channel information
        // is preserved, rather than removed (blending with the rest of the
        // image in the form of black))
        imagealphablending($imageLayer, false);

        // turning on alpha channel information saving (to ensure the full range
        // of transparency is preserved)
        imagesavealpha($imageLayer, true);
    imagecopyresampled($imageLayer,$resourceType,0,0,0,0,$resizeWidth,$resizeHeight, $image_width,$image_height);
    return $imageLayer;
}
  ?>
  <body data-col="2-columns" class=" 2-columns ">
      <div class="layer"></div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">


      <!-- main menu-->
      <!--.main-menu(class="#{menuColor} #{menuOpenType}", class=(menuShadow == true ? 'menu-shadow' : ''))-->
      <?php include('main.php'); ?>
      <!-- Navbar (Header) Ends-->

      <div class="main-panel">
        <div class="main-content">
          <div class="content-wrapper"><!--Statistics cards Starts-->
 
<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-form">Update Setting</h4>
					
				</div>
				<div class="card-body">
					<div class="px-3">
						<form class="form" method="post" enctype="multipart/form-data">
							<div class="form-body row">
								

								<?php 
								$getkey = $con->query("select * from setting")->fetch_assoc();
								?>
									
								
								
								 <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
									<div class="form-group">
									<label for="cname">Currency</label>
									<input type="text" id="cname" class="form-control"  name="currency" value="<?php echo $getkey['currency'];?>" required >
								</div>
								</div>
								
								 
								
								<div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
								<div class="form-group">
									<label for="cname">Order Min Value</label>
									<input type="text" id="cname" class="form-control"  name="omin" value="<?php echo $getkey['o_min'];?>" required >
								</div>
								</div>
								
								
								
								<div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
								<div class="form-group">
									<label for="cname">Website Title</label>
									<input type="text" id="cname" class="form-control"  name="title" value="<?php echo $getkey['title'];?>" required >
								</div>
								</div>
								<div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
								<div class="form-group">
									<label for="ship_charge">Shipping Charge</label>
									<input type="text" id="ship_charge" class="form-control"  name="ship_charge" value="<?php echo $getkey['shipping_charge'];?>" required >
								</div>
								</div>
								<div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
								<div class="form-group">
									<label for="ad_content">Home page Ad Content</label>
									<input type="text" id="ad_content" class="form-control"  name="ad_content" value="<?php echo $getkey['ads_content'];?>" required >
								</div>
								</div>
								
								<div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
								<div class="form-group">
									<label for="cname">Home page Ad Image</label>
									<input type="file"  class="form-control"  name="ad_img" >
									<br>
									<img src="<?php echo $getkey['ads_img'];?>" width="60" height="60"/>
								</div>
								</div>

								<div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
								<div class="form-group">
									<label for="cname">Website Logo</label>
									<input type="file"  class="form-control"  name="logo" >
									<br>
									<img src="<?php echo $getkey['logo'];?>" width="60" height="60"/>
								</div>
								</div>
								
								
								<div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
								<div class="form-group">
									<label for="cname">Website Favicon</label>
									<input type="file"  class="form-control"  name="favicon">
									<br>
									<img src="<?php echo $getkey['favicon'];?>" width="60" height="60"/>
								</div>
								</div>
								
								
								<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
								<div class="form-group">
									<label for="cname">Privacy Policy</label>
									<textarea class="form-control" rows="5" name="p_data" style="resize: none;"><?php echo $getkey['privacy_policy'];?></textarea>
								</div>
								</div>
								<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
								<div class="form-group">
									<label for="cname">Return Policy</label>
									<textarea class="form-control" rows="5" name="return_data" style="resize: none;"><?php echo $getkey['return_policy'];?></textarea>
								</div>
								</div>
								<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
								<div class="form-group">
									<label for="cname">About Us</label>
									<textarea class="form-control" rows="5" name="a_data" style="resize: none;"><?php echo $getkey['about_us'];?></textarea>
								</div>
								</div>
								
								<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
								<div class="form-group">
								
								
									<label for="cname">Contact Us</label>
									<textarea class="form-control" rows="5" name="c_data" style="resize: none;"><?php echo $getkey['contact_us'];?></textarea>
								</div>
								</div>
								
								<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
								<div class="form-group">
								
								
									<label for="cname">Terms & Conditions</label>
									<textarea class="form-control" rows="5" name="terms" style="resize: none;"><?php echo $getkey['terms'];?></textarea>
								</div>
								</div>

								<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
								<div class="form-group">
								
								
									<label for="cname">About - Home Page</label>
									<textarea class="form-control" rows="5" name="about_home" style="resize: none;"><?php echo $getkey['about_home_page'];?></textarea>
								</div>
								</div>
								


							

								
							</div>
	
							<div class="form-actions">
								
								<button type="submit" name="sub_cat" class="btn btn-raised btn-raised btn-primary">
									<i class="fa fa-check-square-o"></i> Update Setting
								</button>
							</div>
							
							<?php 
							if(isset($_POST['sub_cat'])){
							$title = mysqli_real_escape_string($con,$_POST['title']);
							$p_data = preg_replace("/'/", "", $_POST['p_data']);
							$return_data = preg_replace("/'/", "", $_POST['return_data']);
							
							$a_data = str_replace( "'", "", $_POST['a_data']);
							$c_data = str_replace( "'", "", $_POST['c_data']);
							$about_home = str_replace( "'", "", $_POST['about_home']);
							$omin = str_replace( "'", "", $_POST['omin']);
							$terms = str_replace( "'", "", $_POST['terms']);
							$ship_charge = str_replace( "'", "", $_POST['ship_charge']);
							$ad_content = str_replace( "'", "", $_POST['ad_content']);
							$currency = mysqli_real_escape_string($con,$_POST['currency']);
							$data = $con->query("select * from setting")->fetch_assoc();

							
							if($_FILES["ad_img"]["name"] == '')
							{
								$ad_img = $data['ads_img'];
							}
							else 
							{
								$fileName = $_FILES['ad_img']['tmp_name'];
								$sourceProperties = getimagesize($fileName);
								$resizeFileName = time();
								$uploadPath = "banner/";
								$fileExt = pathinfo($_FILES['ad_img']['name'], PATHINFO_EXTENSION);
								$uploadImageType = $sourceProperties[2];
								$sourceImageWidth = $sourceProperties[0];
								$sourceImageHeight = $sourceProperties[1];
								$new_width = $sourceImageWidth;
								$new_height = $sourceImageHeight;
								switch ($uploadImageType) {
									case IMAGETYPE_JPEG:
										$resourceType = imagecreatefromjpeg($fileName); 
										$imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,$new_width,$new_height);
										imagejpeg($imageLayer,$uploadPath."thump_".$resizeFileName.'.'. $fileExt);
										break;

									case IMAGETYPE_GIF:
										$resourceType = imagecreatefromgif($fileName); 
										$imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,$new_width,$new_height);
										imagegif($imageLayer,$uploadPath."thump_".$resizeFileName.'.'. $fileExt);
										break;

									case IMAGETYPE_PNG:
										
										$resourceType = imagecreatefrompng($fileName); 
										$imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,$new_width,$new_height);
										imagepng($imageLayer,$uploadPath."thump_".$resizeFileName.'.'. $fileExt);
										
										break;

									default:
										$imageProcess = 0;
										break;
								}
								
								$ad_img = $uploadPath."thump_".$resizeFileName.".". $fileExt;
							}

							if($_FILES["favicon"]["name"] == '')
							{
								$favicon = $data['favicon'];
							}
							else 
							{
								$fileName = $_FILES['favicon']['tmp_name'];
								$sourceProperties = getimagesize($fileName);
								$resizeFileName = time();
								$uploadPath = "website/";
								$fileExt = pathinfo($_FILES['favicon']['name'], PATHINFO_EXTENSION);
								$uploadImageType = $sourceProperties[2];
								$sourceImageWidth = $sourceProperties[0];
								$sourceImageHeight = $sourceProperties[1];
								$new_width = $sourceImageWidth;
								$new_height = $sourceImageHeight;
								switch ($uploadImageType) {
									case IMAGETYPE_JPEG:
										$resourceType = imagecreatefromjpeg($fileName); 
										$imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,$new_width,$new_height);
										imagejpeg($imageLayer,$uploadPath."thump_".$resizeFileName.'.'. $fileExt);
										break;

									case IMAGETYPE_GIF:
										$resourceType = imagecreatefromgif($fileName); 
										$imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,$new_width,$new_height);
										imagegif($imageLayer,$uploadPath."thump_".$resizeFileName.'.'. $fileExt);
										break;

									case IMAGETYPE_PNG:
										
										$resourceType = imagecreatefrompng($fileName); 
										$imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,$new_width,$new_height);
										imagepng($imageLayer,$uploadPath."thump_".$resizeFileName.'.'. $fileExt);
										
										break;

									default:
										$imageProcess = 0;
										break;
								}
								
								$favicon = $uploadPath."thump_".$resizeFileName.".". $fileExt;
							}
							
							
							if($_FILES["logo"]["name"] == '')
							{
								$logo = $data['logo'];
							}
							else 
							{
								$fileName = $_FILES['logo']['tmp_name'];
								$sourceProperties = getimagesize($fileName);
								$resizeFileName = time();
								$uploadPath = "website/";
								$fileExt = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
								$uploadImageType = $sourceProperties[2];
								$sourceImageWidth = $sourceProperties[0];
								$sourceImageHeight = $sourceProperties[1];
								$new_width = $sourceImageWidth;
								$new_height = $sourceImageHeight;
								switch ($uploadImageType) {
									case IMAGETYPE_JPEG:
										$resourceType = imagecreatefromjpeg($fileName); 
										$imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,$new_width,$new_height);
										imagejpeg($imageLayer,$uploadPath."thump_".$resizeFileName.'.'. $fileExt);
										break;

									case IMAGETYPE_GIF:
										$resourceType = imagecreatefromgif($fileName); 
										$imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,$new_width,$new_height);
										imagegif($imageLayer,$uploadPath."thump_".$resizeFileName.'.'. $fileExt);
										break;

									case IMAGETYPE_PNG:
										
										$resourceType = imagecreatefrompng($fileName); 
										$imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,$new_width,$new_height);
										imagepng($imageLayer,$uploadPath."thump_".$resizeFileName.'.'. $fileExt);
										
										break;

									default:
										$imageProcess = 0;
										break;
								}
								
								$logo = $uploadPath."thump_".$resizeFileName.".". $fileExt;
							}
							$con->query("update setting set favicon='".$favicon."',logo='".$logo."',title='".$title."',currency='".$currency."',privacy_policy='".$p_data."',return_policy='".$return_data."',about_us='".$a_data."',contact_us='".$c_data."',terms='".$terms."',o_min=".$omin.",about_home_page='".$about_home."',shipping_charge=".$ship_charge.",ads_content='".$ad_content."',ads_img='".$ad_img."' where id=1");


?>
						
							 <script type="text/javascript">
								$(document).ready(function() {
									toastr.options.timeOut = 4500; // 1.5s
									toastr.info('Update Settings Successfully!!!');
									window.location.href="setting.php";
									
								});
							</script>
  	<?php 
		}
	?>
						</form>
					</div>
				</div>
			</div>
		</div>

		
	</div>
	





          </div>
        </div>

        

      </div>
    </div>
   
   <?php 
  require 'include/js.php';
  ?>
    <script src="https://cdn.ckeditor.com/4.5.1/standard/ckeditor.js"></script>
 <script>
 CKEDITOR.editorConfig = function (config) {
    config.language = 'es';
    config.uiColor = '#F7B42C';
    config.height = 300;
    config.toolbarCanCollapse = true;

};
CKEDITOR.replace('p_data');

CKEDITOR.editorConfig = function (config) {
    config.language = 'es';
    config.uiColor = '#F7B42C';
    config.height = 300;
    config.toolbarCanCollapse = true;

};
CKEDITOR.replace('return_data');


 CKEDITOR.editorConfig = function (config) {
    config.language = 'es';
    config.uiColor = '#F7B42C';
    config.height = 300;
    config.toolbarCanCollapse = true;

};
CKEDITOR.replace('a_data');


CKEDITOR.editorConfig = function (config) {
    config.language = 'es';
    config.uiColor = '#F7B42C';
    config.height = 300;
    config.toolbarCanCollapse = true;

};
CKEDITOR.replace('terms');

 
 </script>
  </body>


</html>