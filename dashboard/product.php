<?php
require 'include/header.php';
?>
<?php
$getkey = $con->query("select * from setting")
    ->fetch_assoc();
function resizeImage($resourceType, $image_width, $image_height, $resizeWidth, $resizeHeight)
{
    // $resizeWidth = 100;
    // $resizeHeight = 100;
    $imageLayer = imagecreatetruecolor($resizeWidth, $resizeHeight);
    $background = imagecolorallocate($imageLayer, 0, 0, 0);
    // removing the black from the placeholder
    imagecolortransparent($imageLayer, $background);

    // turning off alpha blending (to ensure alpha channel information
    // is preserved, rather than removed (blending with the rest of the
    // image in the form of black))
    imagealphablending($imageLayer, false);

    // turning on alpha channel information saving (to ensure the full range
    // of transparency is preserved)
    imagesavealpha($imageLayer, true);
    imagecopyresampled($imageLayer, $resourceType, 0, 0, 0, 0, $resizeWidth, $resizeHeight, $image_width, $image_height);
    return $imageLayer;
}
?>

<body data-col="2-columns" class=" 2-columns ">
    <div class="layer"></div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">


        <!-- main menu-->
        <!--.main-menu(class="#{menuColor} #{menuOpenType}", class=(menuShadow == true ? 'menu-shadow' : ''))-->
        <?php include ('main.php'); ?>
        <!-- Navbar (Header) Ends-->

        <div class="main-panel">
            <div class="main-content">
                <div class="content-wrapper">
                    <!--Statistics cards Starts-->
                    <?php
if (isset($_GET['edit']))
{
    $selk = $con->query("select * from product where id=" . $_GET['edit'] . "")->fetch_assoc();
?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form">Edit Product</h4>

                                </div>
                                <div class="card-body">
                                    <div class="px-3">
                                        <form class="form" method="post" enctype="multipart/form-data">
                                            <div class="form-body">




                                                <div class="form-group">
                                                    <label for="cname">Product Name</label>
                                                    <input type="text" id="vname" class="form-control"
                                                        value="<?php echo $selk['pname']; ?>" name="pname" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="cname">Product Image</label>
                                                    <input type="file" id="pimg" class="form-control"
                                                        placeholder="Enter Product Image" name="pimg">
                                                    <img src="<?php echo $selk['pimg']; ?>" width="150" height="150" />
                                                    <input type="hidden" name="hiddnimg" value="<?php echo $selk['pimg']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="cname">Product Home Page Image</label>
                                                    <input type="file" id="pimg1" class="form-control"
                                                        placeholder="Enter Product Related Image" name="pimg1">
                                                    <img src="<?php echo $selk['pimg1']; ?>" width="150" height="150" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="cname">Product Related Image</label>
                                                    <input type="file" id="prel" class="form-control"
                                                        placeholder="Enter Product Related Image" name="prel[]" multiple>
                                                    <p>Only Upload 3 Images</p>
                                                    <?php 
                                                        $sb = explode(',',$selk['prel']);                           
                                                        
                                                        foreach($sb as $bb)
                                                        {
                                                            if($bb == '')
                                                            {
                                                            }
                                                            else 
                                                            {
                                                            ?>
                                                            <img src="<?php echo $bb;?>" width="100" height="100"/>
                                                            <?php 
                                                            }
                                                        }
                                                        ?>
                                                </div>

                                                <div class="form-group">
                                                    <label for="cname">Image Alt</label>
                                                    <input type="text" id="img_alt" class="form-control"
                                                        value="<?php echo $selk['img_alt']; ?>" name="img_alt" >
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="cname">URL Slug</label>
                                                    <input type="text" id="url_slug" class="form-control"
                                                        value="<?php echo $selk['url_slug']; ?>" name="url_slug" >
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="cname">H1 Tag</label>
                                                    <input type="text" id="h1_tag" class="form-control"
                                                        value="<?php echo $selk['h1_tag']; ?>" name="h1_tag" >
                                                </div>
                                                <!-- <input type="hidden" class="hiddn_upd_img1" value="<?php echo $selk['prel']; ?>"> -->
                                                <div class="form-group">
                                                    <label for="projectinput6">Product Category</label>
                                                    <select id="projectinput6" name="pcateg" class="form-control">
                                                        <option <?php if ($selk['pcateg'] == 0)
    {
        echo 'selected';
    } ?> value="0">Single Product</option>
                                                        <option <?php if ($selk['pcateg'] == 1)
    {
        echo 'selected';
    } ?> value="1">Combo Product</option>

    <option <?php if ($selk['pcateg'] == 2)
    {
        echo 'selected';
    } ?> value="2">Product (pack of 3)</option>

    <option <?php if ($selk['pcateg'] == 3)
    {
        echo 'selected';
    } ?> value="3">Product (pack of 4)</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="projectinput6">Out OF Stock?</label>
                                                    <select id="projectinput6" name="ostock" class="form-control"
                                                        >

                                                        <option <?php if ($selk['stock'] == 0)
    {
        echo 'selected';
    } ?>
                                                            value="0">Yes</option>
                                                        <option <?php if ($selk['stock'] == 1)
    {
        echo 'selected';
    } ?>
                                                            value="1">No</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="projectinput6">Product Publish Or Unpublish?</label>
                                                    <select id="projectinput6" name="ppuborun" class="form-control">

                                                        <option value="0"
                                                            <?php if ($selk['status'] == 0)
    {
        echo 'selected';
    } ?>>
                                                            Unpublish</option>
                                                        <option <?php if ($selk['status'] == 1)
    {
        echo 'selected';
    } ?>
                                                            value="1">Publish</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="projectinput6">Make Product Popular?</label>
                                                    <select id="projectinput6" name="popular" class="form-control">

                                                        <option value="0"
                                                            <?php if ($selk['popular'] == 0)
    {
        echo 'selected';
    } ?>>No
                                                        </option>
                                                        <option <?php if ($selk['popular'] == 1)
    {
        echo 'selected';
    } ?>
                                                            value="1">Yes</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="gurl">Product Small Description</label>
                                                    <textarea class="form-control" name="psdesc"
                                                        placeholder="Enter Product Small Description"
                                                        ><?php echo $selk['psdesc']; ?></textarea>

                                                </div>

                                                <div class="form-group">
                                                    <label for="gurl">Product Full Description</label>
                                                    <textarea class="form-control" name="pfdesc"
                                                        placeholder="Enter Product Full Description"
                                                        ><?php echo $selk['pdesc']; ?></textarea>

                                                </div>


                                                <div class="form-group">
                                                    <label for="gurl">Product (Gms,kg,ltr,ml,pcs)</label>
                                                    <input type="text" id="ptype" class="form-control" name="pgms"
                                                        value="<?php echo $selk['pgms']; ?>" >

                                                </div>

                                                <div class="form-group">
                                                    <label for="gurl">Product Price</label>
                                                    <input type="text" id="pprice" class="form-control" name="pprice"
                                                        value="<?php echo $selk['pprice']; ?>" >

                                                </div>

                                                <div class="form-group">
                                                    <label for="gurl">Product discount(Only Digit)</label>
                                                    <input type="text" id="gurl" class="form-control"
                                                        name="discount_percentage"
                                                        placeholder="Enter discount in percentage"
                                                        value="<?php echo $selk['discount']; ?>" >

                                                </div>

                                                <div class="form-group">
                                                    <label for="meta_title">Meta Title</label>
                                                    <input type="text" id="meta_title" class="form-control"
                                                        name="meta_title"
                                                        placeholder="Enter Meta Title"
                                                        value="<?php echo $selk['meta_title']; ?>" >

                                                </div>

                                                <div class="form-group">
                                                    <label for="meta_descr">Meta Description</label>
                                                    <textarea id="meta_descr" class="form-control"
                                                        name="meta_descr"
                                                        placeholder="Enter Meta Description" ><?php echo $selk['meta_descr']; ?></textarea>

                                                </div>




                                            </div>

                                            <div class="form-actions">

                                                <button type="submit" name="edit_product"
                                                    class="btn btn-raised btn-raised btn-primary">
                                                    <i class="fa fa-check-square-o"></i> Edit Product
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
    if (isset($_POST['edit_product']))
    {
        $data = $con->query("select * from product where id=" . $_GET['edit'] . "")->fetch_assoc();
        $pname = mysqli_real_escape_string($con, $_POST['pname']);

        $popular = $_POST['popular'];
        $discount = $_POST['discount_percentage'];
        $ostock = $_POST['ostock'];
        $psdesc = mysqli_real_escape_string($con, $_POST['psdesc']);
        $pfdesc = mysqli_real_escape_string($con, $_POST['pfdesc']);
        $pgms = $_POST['pgms'];
        $pprice = $_POST['pprice'];
        $pcateg = $_POST['pcateg'];
        $img_alt = $_POST['img_alt'];
        $url_slug = slugify($_POST['url_slug']);
        $h1_tag = $_POST['h1_tag'];

        $meta_title = $_POST['meta_title'];
        $meta_descr = $_POST['meta_descr'];

        $timestamp = date("Y-m-d H:i:s");
        $status = $_POST['ppuborun'];

        if ($_FILES["pimg"]["name"] == '')
        {
            $pimg = $_POST['hiddnimg'];
        }
        else
        {
            $fileName = $_FILES['pimg']['tmp_name'];
            $sourceProperties = getimagesize($fileName);
            $resizeFileName = uniqid() . time();
            $uploadPath = "product/";
            $fileExt = pathinfo($_FILES['pimg']['name'], PATHINFO_EXTENSION);
            $uploadImageType = $sourceProperties[2];
            $sourceImageWidth = $sourceProperties[0];
            $sourceImageHeight = $sourceProperties[1];
            $new_width = $sourceImageWidth;
            $new_height = $sourceImageHeight;
            switch ($uploadImageType)
            {
                case IMAGETYPE_JPEG:
                    $resourceType = imagecreatefromjpeg($fileName);
                    $imageLayer = resizeImage($resourceType, $sourceImageWidth, $sourceImageHeight, $new_width, $new_height);
                    imagejpeg($imageLayer, $uploadPath . "thump_" . $resizeFileName . '.' . $fileExt);
                break;

                case IMAGETYPE_GIF:
                    $resourceType = imagecreatefromgif($fileName);
                    $imageLayer = resizeImage($resourceType, $sourceImageWidth, $sourceImageHeight, $new_width, $new_height);
                    imagegif($imageLayer, $uploadPath . "thump_" . $resizeFileName . '.' . $fileExt);
                break;

                case IMAGETYPE_PNG:

                    $resourceType = imagecreatefrompng($fileName);
                    $imageLayer = resizeImage($resourceType, $sourceImageWidth, $sourceImageHeight, $new_width, $new_height);
                    imagepng($imageLayer, $uploadPath . "thump_" . $resizeFileName . '.' . $fileExt);

                break;

                default:
                    $imageProcess = 0;
                break;
            }

            $pimg = $uploadPath . "thump_" . $resizeFileName . "." . $fileExt;
        }

        if ($_FILES["pimg1"]["name"] == '')
        {
            $pimg1 = $data['pimg1'];
        }
        else
        {
                $tmp_name = $_FILES['pimg1']['tmp_name'];
                $file_name = $_FILES['pimg1']['name'];
                    $file_size = $_FILES['pimg1']['size'];
                    $file_tmp = $_FILES['pimg1']['tmp_name'];

                    $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                    if ($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg" && $file_type != "gif")
                    {
                        $pimg1 = '';
                    }
                    else
                    {

                        move_uploaded_file($file_tmp, "product/" . $file_name);
                        $pimg1 = "product/" . $file_name;
                    }
        }

        if (empty($_FILES['prel']['name'][0]))
        {
            $related = $data['prel'];

        }
        else
        {
            $arr = array();
            foreach ($_FILES['prel']['tmp_name'] as $key => $tmp_name)
            {
                $file_name = $key . $_FILES['prel']['name'][$key];
                $file_size = $_FILES['prel']['size'][$key];
                $file_tmp = $_FILES['prel']['tmp_name'][$key];

                $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                if ($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg" && $file_type != "gif")
                {
                    $related = '';
                }
                else
                {

                    move_uploaded_file($file_tmp, "product/" . $file_name);
                    $arr[] = "product/" . $file_name;
                }
            }
            $related = implode(',', $arr);
        }

        if ($related == '')
        {
            $related = $data['prel'];
        }
            if($url_slug ==''){
                $url_slug = slugify($pname);
            }

        $con->query("update product set pname='" . $pname . "',h1_tag='" . $h1_tag . "',pimg='" . $pimg . "',pcateg = '" . $pcateg . "',pimg1='" . $pimg1 . "',prel='" . $related . "',img_alt='" . $img_alt . "',popular=" . $popular . ",discount=" . $discount . ",pdesc='" . $pfdesc . "',psdesc='" . $psdesc . "',pgms='" . $pgms . "',pprice='" . $pprice . "',status=" . $status . ",stock=" . $ostock . ",url_slug='" . $url_slug . "',meta_title='" . $meta_title . "',meta_descr='" . $meta_descr . "' where id=" . $_GET['edit'] . "");


?>
                        <script type="text/javascript">
                        $(document).ready(function() {
                            toastr.options.timeOut = 4500; // 1.5s

                            toastr.info('Product Update Successfully!!');
                            setTimeout(function() {
                                window.location.href = "productlist.php";
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
                                    <h4 class="card-title" id="basic-layout-form">Add Product</h4>

                                </div>
                                <div class="card-body">
                                    <div class="px-3">
                                        <form class="form" action="#" method="post" enctype="multipart/form-data">
                                            <div class="form-body">




                                                <div class="form-group">
                                                    <label for="cname">Product Name</label>
                                                    <input type="text" id="vname" class="form-control"
                                                        placeholder="Enter Product Name" name="pname" >
                                                </div>

                                                <div class="form-group">
                                                    <label for="cname">Product Image</label>
                                                    <input type="file" id="pimg" class="form-control"
                                                        placeholder="Enter Product Image" name="pimg" >
                                                </div>

                                                 <div class="form-group">
                                                    <label for="cname">Product Home Page Image</label>
                                                    <input type="file" id="pimg1" class="form-control"
                                                        placeholder="Enter Product Related Image" name="pimg1">
                                                </div>
                                                <div class="form-group">
                                                    <label for="cname">Product Related Image</label>
                                                    <input type="file" id="prel" class="form-control"
                                                        placeholder="Enter Product Related Image" name="prel[]" multiple>
                                                    
                                                </div>

                                                 <div class="form-group">
                                                    <label for="cname">Image Alt</label>
                                                    <input type="text" id="img_alt" class="form-control" name="img_alt" >
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="cname">URL Slug</label>
                                                    <input type="text" id="url_slug" class="form-control" name="url_slug" >
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="cname">H1 Tag</label>
                                                    <input type="text" id="h1_tag" class="form-control" name="h1_tag" >
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="projectinput6">Product Category</label>
                                                    <select id="projectinput6" name="pcateg" class="form-control">
                                                        <option selected value="0">Single Product</option>
                                                        <option value="1">Combo Product</option>
                                                    </select>
                                                </div>


                                                <div class="form-group">
                                                    <label for="projectinput6">Out OF Stock?</label>
                                                    <select id="projectinput6" name="ostock" class="form-control">

                                                        <option value="0">Yes</option>
                                                        <option selected="" value="1">No</option>
                                                    </select>
                                                </div>


                                                <div class="form-group">
                                                    <label for="projectinput6">Product Publish Or Unpublish?</label>
                                                    <select id="projectinput6" name="ppuborun" class="form-control">

                                                        <option value="0">Unpublish</option>
                                                        <option selected="" value="1">Publish</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="projectinput6">Make Product Popular?</label>
                                                    <select id="projectinput6" name="popular" class="form-control">

                                                        <option value="1">Yes</option>
                                                        <option selected="" value="0">No</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="gurl">Product Small Description</label>
                                                    <textarea class="form-control" name="psdesc"
                                                        placeholder="Enter Product Small Description"
                                                        ></textarea>

                                                </div>

                                                <div class="form-group">
                                                    <label for="gurl">Product Full Description</label>
                                                    <textarea class="form-control" name="pfdesc"
                                                        placeholder="Enter Product Full Description"
                                                        ></textarea>

                                                </div>


                                                <div class="form-group">
                                                    <label for="gurl">Product (Gms,kg,ltr,ml,pcs)</label>
                                                    <input type="text" id="ptype" class="form-control" name="pgms"
                                                        placeholder="1 gms,250 gms etc.">

                                                </div>

                                                <div class="form-group">
                                                    <label for="gurl">Product Price</label>
                                                    <input type="text" id="pprice" class="form-control"
                                                        placeholder="Enter price" name="pprice" >

                                                </div>

                                                <div class="form-group">
                                                    <label for="gurl">Product discount (Only Digit)</label>
                                                    <input type="text" id="gurl" class="form-control"
                                                        name="discount_percentage"
                                                        placeholder="Enter discount in percentage ex. 5">

                                                </div>

                                                <div class="form-group">
                                                    <label for="meta_title">Meta Title</label>
                                                    <input type="text" id="meta_title" class="form-control"
                                                        name="meta_title"
                                                        placeholder="Enter Meta Title" >

                                                </div>

                                                

                                                <div class="form-group">
                                                    <label for="meta_descr">Meta Description</label>
                                                    <textarea id="meta_descr" class="form-control"
                                                        name="meta_descr"
                                                        placeholder="Enter Meta Description" ></textarea>

                                                </div>

                                            </div>

                                            <div class="form-actions">

                                                <button type="submit" name="sub_product"
                                                    class="btn btn-raised btn-raised btn-primary">
                                                    <i class="fa fa-check-square-o"></i> Save Product
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
    if (isset($_POST['sub_product']))
    {
        if (count($_FILES['prel']['name']) > 10)
        {
?>
                        <script type="text/javascript">
                        $(document).ready(function() {
                            toastr.options.timeOut = 4500; // 1.5s

                            toastr.error('Sorry Only Allow 3 Images.');
                            setTimeout(function() {
                                window.location.href = "productlist.php";
                            }, 1500);
                        });
                        </script>
                        <?php
        }
        else
        {
            $pname = mysqli_real_escape_string($con, $_POST['pname']);

            $ostock = $_POST['ostock'];
            $psdesc = mysqli_real_escape_string($con, $_POST['psdesc']);
            $pfdesc = mysqli_real_escape_string($con, $_POST['pfdesc']);
            $pgms = $_POST['pgms'];
            $popular = $_POST['popular'];
            $pprice = $_POST['pprice'];
            $pcateg = $_POST['pcateg'];
            $img_alt = $_POST['img_alt'];
            $url_slug = slugify($_POST['url_slug']);
            $h1_tag = $_POST['h1_tag'];

            $meta_title = $_POST['meta_title'];
            $meta_descr = $_POST['meta_descr'];

            $timestamp = date("Y-m-d H:i:s");
            $status = $_POST['ppuborun'];
            $discount = $_POST['discount_percentage'];

            $fileName = $_FILES['pimg']['tmp_name'];
            $sourceProperties = getimagesize($fileName);
            $resizeFileName = time();
            $uploadPath = "product/";
            $fileExt = pathinfo($_FILES['pimg']['name'], PATHINFO_EXTENSION);
            $uploadImageType = $sourceProperties[2];
            $sourceImageWidth = $sourceProperties[0];
            $sourceImageHeight = $sourceProperties[1];
            $new_width = $sourceImageWidth;
            $new_height = $sourceImageHeight;
            switch ($uploadImageType)
            {
                case IMAGETYPE_JPEG:
                    $resourceType = imagecreatefromjpeg($fileName);
                    $imageLayer = resizeImage($resourceType, $sourceImageWidth, $sourceImageHeight, $new_width, $new_height);
                    imagejpeg($imageLayer, $uploadPath . "thump_" . $resizeFileName . '.' . $fileExt);
                break;

                case IMAGETYPE_GIF:
                    $resourceType = imagecreatefromgif($fileName);
                    $imageLayer = resizeImage($resourceType, $sourceImageWidth, $sourceImageHeight, $new_width, $new_height);
                    imagegif($imageLayer, $uploadPath . "thump_" . $resizeFileName . '.' . $fileExt);
                break;

                case IMAGETYPE_PNG:

                    $resourceType = imagecreatefrompng($fileName);
                    $imageLayer = resizeImage($resourceType, $sourceImageWidth, $sourceImageHeight, $new_width, $new_height);
                    imagepng($imageLayer, $uploadPath . "thump_" . $resizeFileName . '.' . $fileExt);

                break;

                default:
                    $imageProcess = 0;
                break;
            }

            $url = $uploadPath . "thump_" . $resizeFileName . "." . $fileExt;


                $url1 = '';
                $tmp_name = $_FILES['pimg1']['tmp_name'];
                $file_name = $_FILES['pimg1']['name'];
                    $file_size = $_FILES['pimg1']['size'];
                    $file_tmp = $_FILES['pimg1']['tmp_name'];

                    $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                    if ($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg" && $file_type != "gif")
                    {
                        $url1 = '';
                    }
                    else
                    {

                        move_uploaded_file($file_tmp, "product/" . $file_name);
                        $url1 = "product/" . $file_name;
                    }



            if (!empty($_FILES['prel']['name'][0]))
            {
                $arr = array();
                foreach ($_FILES['prel']['tmp_name'] as $key => $tmp_name)
                {
                    $file_name = $key . $_FILES['prel']['name'][$key];
                    $file_size = $_FILES['prel']['size'][$key];
                    $file_tmp = $_FILES['prel']['tmp_name'][$key];

                    $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                    if ($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg" && $file_type != "gif")
                    {
                        $related = '';
                    }
                    else
                    {

                        move_uploaded_file($file_tmp, "product/" . $file_name);
                        $arr[] = "product/" . $file_name;
                    }
                }
                $related = implode(',', $arr);
            }
            else
            {
                $related = '';
            }
            
            if($url_slug ==''){
                $url_slug = slugify($pname);
            }
            

            $con->query("insert into product(`pname`,`pimg`,`pimg1`,`prel`,`img_alt`,`pcateg`,`pdesc`,`psdesc`,`pgms`,`pprice`,`date`,`status`,`stock`,`discount`,`popular`,`url_slug`,`h1_tag`,`meta_title`,`meta_descr`)values('" . $pname . "','" . $url . "','" . $url1 . "','" . $related . "','" . $img_alt . "','" . $pcateg . "','" . $pfdesc . "','" . $psdesc . "','" . $pgms . "','" . $pprice . "','" . $timestamp . "'," . $status . "," . $ostock . "," . $discount . "," . $popular . ",'" . $url_slug . "','" . $h1_tag . "','" . $meta_title . "','" . $meta_descr . "')");

           
?>
                        <script type="text/javascript">
                        $(document).ready(function() {
                            toastr.options.timeOut = 4500; // 1.5s
                            toastr.info('Insert Product Successfully!!');

                        });
                        </script>
                        <?php

        }
    }
?>
                    </div>

                    <?php

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



                </div>
            </div>



        </div>
    </div>

    <?php
require 'include/js.php';
?>

    <script src="https://cdn.ckeditor.com/4.5.1/standard/ckeditor.js"></script>

    <script>
    $(document).on('change', '#cat_change', function() {
        var value = $(this).val();

        $.ajax({
            type: 'post',
            url: 'getsub.php',
            data: {
                catid: value
            },
            success: function(data) {
                $('#sub_list').html(data);
            }
        });
    });
    

    CKEDITOR.editorConfig = function(config) {
        config.language = 'es';
        config.uiColor = '#F7B42C';
        config.height = 300;
        config.toolbarCanCollapse = true;

    };
    CKEDITOR.replace('pfdesc');
    CKEDITOR.replace('psdesc');
    </script>
    <?php 
        function slugify($text)
        {
          // replace non letter or digits by -
          $text = preg_replace('~[^\pL\d]+~u', '-', $text);

          // transliterate
          $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

          // remove unwanted characters
          $text = preg_replace('~[^-\w]+~', '', $text);

          // trim
          $text = trim($text, '-');

          // remove duplicate -
          $text = preg_replace('~-+~', '-', $text);

          // lowercase
          $text = strtolower($text);

          if (empty($text)) {
            return 'n-a';
          }

          return $text;
        }

    ?>
</body>


</html>
