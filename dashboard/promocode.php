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
    $selk = $con->query("select * from promocodes where id=".$_GET['edit']."")->fetch_assoc();
?>
<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-form">Edit Promocode</h4>
					
				</div>
				<div class="card-body">
					<div class="px-3">
						<form class="form" method="post">
							<div class="form-body">
								

								

								<div class="form-group">
									<label for="cname">PromoCode Name</label>
									<input type="text" id="vname" class="form-control"  value="<?php echo $selk['promo_name'];?>" name="pname" required>
								</div>
								<input type="hidden" value="p" name="promo_type" >
									
								
								<div class="form-group">
									<label for="gurl">Promocode value (in %)</label>
									<input type="text" id="promo_value" class="form-control"  name="promo_value"  value="<?php echo $selk['promo_value'];?>" required>
									
								</div>
								
								<div class="form-group">
									<label for="gurl">Expiry Date</label>
									<input type="date" id="promo_exp_date" class="form-control" value="<?php echo $selk['expiry_date'];?>" name="promo_exp_date" required>
									
								</div>
								
								<div class="form-group">
											<label for="projectinput6">Status</label>
											<select id="projectinput6" name="status" class="form-control" required>
												
												<option <?php if($selk['status'] == '1') {echo 'selected';}?> value="1">Active</option>
												<option <?php if($selk['status'] == '0') {echo 'selected';}?> value="0">Not Active</option>
											</select>
										</div>
								
								
								
							</div>

							<div class="form-actions">
								
								<button type="submit" name="edit_product" class="btn btn-raised btn-raised btn-primary">
									<i class="fa fa-check-square-o"></i> Update Promocode
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
			$data = $con->query("select * from promocodes where id=".$_GET['edit']."")->fetch_assoc();
		$pname = $_POST['pname'];
		
        $promo_type = $_POST['promo_type'];
        $promo_value = $_POST['promo_value'];
        $promo_exp_date = $_POST['promo_exp_date'];
        $status = $_POST['status'];
        
        $timestamp = date("Y-m-d H:i:s");
							
           
        $con->query("update promocodes set promo_type='".$promo_type."',promo_name='".$pname."',promo_value='".$promo_value."',expiry_date=".$promo_exp_date.",status=".$status." where id=".$_GET['edit']."");
		
		?>
		  <script type="text/javascript">
  $(document).ready(function() {
    toastr.options.timeOut = 4500; // 1.5s

    toastr.info('Promocode Update Successfully!!');
	setTimeout(function()
	{
		window.location.href="promocode_list.php";
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
					<h4 class="card-title" id="basic-layout-form">Add New PromoCode</h4>
					
				</div>
				<div class="card-body">
					<div class="px-3">
						<form class="form" action="#" method="post" enctype="multipart/form-data">
							<div class="form-body">
								

								

								<div class="form-group">
									<label for="cname">PromoCode Name</label>
									<input type="text" id="vname" class="form-control"  placeholder="Enter PromoCode Name" name="pname" required>
								</div>
								

								<input type="hidden" value="p" name="promo_type">
								<div class="form-group">
									<label for="gurl">PromoCode Value (in %)</label>
									<input type="text" id="promo_val" class="form-control"  name="promo_val"  placeholder="Enter Promocode Value"  required>
									
								</div>
										
								<div class="form-group">
									<label for="gurl">Expiry Date</label>
									<input type="date" id="promo_exp_date" class="form-control"  name="promo_exp_date" required>
									
								</div>
								
							</div>

							<div class="form-actions">
								
								<button type="submit" name="sub_product" class="btn btn-raised btn-raised btn-primary">
									<i class="fa fa-check-square-o"></i> Save Promocode
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
		$pname = $_POST['pname'];
        $promo_type = $_POST['promo_type'];

		$promo_val = $_POST['promo_val'];
        $promo_exp_date = $_POST['promo_exp_date'];
        
        $timestamp = date("Y-m-d H:i:s");
        
		
        $con->query("insert into promocodes(`promo_name`,`promo_type`,`promo_value`,`expiry_date`,`creation_date`,`status`)
        values('".$pname."','".$promo_type."','".$promo_val."','".$promo_exp_date."','".$timestamp."','1')");
	
		?>
		 <script type="text/javascript">
  $(document).ready(function() {
    toastr.options.timeOut = 4500; // 1.5s
    toastr.info('Promocode Added Successfully!!');
   
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