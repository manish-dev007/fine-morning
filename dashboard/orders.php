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

<section id="dom">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Order List</h4>
                </div>
                <div class="card-body collapse show">
                    <div class="card-block card-dashboard">
                       
                        <table class="table table-striped" id="example">
                            <thead>
                                <tr>
								 <th>Sr No.</th>
                                    <th>Date</th>
                                     <th>Order ID</th>
                                     <th>Customer Name</th>
                                     <th>Status</th>
                                     <th>Preview</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <?php $usr_name = '';
                                $sel = $con->query("select * from orders where status ='delivered' order by id desc");
                                $i=0;
                                while($row = $sel->fetch_assoc())
                                {
                                  $sel_usr = $con->query("select * from user where id ='".$row['uid']."'");
                                  if($row_usr = $sel_usr->fetch_assoc())
                                  {
                                      $usr_name = $row_usr['name'];
                                  }
                                    
                                    $i = $i + 1;
                                ?>
                                <tr>
                                    
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row['order_date'];?></td>
                                    <td><?php echo $row['oid'];?></td>
                                    <td><?php echo $usr_name;?></td>
                                 
                                    <td><?php echo ucfirst($row['status']);?></td>
                                    								   <td>
								  <button class="preview_d shadow-z-2 btn btn-primary" data-id="<?php echo $row['id'];?>" data-toggle="modal" data-target="#myModal">Preview</button></td>
								  
								  
                                   
                                </tr>
                               <?php  }?>
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php 
if(isset($_GET['status']))
{
$status = $_GET['status'];
$id = $_GET['id'];

  $con->query("update orders set status='".$status."' where id=".$id."");  
?>
	<script type="text/javascript">
  $(document).ready(function() {
    toastr.options.timeOut = 4500; // 1.5s

    toastr.info('Order Status Update Successfully!!');
	setTimeout(function()
	{
		window.location.href="orders.php";
	},1500);
    
  });
  </script>
  <?php
}
if(isset($_GET['dele']))
{
$con->query("delete from orders where id=".$_GET['dele']."");
?>
	<script type="text/javascript">
  $(document).ready(function() {
    toastr.options.timeOut = 4500; // 1.5s

    toastr.error('selected order deleted successfully.');
    setTimeout(function()
	{
		window.location.href="orders.php";
	},1500);
  });
  </script>
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
  
   <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body p_data">
      
      </div>
     
    </div>

  </div>
</div>

   <script>
       $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
       {
           extend: 'print',
           footer: true,
           exportOptions: {
                columns: [0,1,2,3,4]
            }
       },
       {
           extend: 'excel',
           footer: false,
           exportOptions: {
                columns: [0,1,2,3,4]
            }
       }         
    ]  
      });
  </script>
  <script>
$(document).ready(function()
{
 $("#example").on("click", ".preview_d", function()
	{
		var id = $(this).attr('data-id');
		$.ajax({
			type:'post',
			url:'pdata.php',
			data:
			{
				pid:id
			},
			success:function(data)
			{
				$(".p_data").html(data);
			}
		});
	});
});
</script>

<script>
function printDiv(pid) 
{
  window.location.href = 'print-bill.php?oid='+pid;


}
</script>


<style>
#example_wrapper
{
    overflow:auto;
}
    td p {
   /* border-bottom: 1px solid #dee2e6;*/
    /* padding: 0% !important; */
    margin: 0px;
   /* font-size:11px;*/
}
td.manage_td
{
padding: 0% !important;
}
table
{
    /*font-size:12px;*/
}
}
</style>

</html>