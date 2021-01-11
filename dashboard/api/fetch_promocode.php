<?php 
 
 require 'db.php';
$data = json_decode(file_get_contents('php://input'), true);
$uid = $data['uid'];
$pid = $data['promo_code'];
if($pid == '')
{
	$returnArr = array("ResponseCode"=>"401","Result"=>"false","ResponseMsg"=>"Something Went wrong  try again !");
}
else 
{
	$cy = $con->query("select * from promocodes where promo_name='".$pid."' ");
	$count = $con->query("select * from promocodes where promo_name='".$pid."' ")->num_rows;
	if($count != 0)
	{
	$p = array();
	$q = array();
	if($row = $cy->fetch_assoc())
	{
		$p['id'] = $row['id'];
		$p['promo_type'] = $row['promo_type'];
		$p['promo_name'] = $row['promo_name'];
		$p['promo_value'] = $row['promo_value'];
		$p['expiry_date'] = $row['expiry_date'];
		
		$p['status'] = $row['status'];
		$q[] = $p;
	}
	$returnArr = array("ResponseCode"=>"200","Result"=>"true","ResponseMsg"=>"Promocode Get Successfully!!!","ResultData"=>$q);
}
else 
{
	$returnArr = array("ResponseCode"=>"401","Result"=>"false","ResponseMsg"=>"Promocode Not Found!!");
}
}
echo json_encode($returnArr);
mysqli_close($con);
?> 	