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
                    <h4 class="card-title">Queries List</h4>
                </div>
                
                <div class="card-body collapse show">
                    <div class="card-block card-dashboard">
                       
                       
                        <table class="table table-striped" id="example">
                            <thead>
                                <tr>
								 <th>Sr No.</th>
                                   
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Subject</th>
                                    <th>Messagee</th>
                                    <th>Date</th>
                                    <th>#</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $sel = $con->query("select * from contact_details order by id DESC");
                                $i=0;
                                while($row = $sel->fetch_assoc())
                                {
                                    $i= $i + 1;
                                ?>
                                <tr>
                                    
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row['name'];?></td>
                                    <td><?php echo $row['email'];?></td>
                                    <td><?php echo $row['phone'];?></td>
                                    <td><?php echo $row['subject'];?></td>
                                    <td><?php echo $row['message'];?></td>
                                    <td><?php echo $row['contact_date'];?></td>
                                    <td>
                                    <a class="primary" onclick="fetchQuery(<?php echo $row['id'];?>);" data-toggle="modal" data-target="#queriesmodal" href="javascript:void(0);" data-original-title="" title="View Queries">
                                            <i class="ft-eye font-medium-3"></i>
                                        </a>
										
									<a class="danger" data-original-title=""  href="?dele=<?php echo $row['id'];?>" title="">
                                            <i class="ft-trash font-medium-3"></i>
                                        </a>
                                    </td>
                                    
                                   
                                    
                                   
                                </tr>
                               <?php } ?>
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<?php 
if(isset($_GET['dele']))
{
$con->query("delete from contact_details where id=".$_GET['dele']."");
?>
	 <script type="text/javascript">
  $(document).ready(function() {
    toastr.options.timeOut = 4500; // 1.5s

    toastr.error('Query deleted successfully.');
    setTimeout(function()
	{
		window.location.href="";
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

    <div class="modal fade" id="queriesmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Queries</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal_queriea">
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
   
    <?php 
  require 'include/js.php';
  ?>
    <script>
 function fetchQuery(id)
  {
    $.ajax({
      type:'post',
      url:'fetch_query.php',
      data:{pid:id},
      success:function(data)
      {
        $('.modal_queriea').html(data);
      }
    });
  }
</script>
<script>
       $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
       {
           extend: 'print',
           footer: true,
           exportOptions: {
                columns: [0,1,2,3,4,5,6]
            }
       },
       {
           extend: 'excel',
           footer: false,
           exportOptions: {
                columns: [0,1,2,3,4,5,6]
            }
       }         
    ]  
      });
  </script>
  </body>


</html>