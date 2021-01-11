<?php 
require 'include/dbconfig.php';
$pid = $_POST['pid'];

$c = $con->query("select * from contact_details where id=".$pid.""); 
$row = array();
while ( $c_find = $c->fetch_assoc()) {
  echo '<form>
              <div class="form-group">
                <label for="exampleInputEmail1">User Name</label>
                <input type="text" class="form-control q_name" id="exampleInputEmail1" value="'.$c_find['name'].'" readonly>
                
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">User Email</label>
                <input type="email" class="form-control q_email" id="exampleInputEmail1" value="'.$c_find['email'].'" readonly>
                
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Phone</label>
                <input type="text" class="form-control q_phonw" id="exampleInputEmail1" value="'.$c_find['phone'].'" readonly>
                
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Subject</label>
                <input type="text" class="form-control q_subject" id="exampleInputEmail1" value="'.$c_find['subject'].'" readonly>
                
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Message</label>
                <textarea class="form-control q_msg" readonly>'.$c_find['message'].'</textarea>
                
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Date</label>
                <input type="text" class="form-control q_date" id="exampleInputEmail1" value="'.$c_find['contact_date'].'" readonly>
                
              </div>
            </form>';
}

?>