<?php 
 
 require 'db.php';
$data = json_decode(file_get_contents('php://input'), true);
$uid = $data['uid'];
if($uid == '')
{
	$returnArr = array("ResponseCode"=>"401","Result"=>"false","ResponseMsg"=>"Something Went wrong  try again !");
}
else 
{
	$cy = $con->query("select * from address where uid=".$uid."");
	$count = $con->query("select * from address where uid=".$uid."")->num_rows;
	if($count != 0)
	{
	$p = array();
	$q = array();
	while($row = $cy->fetch_assoc())
	{
		$p['id'] = $row['id'];
		$p['uid'] = $row['uid'];
		$p['hno'] = $row['hno'];
		$p['society'] = $row['society'];
		$p['area'] = $row['area'];
		
		$p['pincode'] = $row['pincode'];
		$p['landmark'] = $row['landmark'];
		$p['type'] = $row['type'];
		$p['status'] = $row['status'];
		$p['name'] = $row['name'];
		$q[] = $p;
	}
	$returnArr = array("ResponseCode"=>"200","Result"=>"true","ResponseMsg"=>"Address List Get Successfully!!!","ResultData"=>$q);
}
else 
{
	$returnArr = array("ResponseCode"=>"401","Result"=>"false","ResponseMsg"=>"Address Not Found!!");
}
}
echo json_encode($returnArr);
mysqli_close($con);
?> 	