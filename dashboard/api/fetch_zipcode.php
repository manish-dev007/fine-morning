<?php 
require 'db.php';
$data = json_decode(file_get_contents('php://input'), true);
$promo_code = $data['promo_code'];
if($promo_code == '')
{
	$returnArr = array("ResponseCode"=>"401","Result"=>"false","ResponseMsg"=>"Please Enter Zipcode !");
}
else 
{
	$cy = $con->query("select * from pincode_list where pincode='".$promo_code."' and serviceable = 1");
	$count = $con->query("select * from pincode_list where pincode='".$promo_code."' and serviceable = 1")->num_rows;
	if($count != 0)
	{
	$p = array();
	$q = array();
	if($row = $cy->fetch_assoc())
	{
		$p['id'] = $row['id'];
		$p['area'] = $row['area'];
		$p['serviceable'] = $row['serviceable'];
		if($row['serviceable'] == '1'){
			$p['serv'] = 'Delivery Availbale.';
		}else{
			$p['serv'] = 'Delivery not Availbale.';
		}
		$q[] = $p;
	}
	$returnArr = array("ResponseCode"=>"200","Result"=>"true","ResponseMsg"=>"Zipcode Found!!!","ResultData"=>$q);
}
else 
{
	$returnArr = array("ResponseCode"=>"401","Result"=>"false","ResponseMsg"=>"Zipcode Not Found!!");
}
}
echo json_encode($returnArr);
mysqli_close($con);
?> 	