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

?>

<body data-col="2-columns" class=" 2-columns ">
    <div class="layer"></div>
    <!-- ///////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">
        <!-- main menu-->
        <!--.main-menu(class="#{menuColor} #{menuOpenType}", class=(menuShadow == true ? 'menu-shadow' : ''))-->
        <?php include('main.php'); ?>
        <!-- Navbar (Header) Ends-->

        <div class="main-panel">
            <div class="main-content">
                <div class="content-wrapper">
                    <!--Statistics cards Starts-->
                    <?php 
if(isset($_GET['edit']))
{
    $selk = $con->query("select * from blogs where id=".$_GET['edit']."")->fetch_assoc();
?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form">Edit Blog</h4>
                                </div>
                                <div class="card-body">
                                    <div class="px-3">
                                        <form class="form" method="post" enctype="multipart/form-data">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label for="blog_title">Blog Title</label>
                                                    <input type="text" id="blog_title" class="form-control"
                                                        value="<?php echo $selk['blog_title'];?>" name="blog_title"
                                                        required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="projectinput6">Select Category</label>
                                                    <select id="projectinput6" name="blog_category" class="form-control"
                                                        required>
                                                        <?php
													$sel_c1 = $con->query("select * from blog_categ_list order by id DESC");
													while($row_c1 = $sel_c1->fetch_assoc())
													{
												?>
                                                        <option
                                                            <?php if($selk['blog_category'] == $row_c1['categ_name']) {echo 'selected';}?>
                                                            value="<?php echo $row_c1['categ_name']; ?>">
                                                            <?php echo $row_c1['categ_name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="blog_descr">Blog Description</label>
													<textarea class="form-control" rows="5" name="blog_descr" style="resize: none;"><?php echo $selk['descr'];?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="blog_url">URL</label>
                                                    <input type="text" id="blog_url" class="form-control"
                                                        value="<?php echo $selk['url'];?>" name="blog_url">
                                                </div>
                                                <div class="form-group">
                                                    <label for="meta_title">Meta Title</label>
                                                    <input type="text" id="meta_title" class="form-control"
                                                        value="<?php echo $selk['meta_title'];?>" name="meta_title"
                                                        required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="meta_descr">Meta Description</label>
                                                    <input type="text" id="meta_descr" class="form-control"
                                                        value="<?php echo $selk['meta_descr'];?>" name="meta_descr"
                                                        required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="cname">Upload Image</label>
                                                    <input type="file" id="pimg" class="form-control"
                                                        placeholder="Enter Product Image" name="pimg">
														<img src="<?php echo $selk['images'];?>" width="100" height="100"/>
                                                </div>


                                                <div class="form-group">
                                                    <label for="projectinput6">Status</label>
                                                    <select id="projectinput6" name="status" class="form-control"
                                                        required>

                                                        <option <?php if($selk['status'] == '1') {echo 'selected';}?>
                                                            value="1">Active</option>
                                                        <option <?php if($selk['status'] == '0') {echo 'selected';}?>
                                                            value="0">Not Active</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <button type="submit" name="edit_product"
                                                    class="btn btn-raised btn-raised btn-primary">
                                                    <i class="fa fa-check-square-o"></i> Update Blog
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
		if(isset($_POST['edit_product']))
		{
		$blog_category = $_POST['blog_category'];
		
        $blog_title = $_POST['blog_title'];
        $blog_descr = $_POST['blog_descr'];
        $blog_url = $_POST['blog_url'];
        $meta_title = $_POST['meta_title'];
        $meta_descr = $_POST['meta_descr'];
        $status = $_POST['status'];        
        $timestamp = date("Y-m-d H:i:s");	
        $blog_url = get_valid_name($blog_title);

		$pimg = '';
		if($_FILES["pimg"]["name"] == ''){
			$pimg = $selk['images'];
		}
		else{
			$fileName = $_FILES['pimg']['tmp_name'];
			$sourceProperties = getimagesize($fileName);
			$resizeFileName = uniqid().time();
			$uploadPath = "img/blogs/";
			$fileExt = pathinfo($_FILES['pimg']['name'], PATHINFO_EXTENSION);
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
			
			$pimg = $uploadPath."thump_".$resizeFileName.".". $fileExt;
		}
        echo $pimg;
		
        $con->query("update blogs set blog_title='".$blog_title."',blog_category='".$blog_category."',images = '".$pimg."',descr='".$blog_descr."',url='".$blog_url."',meta_title='".$meta_title."',meta_descr='".$meta_descr."',status='".$status."' where id=".$_GET['edit']."");
		
		?>
                        <script type="text/javascript">
                        $(document).ready(function() {
                            toastr.options.timeOut = 4500; // 1.5s

                            toastr.info('Blog Update Successfully!!');
                            setTimeout(function() {
                                //window.location.href = "blog_list.php";
                            }, 1500);

                        });
                        </script>
                        <?php 
		
		}
		?>
                    </div>

                    <?php 
} 
else 
{
    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form">Add New Blog</h4>

                                </div>
                                <div class="card-body">
                                    <div class="px-3">
                                        <form class="form" action="#" method="post" enctype="multipart/form-data">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label for="blog_title">Blog Title</label>
                                                    <input type="text" id="blog_title" class="form-control"
                                                        name="blog_title" placeholder="Blog Title" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="projectinput6">Select Category</label>
                                                    <select id="projectinput6" name="blog_category" class="form-control"
                                                        required>
                                                        <?php
													$sel_c = $con->query("select * from blog_categ_list order by id DESC");
													while($row_c = $sel_c->fetch_assoc())
													{
												?>
                                                        <option value="<?php echo $row_c['categ_name']; ?>">
                                                            <?php echo $row_c['categ_name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="blog_descr">Blog Description</label>
                                                    <textarea class="form-control" rows="5" name="blog_descr" style="resize: none;" placeholder="Enter Description"></textarea>

                                                </div>
                                                <div class="form-group">
                                                    <label for="blog_url">URL</label>
                                                    <input type="text" id="blog_url" class="form-control"
                                                        name="blog_url" placeholder="Enter URL">
                                                </div>
                                                <div class="form-group">
                                                    <label for="meta_title">Meta Title</label>
                                                    <input type="text" id="meta_title" class="form-control"
                                                        placeholder="Meta Title" name="meta_title" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="meta_descr">Meta Description</label>
                                                    <input type="text" id="meta_descr" class="form-control"
                                                        placeholder="Meta Description" name="meta_descr" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="pimg">Upload Image</label>
                                                    <input type="file" id="pimg" class="form-control"
                                                        placeholder="Enter Product Image" name="pimg">
                                                </div>

                                                <div class="form-group">
                                                    <label for="projectinput6">Status</label>
                                                    <select id="projectinput6" name="status" class="form-control"
                                                        required>

                                                        <option value="1">Active</option>
                                                        <option value="0">Not Active</option>
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="form-actions">

                                                <button type="submit" name="sub_product"
                                                    class="btn btn-raised btn-raised btn-primary">
                                                    <i class="fa fa-check-square-o"></i> Save Blog
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
		if(isset($_POST['sub_product']))
		{
            $blog_category = $_POST['blog_category'];
		
            $blog_title = $_POST['blog_title'];
            $blog_descr = $_POST['blog_descr'];
            $blog_url = $_POST['blog_url'];
            $meta_title = $_POST['meta_title'];
            $meta_descr = $_POST['meta_descr'];
            $status = $_POST['status'];
            
            if($blog_url == ''){
                $blog_url = get_valid_name($blog_title);
            }else{
                $blog_url = get_valid_name($blog_url);
            }
			

			$fileName = $_FILES['pimg']['tmp_name'];
			$sourceProperties = getimagesize($fileName);
			$resizeFileName = time();
			$uploadPath = "img/blogs/";
			$fileExt = pathinfo($_FILES['pimg']['name'], PATHINFO_EXTENSION);
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
			
			$url = $uploadPath."thump_".$resizeFileName.".". $fileExt;
            
            $timestamp = date("Y-m-d H:i:s");
        
		
        $con->query("insert into blogs(`blog_title`,`blog_category`,`images`,`descr`,`creation_date`,`url`,`meta_title`,`meta_descr`,`status`) values('".$blog_title."','".$blog_category."','".$url."','".$blog_descr."','".$timestamp."','".$blog_url."','".$meta_title."','".$meta_descr."','".$status."')");
	
		?>
                        <script type="text/javascript">
                        $(document).ready(function() {
                            toastr.options.timeOut = 4500; // 1.5s
                            toastr.info('Blog Added Successfully!!');

                        });
                        </script>
                        <?php 
	
		}
		
		?>
                    </div>
                    <?php 
	
		}
		
		?>

                </div>
            </div>



        </div>
    </div>

    <?php 
  require 'include/js.php';

function get_valid_name($string){
 
    $valid_name='';
    $replace_char='';
    if($string){
            $sps_chr_arr=array("--",",","\\","/","&quot;",".","_",".","'","!","@","#","$","%","^","&","*","(",")","+","=","-","[","]","{","}","<",">","?",";",",","|",":","`","~"," ");
            $m=1;
            for($x=0;$x<strlen($string);$x++){
                if(!in_array($string[$x],$sps_chr_arr) && $string[$x]!="\""){
                    $m='';
                    if($replace_char){
                        $valid_name.=$replace_char;
                        $replace_char='';
                    }
                    $valid_name.=$string[$x];
                }else if($m=='' && $string[$x]==" "){
                    $m=5;
                    $replace_char="-";
                }
            }
        }
    return strtolower($valid_name);
}

  ?>

    <script>
    // Code to get duration of audio /video file before upload - from: http://coursesweb.net/

    //register canplaythrough event to #audio element to can get duration
    var f_duration = 0; //store duration
    document.getElementById('audio').addEventListener('canplaythrough', function(e) {
        //add duration in the input field #f_du
        f_duration = Math.round(e.currentTarget.duration);
        document.getElementById('f_du').value = f_duration;
        URL.revokeObjectURL(obUrl);
    });

    //when select a file, create an ObjectURL with the file and add it in the #audio element
    var obUrl;
    document.getElementById('f_up').addEventListener('change', function(e) {
        var file = e.currentTarget.files[0];
        //check file extension for audio/video type
        if (file.name.match(/\.(avi|mp3|mp4|mpeg|ogg)$/i)) {
            obUrl = URL.createObjectURL(file);
            document.getElementById('audio').setAttribute('src', obUrl);
        }
    });
    </script>

<script src="https://cdn.ckeditor.com/4.5.1/standard/ckeditor.js"></script>
 <script>
 CKEDITOR.editorConfig = function (config) {
    config.language = 'es';
    config.uiColor = '#F7B42C';
    config.height = 300;
    config.toolbarCanCollapse = true;
};
CKEDITOR.replace('blog_descr');
</script>
</body>


</html>