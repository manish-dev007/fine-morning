<?php 
  require 'include/header.php';
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
    $selk = $con->query("select * from faq where id=".$_GET['edit']."")->fetch_assoc();
?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form">Edit FAQ</h4>
                                </div>
                                <div class="card-body">
                                    <div class="px-3">
                                        <form class="form" method="post">
                                            <div class="form-body">
                                            <div class="form-group">
                                                    <label for="faq_cteg">FAQ Category</label>
                                                    <select class="form-control" name="faq_cteg" id="faq_cteg">
                                                        <option value="Anafine Powder" <?php if($selk['faq_categ'] == 'Anafine Powder'){ echo "selected"; }; ?>>Anafine Powder</option>
                                                        <option value="Anafine Cream" <?php if($selk['faq_categ'] == 'Anafine Cream'){ echo "selected"; }; ?>>Anafine Cream</option>
                                                        <option value="Bawaseal Tablet" <?php if($selk['faq_categ'] == 'Bawaseal Tablet'){ echo "selected"; }; ?>>Bawaseal Tablet</option>
                                                        <option value="Vedvigox Capsules" <?php if($selk['faq_categ'] == 'Vedvigox Capsules'){ echo "selected"; }; ?>>Vedvigox Capsules</option>
                                                    </select>
                                                </div>
                                            <div class="form-group">
                                                    <label for="faq_que1">FAQ Question</label>
                                                    <input type="text" id="faq_que1" class="form-control"
                                                        placeholder="FAQ Question" name="faq_que1" value="<?php echo $selk['faq_question'];?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="faq_ans1">FAQ Answer</label>
                                                    <textarea class="form-control" placeholder="FAQ Answer" rows="5" name="faq_ans" style="resize: none;"><?php echo $selk['faq_ans'];?></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label for="projectinput6">Status</label>
                                                    <select id="projectinput6" name="status1" class="form-control"
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
                                                    <i class="fa fa-check-square-o"></i> Update FAQ
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
		$faq_que = $_POST['faq_que1'];
		
        $faq_ans = $_POST['faq_ans'];
        $faq_cteg = $_POST['faq_cteg'];     
        $status = $_POST['status1'];       
        
        
		
        $con->query("update faq set faq_question='".$faq_que."',faq_ans='".$faq_ans."',status='".$status."',faq_categ='".$faq_cteg."' where id=".$_GET['edit']."");
		
		?>
                        <script type="text/javascript">
                        $(document).ready(function() {
                            toastr.options.timeOut = 4500; // 1.5s

                            toastr.info('FAQ Update Successfully!!');
                            setTimeout(function() {
                                window.location.href = "faq_list.php";
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
                                    <h4 class="card-title" id="basic-layout-form">Add New FAQ</h4>

                                </div>
                                <div class="card-body">
                                    <div class="px-3">
                                        <form class="form" action="#" method="post" >
                                            <div class="form-body">
                                            <div class="form-group">
                                                    <label for="faq_cteg">FAQ Category</label>
                                                    <select class="form-control" name="faq_cteg" id="faq_cteg">
                                                        <option value="Anafine Powder" >Anafine Powder</option>
                                                        <option value="Anafine Cream" >Anafine Cream</option>
                                                        <option value="Bawaseal Tablet" >Bawaseal Tablet</option>
                                                        <option value="Vedvigox Capsules" >Vedvigox Capsules</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="faq_que">FAQ Question</label>
                                                    <input type="text" id="faq_que" class="form-control"
                                                        placeholder="FAQ Question" name="faq_que" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="faq_ans">FAQ Answer</label>
                                                        <textarea class="form-control" placeholder="FAQ Answer" rows="5" name="faq_ans" style="resize: none;"></textarea>
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
                                                    <i class="fa fa-check-square-o"></i> Save Data
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
            $faq_que = $_POST['faq_que'];
		
            $faq_ans = $_POST['faq_ans'];
            $status = $_POST['status'];
            $faq_cteg = $_POST['faq_cteg'];
            
		
        $con->query("insert into faq(`faq_question`,`faq_ans`,`status`,`faq_categ`) values('".$faq_que."','".$faq_ans."','".$status."','".$faq_cteg."')");
	
		?>
                        <script type="text/javascript">
                        $(document).ready(function() {
                            toastr.options.timeOut = 4500; // 1.5s
                            toastr.info('FAQ Added Successfully!!');

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


<script src="https://cdn.ckeditor.com/4.5.1/standard/ckeditor.js"></script>
 <script>
 CKEDITOR.editorConfig = function (config) {
    config.language = 'es';
    config.uiColor = '#F7B42C';
    config.height = 300;
    config.toolbarCanCollapse = true;

};
CKEDITOR.replace('faq_ans');
</script>
</body>


</html>