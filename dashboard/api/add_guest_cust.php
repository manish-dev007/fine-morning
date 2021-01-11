<?php session_start();
require 'db.php';
$data = json_decode(file_get_contents('php://input'), true);

$uname = $data['uname'];
$cust_email = $data['cust_email'];
$cust_phone = $data['cust_phone'];
$cust_alt_phone = $data['cust_alt_phone'];
$city = $data['city'];
$state = $data['state'];
$landmark = $data['landmark'];
$address = $data['address'];
$pincode = $data['pincode'];
$cust_type = $data['cust_type'];
$address_type = $data['address_type'];
$timestamp = date("Y-m-d H:i:s");

if($uname == '' or $cust_email == '' or $cust_phone == '' or $city == '' or $state == '' or $landmark == '' or $address == '' or $pincode == '' or $cust_type == '' or $address_type == '')
{
	$returnArr = array("ResponseCode"=>"401","Result"=>"false","ResponseMsg"=>"Please Fill all details..!");
}
else 
{

	$sts = 0;$uid  ='';
    $checkmob = $con->query("select * from user where (mobile='".$cust_phone."' or email='".$cust_email."') and status = '1'");
    if($checkmob->num_rows != 0)
    {
        $sts = 1;
        if($row = $checkmob->fetch_assoc())
		{
			$uid = $row['id'];
		}
    }
    else
    {
        $sts = 0;
    }

    if ($sts == 1) {
        $con->query("insert into address(`uid`,`hno`,`society`,`pincode`,`area`,`landmark`,`type`,`name`)values(".$uid.",'".$address."','".$city."',".$pincode.",'".$state."','".$landmark."','".$address_type."','".$uname."')");

		$_SESSION["umobile"] = $cust_phone;
		$_SESSION["uemail"] = $cust_email;
		$_SESSION["uname"] = $uname;
		$_SESSION["uid"] = $uid;

		$returnArr = array("ResponseCode"=>"200","Result"=>"true","ResponseMsg"=>"Address Saved Successfully!!!");
    }
    if ($sts == 0) {
    	$pwd = rand(9999,99999);
    	$con->query("insert into user(`name`,`email`,`mobile`,`rdate`,`password`,`status`,`user_type`,`alternate_mob`)values('".$uname."','".$cust_email."','".$cust_phone."','".$timestamp."','".$pwd."','1','".$cust_type."','".$cust_alt_phone."')");
    	$uid = '';
    	$checkd = $con->query("select * from user where mobile='".$cust_phone."' and email='".$cust_email."' and status = '1'");
    	if($row_c = $checkd->fetch_assoc())
		{
			$uid = $row_c['id'];
		}


        $con->query("insert into address(`uid`,`hno`,`society`,`pincode`,`area`,`landmark`,`type`,`name`)values(".$uid.",'".$address."','".$city."',".$pincode.",'".$state."','".$landmark."','".$address_type."','".$uname."')");
        
		$_SESSION["umobile"] = $cust_phone;
		$_SESSION["uemail"] = $cust_email;
		$_SESSION["uname"] = $uname;
		$_SESSION["uid"] = $uid;

		$returnArr = array("ResponseCode"=>"200","Result"=>"true","ResponseMsg"=>"Address Saved Successfully!!!");
    }



}
echo json_encode($returnArr);
mysqli_close($con);
?> 