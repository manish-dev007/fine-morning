<?php 
  require 'include/header.php';
  $getkey = $con->query("select * from setting")->fetch_assoc();
  
  ?>
  <body data-col="2-columns" class=" 2-columns ">
       <div class="layer"></div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">


     
     <?php include('main.php'); ?>
     

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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $usr_name = '';
                                $sel = $con->query("select * from orders where status !='delivered' order by id desc");
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
                                   
									<td><?php echo ucfirst($row['status']);?><br><a href="javascript:void(0);" data-id="<?php echo $row['id'];?>" data-toggle="modal" data-target="#chngeStatus"  onclick="setOdrStatus(<?php echo $row['id'];?>)"><button class="btn shadow-z-2 btn-warning gradient-pomegranate"><i class="ft-edit-3"></i></button></a></td>
                                    								   <td>
								  <button class="preview_d btn btn-primary shadow-z-2" data-id="<?php echo $row['id'];?>" data-toggle="modal" data-target="#myModal">Preview</button></td>
											
								  
                                    <td>
								
									<?php if($row['p_method'] =='Pickup Myself' and $row['status'] != 'completed' and $row['status'] != 'cancelled') {?>
                  <a href="?status=completed&id=<?php echo $row['id'];?>"><button class="btn shadow-z-2 btn-success" >Make Completed</button></a>
                <?php } ?>
									 <a href="?dele=<?php echo $row['id'];?>"><button class="btn shadow-z-2 btn-danger gradient-pomegranate">Delete</button></a>
										</td>
                                   
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
		window.location.href="order.php";
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
		window.location.href="order.php";
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
    
  <?php require 'include/js.php';?>
    
  </body>
  
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    
    <div class="modal-content">
      <div class="modal-header">
        <h4>Order Preview</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body p_data">
      
      </div>
     
    </div>

  </div>
</div>

<div id="chngeStatus" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    
    <div class="modal-content">
      <div class="modal-header">
        <h4>Order Status</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-md-4">
          <input type="hidden" class="hiddnId">
        <label>Change Order Status</label>
        <select class="change_deliv_staus form-control" >
          <option>--</option>
          <option value="Pending">Pending</option>
          <option value="Dispatched">Dispatched</option>
          <option value="Out for Delivery">Out for Delivery</option>
          <option value="Delivered">Delivered</option>
        </select>
      </div>
      <div class="col-md-4">
        <label style="display: block;">&nbsp;</label>
        <button type="button" id="btn" class="btn btn-primary text-right btn_order_update">Update</button>
      </div>
    </div>
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
function setOdrStatus(id){
  $('.hiddnId').val(id);
}

$('.btn_order_update').click(function() {
var value = $('.change_deliv_staus').val();
var id = $('.hiddnId').val();
if (confirm('Do you want to update the status ?')) {
    
  $.ajax({
        type:'post',
        url:'odr_status.php',
        data:
        {
          pay_val:value,pid:id
        },
        success:function(data)
        {
            console.log(data);
            //window.location.href = '';
            alert(data);
             setTimeout(function(){ window.location = ''; }, 3000);
        }

        });
  }
});
</script>

<script>
function printDiv() 
{

  var divToPrint=document.getElementById('divprint');

  var newWin=window.open('','Print-Window');
var htmlToPrint = '' +
        '<style type="text/css">' +
        'table th, table td {' +
        'border:1px solid #000;' +
        'padding:0.5em;' +
        '}' +
        '.list-group { ' +
   ' display: flex; ' +
    ' flex-direction: column; ' +
   ' padding-left: 0; ' +
   ' margin-bottom: 0; ' +
 '}' +
 '.list-group-item {' +
   ' position: relative;' +
    'display: block;' +
    'padding: 0.75rem 1.25rem;' +
    'margin-bottom: -1px;' +
    'background-color: #fff;' +
    'border: 1px solid rgba(0, 0, 0, 0.125);' +
 '}' +
 
 '.float-right {' +
    'float: right !important;' +
 '}' +

        '</style>';
		
  newWin.document.open();
htmlToPrint += divToPrint.innerHTML;
  newWin.document.write('<html><body onload="window.print()">'+htmlToPrint+'</body></html>');
 
  newWin.document.close();

  setTimeout(function(){newWin.close();},1);

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
   /* font-size:12px;*/
}
}
</style>

</html>