<?php 
require 'db.php';
$data = json_decode(file_get_contents('php://input'), true);
if($data['token_auth'] == '' or $data['token_email'] == '' or $data['newpwd'] == '' or $data['cpwd'] == '')
{
    $returnArr = array("ResponseCode"=>"401","Result"=>"false","ResponseMsg"=>"Something Went Wrong!");
}
else
{
    
    $search = $con->query("update user set password = '".$data['newpwd']."' where email='".$data['token_email']."' and token_auth = '".$data['token_auth']."'");
    if($search->num_rows != 0)
    {
        $returnArr = array("ResponseCode"=>"200","Result"=>"true","ResponseMsg"=>"Password Set Successfully!!!");
    }
    else
  {
      $returnArr = array("ResponseCode"=>"401","Result"=>"false","ResponseMsg"=>"Email ID Not Registered!!");
  }
}
echo json_encode($returnArr);
?>