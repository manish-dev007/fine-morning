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
    $selk = $con->query("select * from meta_info where id=".$_GET['edit']."")->fetch_assoc();
?>
<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-form">Edit Page Info</h4>
					
				</div>
				<div class="card-body">
					<div class="px-3">
						<form class="form" method="post">
							<div class="form-body">

								<div class="form-group">
									<label for="page_name">Page Name</label>
									<input type="text" id="page_name" class="form-control"  placeholder="Enter Page Name" name="page_name" value="<?php echo $selk['page'];?>" readonly required>
								</div>
								
								<div class="form-group">
									<label for="meta_title">Meta Title</label>
									<input type="text" id="meta_title" class="form-control"  name="meta_title"  placeholder="Enter meta Title" value="<?php echo $selk['meta_title'];?>" required>
									
								</div>
										
								<div class="form-group">
									<label for="meta_descr">Meta Description</label>
									<textarea id="meta_descr" class="form-control"  name="meta_descr"  placeholder="Enter Meta Description" required><?php echo $selk['meta_descr'];?></textarea>
									
								</div>
								

								

								
							</div>

							<div class="form-actions">
								
								<button type="submit" name="edit_pages" class="btn btn-raised btn-raised btn-primary">
									<i class="fa fa-check-square-o"></i> Update Promocode
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<?php
		if(isset($_POST['edit_pages']))
		{
			$data = $con->query("select * from meta_info where id=".$_GET['edit']."")->fetch_assoc();
		$page_name = $_POST['page_name'];
        $meta_title = $_POST['meta_title'];

		$meta_descr = $_POST['meta_descr'];
        
        $timestamp = date("Y-m-d H:i:s");
							
           
        $con->query("update meta_info set page='".$page_name."',meta_title='".$meta_title."',meta_descr='".$meta_descr."',creation_date='".$timestamp."' where id=".$_GET['edit']."");
		
		?>
		  <script type="text/javascript">
  $(document).ready(function() {
    toastr.options.timeOut = 4500; // 1.5s

    toastr.info('Page info Update Successfully!!');
	setTimeout(function()
	{
		window.location.href="pages_list.php";
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
					<h4 class="card-title" id="basic-layout-form">Add New Page Info</h4>
					
				</div>
				<div class="card-body">
					<div class="px-3">
						<form class="form" action="#" method="post" enctype="multipart/form-data">
							<div class="form-body">
								

								

								<div class="form-group">
									<label for="page_name">Page Name</label>
									<input type="text" id="page_name" class="form-control"  placeholder="Enter Page Name" name="page_name" required>
								</div>
								
								<div class="form-group">
									<label for="meta_title">Meta Title</label>
									<input type="text" id="meta_title" class="form-control"  name="meta_title"  placeholder="Enter meta Title"  required>
									
								</div>
										
								<div class="form-group">
									<label for="meta_descr">Meta Description</label>
									<textarea id="meta_descr" class="form-control"  name="meta_descr"  placeholder="Enter Meta Description" required></textarea>
									
								</div>
								
							</div>

							<div class="form-actions">
								
								<button type="submit" name="page_btn" class="btn btn-raised btn-raised btn-primary">
									<i class="fa fa-check-square-o"></i> Save Page Info
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<?php
		if(isset($_POST['page_btn']))
		{
		$page_name = $_POST['page_name'];
        $meta_title = $_POST['meta_title'];

		$meta_descr = $_POST['meta_descr'];
        
        $timestamp = date("Y-m-d H:i:s");
        
		
        $con->query("insert into meta_info(`page`,`meta_title`,`meta_descr`,`creation_date`)
        values('".$page_name."','".$meta_title."','".$meta_descr."','".$timestamp."')");
	
		?>
		 <script type="text/javascript">
  $(document).ready(function() {
    toastr.options.timeOut = 4500; // 1.5s
    toastr.info('Page Info Added Successfully!!');
   
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