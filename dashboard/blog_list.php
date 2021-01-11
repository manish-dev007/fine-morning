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
                    <h4 class="card-title">Blogs List</h4>
                </div>
                
                <div class="card-body collapse show">
                    <div class="card-block card-dashboard">
                       
                       
                        <table class="table table-striped" id="example">
                            <thead>
                                <tr>
								 <th>Sr No.</th>
                                   
                                    <th>Blog Title</th>
                                    <th>Category</th>
                                    <th>URL</th>
                                    <th>Created Date</th>
                                    <th>Status</th>
                                    <th>#</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $sel = $con->query("select * from blogs order by id DESC");
                                $i=0;
                                while($row = $sel->fetch_assoc())
                                {
                                    $i= $i + 1;
                                    $status = '';

                                    if($row['status'] == '1'){
                                        $status = '<span class="badge badge-success">Active</span>';
                                    }
                                    if($row['status'] == '0'){
                                        $status = '<span class="badge badge-danger">Not Active</span>';
                                    }
                                ?>
                                <tr>
                                    
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row['blog_title'];?></td>
                                    <td><?php echo $row['blog_category'];?></td>
                                    <td><?php echo $row['url'];?></td>
                                    <td><?php echo $row['creation_date'];?></td>
                                    <td><?php echo $status;?></td>
                                    <td>
                                    <a class="primary" href="blogs.php?edit=<?php echo $row['id'];?>" data-original-title="" title="">
                                            <i class="ft-edit font-medium-3"></i>
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
$con->query("delete from blogs where id=".$_GET['dele']."");
?>
	 <script type="text/javascript">
  $(document).ready(function() {
    toastr.options.timeOut = 4500; // 1.5s

    toastr.error('Promocode deleted successfully.');
    setTimeout(function()
	{
		window.location.href="blog_list.php";
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
  </body>


</html>