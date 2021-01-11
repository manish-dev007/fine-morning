<?php session_start();
require 'db.php';
$data = json_decode(file_get_contents('php://input'), true);
if($data['uid'] == '')
{
 $returnArr = array("ResponseCode"=>"401","Result"=>"false","ResponseMsg"=>"Something Went Wrong!");    
}
else
{
date_default_timezone_set('Asia/Kolkata');
$uid =  $data['uid'];
$oid = $_SESSION["order_id"];
$p_name = $data['pname'];
$status = 'pending';
$p_method = $data['p_method'];
$address_id = $data['address_id'];
$timestamp = date("Y-m-d");
$tid = $data['tid'];
$promo_c = $ship_charge = 0;
if ($data['promo_c'] == '') {
	$promo_c = 0;
}else{
	$promo_c = $data['promo_c'];
}
if ($data['ship_charge'] == '') {
	$ship_charge = 0;
}else{
	$ship_charge = $data['ship_charge']; 
}
$total = number_format((float)$data['total'], 2, '.', '');
$e= array();
$p = array();
$w=array();
$pp = array();
$q = array();
$tax_p = 0;
for($i=0;$i<count($p_name);$i++)
{
$e[] = $p_name[$i]['title'];
$p[] = $p_name[$i]['pid'];
$t[] = $p_name[$i]['ptax'];

$pp[] = $p_name[$i]['cost'];
$q[] = $p_name[$i]['qty'];
$subt = $p_name[$i]['cost']*$p_name[$i]['qty'];
$tax_p += ($subt)*(12/100);
}

$p_name = implode('$;',$e);
$pid = implode('$;',$p);
$pprice = implode('$;',$pp);
$qty = implode('$;',$q);
$ptax = implode('$;',$t);
$totl_amt = ($total+$ship_charge)-$promo_c;
$con->query("insert into orders(`oid`,`uid`,`pname`,`pid`,`pprice`,`ptax`,`order_date`,`status`,`qty`,`total`,`p_method`,`address_id`,`tax`,`promocode`,`tid`,`ship_charge`)values('".$oid."',".$uid.",'".$p_name."','".$pid."','".$pprice."','".$ptax."','".$timestamp."','".$status."','".$qty."',".$totl_amt.",'".$p_method."',".$address_id.",".$tax_p.",'".$promo_c."','".$tid."','".$ship_charge."')");

$con->query("insert into tbl_order_status(`oid`,`uid`,`odr_status`,`last_modified_date`)values('".$oid."',".$uid.",'".$status."','".$timestamp."')");

$returnArr = array("ResponseCode"=>"200","Result"=>"true","ResponseMsg"=>"Order Placed Successfully!!!","oid"=>$oid);
}

echo json_encode($returnArr);