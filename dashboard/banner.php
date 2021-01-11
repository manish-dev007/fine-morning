<?php 
  require 'include/header.php';
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
					<h4 class="card-title" id="basic-layout-form">Add Banner</h4>
					
				</div>
				<div class="card-body">
					<div class="px-3">
					    <?php 
					    if(isset($_GET['edit']))
					    {
					        $bdata = $con->query("select * from banner where id=".$_GET['edit']."")->fetch_assoc();
					    ?>
					    <form class="form" action="#" method="post" enctype="multipart/form-data">
							<div class="form-body">
								
								<div class="form-group">
									<label for="cname">Banner Image</label>
									<input type="file" id="pimg" class="form-control"  placeholder="Enter Banner Image" name="pimg">
									<img src="<?php echo $bdata['bimg'];?>" width="100" height="100"/>
								</div>

								<div class="form-group">
									<label for="cname">Banner Text1</label>
									<input type="text" id="banner_txt1" class="form-control" value="<?php echo $bdata['banner_text1'];?>"  placeholder="Enter Banner Text" name="banner_text1" >
								
								</div>

								<div class="form-group">
									<label for="cname">Banner Text2</label>
									<input type="text" id="banner_txt2" class="form-control" value="<?php echo $bdata['banner_text2'];?>"  placeholder="Enter Banner Text" name="banner_text2" >
								
								</div>
								<div class="form-group">
									<label for="cname">Banner Sub Text</label>
									<input type="text" id="banner_subtxt" class="form-control" value="<?php echo $bdata['banner_subtxt'];?>"  placeholder="Enter Banner Sub Text" name="banner_subtxt" >
								
								</div>
								<div class="form-group">
									<label for="cname">Banner Button Text</label>
									<input type="text" id="banner_btn_txt" class="form-control" value="<?php echo $bdata['banner_btn_text'];?>"  placeholder="Enter Banner Button Text" name="banner_btn_txt" >
								
								</div>
								

								<div class="form-group">
											<label for="projectinput6">Button Status</label>
											<select id="projectinput6" name="banner_btn_status" class="form-control">
												
												<option value="1" <?php if($bdata['banner_btn'] == 1) {echo 'selected';}?>>Enabled</option>
												<option value="0" <?php if($bdata['banner_btn'] == 0) {echo 'selected';}?>>Disbaled</option>
											</select>
										</div>
								
								
								<div class="form-group">
									<label for="cname">Banner Button URL</label>
									<input type="text" id="banner_btn_url" class="form-control" value="<?php echo $bdata['btn_url'];?>"  placeholder="Enter Banner Url" name="banner_btn_url" >
								
								</div>
							</div>

							<div class="form-actions">
								
								<button type="submit" name="edit_product" class="btn btn-raised btn-raised btn-primary">
									<i class="fa fa-check-square-o"></i> Update Banner
								</button>
							</div>
						</form>
						
					    <?php 
					    if(isset($_POST['edit_product']))
					    {
							$banner_text1 = $_POST['banner_text1'];
							$banner_text2 = $_POST['banner_text2'];
							$banner_subtxt = $_POST['banner_subtxt'];
							$banner_btn_txt = $_POST['banner_btn_txt'];
							$banner_btn_status = $_POST['banner_btn_status'];
							$banner_btn_url = $_POST['banner_btn_url'];
							$target_file = '';
							if($_FILES["pimg"]["name"] != ''){
							$target_dir = "banner/";
							$fname = uniqid().$_FILES["pimg"]["name"];
							$url = $target_dir.$fname;
							$target_file = $target_dir . basename($fname);

							$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
							if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
    
       ?>
	 <script type="text/javascript">
  $(document).ready(function() {
    toastr.options.timeOut = 4500; // 1.5s

    toastr.error('Sorry, only JPG, JPEG, PNG  files are allowed.');
    setTimeout(function()
	{
		window.location.href="banner.php?edit=<?php echo $_GET['edit'];?>";
	},1500);
  });
  </script>
	<?php  
	}else{
		move_uploaded_file($_FILES["pimg"]["tmp_name"], $target_file);
	}
}
    else 
    {
		$target_file = $bdata['bimg'];

	}
	$con->query("update banner set bimg='".$target_file."',banner_text1='".$banner_text1."',banner_text2='".$banner_text2."'
	,banner_subtxt = '".$banner_subtxt."',banner_btn='".$banner_btn_status."',banner_btn_text='".$banner_btn_txt."',btn_url='".$banner_btn_url."' where id=".$_GET['edit']."");
?>
		 <script type="text/javascript">
  $(document).ready(function() {
    toastr.options.timeOut = 4500; // 1.5s
    toastr.info('Update Banner Successfully!!!');
    setTimeout(function()
	{
		window.location.href="bannerlist.php";
	},1500);
  });
  </script>
		<?php 
    

	
					    }
					        
					    }
					    else 
					    {
					    ?>
						<form class="form" action="#" method="post" enctype="multipart/form-data">
							<div class="form-body">
								

								

								
								<div class="form-group">
									<label for="cname">Banner Image</label>
									<input type="file" id="pimg" class="form-control"  placeholder="Enter Banner Image" name="pimg" required>
								</div>
								
								<div class="form-group">
									<label for="cname">Banner Text1</label>
									<input type="text" id="banner_txt1" class="form-control"  placeholder="Enter Banner Text" name="banner_text1" >
								
								</div>

								<div class="form-group">
									<label for="cname">Banner Text2</label>
									<input type="text" id="banner_txt2" class="form-control"  placeholder="Enter Banner Text" name="banner_text2" >
								
								</div>
								<div class="form-group">
									<label for="cname">Banner Sub Text</label>
									<input type="text" id="banner_subtxt" class="form-control"   placeholder="Enter Banner Sub Text" name="banner_subtxt" >
								
								</div>
								<div class="form-group">
									<label for="cname">Banner Button Text</label>
									<input type="text" id="banner_btn_txt" class="form-control"  placeholder="Enter Banner Button Text" name="banner_btn_txt" >
								
								</div>
								

								<div class="form-group">
											<label for="projectinput6">Button Status</label>
											<select id="projectinput6" name="banner_btn_status" class="form-control">
												
												<option value="1">Enabled</option>
												<option value="0">Disbaled</option>
											</select>
										</div>
								
								
								<div class="form-group">
									<label for="cname">Banner Button URL</label>
									<input type="text" id="banner_btn_url" class="form-control"  placeholder="Enter Banner Url" name="banner_btn_url" >
								
								</div>
								
								
							</div>

							<div class="form-actions">
								
								<button type="submit" name="sub_product" class="btn btn-raised btn-raised btn-primary">
									<i class="fa fa-check-square-o"></i> Save Banner
								</button>
							</div>
						</form>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>

		<?php
		if(isset($_POST['sub_product']))
		{		
			$banner_text1 = $_POST['banner_text1'];
			$banner_text2 = $_POST['banner_text2'];
			$banner_subtxt = $_POST['banner_subtxt'];
			$banner_btn_txt = $_POST['banner_btn_txt'];
			$banner_btn_status = $_POST['banner_btn_status'];
			$banner_btn_url = $_POST['banner_btn_url'];
			$target_dir = "banner/";
			$fname = uniqid().$_FILES["pimg"]["name"];
			$url = $target_dir.$fname;
			$target_file = $target_dir . basename($fname);
			$con->query("insert into banner(`bimg`,`banner_text1`,`banner_text2`,`banner_subtxt`,`banner_btn`,`banner_btn_text`,`btn_url`)
			values('".$url."','".$banner_text1."','".$banner_text2."','".$banner_subtxt."','".$banner_btn_status."','".$banner_btn_txt."','".$banner_btn_url."')");
			move_uploaded_file($_FILES["pimg"]["tmp_name"], $target_file);
		?>
<script type="text/javascript">
  $(document).ready(function() {
    toastr.options.timeOut = 4500; // 1.5s
    toastr.info('Insert New Banner Successfully!!!');
  });
</script>
		<?php 	
		}
		?>
	</div>




<script>
// Code to get duration of audio /video file before upload - from: http://coursesweb.net/

//register canplaythrough event to #audio element to can get duration
var f_duration =0;  //store duration
document.getElementById('audio').addEventListener('canplaythrough', function(e){
  //add duration in the input field #f_du
  f_duration = Math.round(e.currentTarget.duration);
  document.getElementById('f_du').value = f_duration;
  URL.revokeObjectURL(obUrl);
});

//when select a file, create an ObjectURL with the file and add it in the #audio element
var obUrl;
document.getElementById('f_up').addEventListener('change', function(e){
  var file = e.currentTarget.files[0];
  //check file extension for audio/video type
  if(file.name.match(/\.(avi|mp3|mp4|mpeg|ogg)$/i)){
    obUrl = URL.createObjectURL(file);
    document.getElementById('audio').setAttribute('src', obUrl);
  }
});
</script>



          </div>
        </div>

         

      </div>
    </div>
    
  <?php 
  require 'include/js.php';
  ?>
   
    
  </body>


</html>