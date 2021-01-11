<?php 
  require 'include/header.php';
  ?>
  
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
<?php 
if(isset($_GET['edit']))
{
    $selk = $con->query("select * from blog_categ_list where id=".$_GET['edit']."")->fetch_assoc();
?>
<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-form">Edit Blog Category</h4>
					
				</div>
				<div class="card-body">
					<div class="px-3">
						<form class="form" method="post">
							<div class="form-body">
								<div class="form-group">
									<label for="blog_cat_name">category Name</label>
									<input type="text" id="blog_cat_name" class="form-control"  value="<?php echo $selk['categ_name'];?>" name="blog_cat_name" required>
								</div>								
							</div>

							<div class="form-actions">
								
								<button type="submit" name="edit_product" class="btn btn-raised btn-raised btn-primary">
									<i class="fa fa-check-square-o"></i> Update 
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
		$blog_cat_name = $_POST['blog_cat_name'];
           
        $con->query("update blog_categ_list set categ_name='".$blog_cat_name."' where id=".$_GET['edit']."");
		
		?>
		  <script type="text/javascript">
  $(document).ready(function() {
    toastr.options.timeOut = 4500; // 1.5s

    toastr.info('Updated Successfully!!');
	setTimeout(function()
	{
		window.location.href="blog_cat_list.php";
	},1500);
    
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
					<h4 class="card-title" id="basic-layout-form">Add New Blog Catgeory</h4>
					
				</div>
				<div class="card-body">
					<div class="px-3">
						<form class="form" action="#" method="post" enctype="multipart/form-data">
							<div class="form-body">
                            <div class="form-group">
									<label for="categ_name">Blog Category Name</label>
									<input type="text" id="categ_name" class="form-control" name="categ_name" placeholder="Blog Category Name" required>
								</div>
								
							</div>

							<div class="form-actions">
								
								<button type="submit" name="sub_product" class="btn btn-raised btn-raised btn-primary">
									<i class="fa fa-check-square-o"></i> Save Category
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
            $categ_name = $_POST['categ_name'];
		
        $con->query("insert into blog_categ_list(`categ_name`) values('".$categ_name."')");
	
		?>
		 <script type="text/javascript">
  $(document).ready(function() {
    toastr.options.timeOut = 4500; // 1.5s
    toastr.info('Category Added Successfully!!');
   
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
  ?>
   
  
  </body>


</html>