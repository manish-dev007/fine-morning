<?php 
 
require 'db.php';
$data = json_decode(file_get_contents('php://input'), true);
$uid = $data['uid'];
if($data['uid'] == '' or $data['old_pwd'] == '' or $data['newpwd'] == '' or $data['cpwd'] == '')
{
	$returnArr = array("ResponseCode"=>"401","Result"=>"false","ResponseMsg"=>"Something Went wrong  try again !");
}
else 
{
	$pwd = '';
	$count = $con->query("select * from user where id=".$uid."")->num_rows;
	if($count != 0)
	{
		$cy = $con->query("select password from user where id=".$uid."");
		if($row = $cy->fetch_assoc())
		{
			$pwd = $row['password'];			
		}

		if ($pwd == $data['old_pwd']) {
			$con->query("update user set password='".$data['newpwd']."' where id=".$uid."");
			$returnArr = array("ResponseCode"=>"200","Result"=>"true","ResponseMsg"=>"Password Changed Successfully!!!");
		}else{
			$returnArr = array("ResponseCode"=>"401","Result"=>"false","ResponseMsg"=>"Your old Password is Wrong!!!");
		}
		
	}
	else 
	{
		$returnArr = array("ResponseCode"=>"401","Result"=>"false","ResponseMsg"=>"User Not Found!!");
	}
}
echo json_encode($returnArr);
mysqli_close($con);
?> 	