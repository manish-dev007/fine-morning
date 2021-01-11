<?php 
 
 require 'db.php';
$data = json_decode(file_get_contents('php://input'), true);
$item = $data['item'];
if($item == '')
{
	$returnArr = array("ResponseCode"=>"401","Result"=>"false","ResponseMsg"=>"Something Went wrong  try again !");
}
else 
{

	$cy = $con->query("SELECT * FROM product WHERE status='1' and pname LIKE '%".$item."%' LIMIT 10");
	$count = $con->query("SELECT * FROM product WHERE status='1' and pname LIKE '%".$item."%' LIMIT 10")->num_rows;
	if($count != 0)
	{
	$p = array();
	$q = array();
	while($row = $cy->fetch_assoc())
	{
		$p['id'] = $row['id'];
		$p['pname'] = $row['pname'];
		

		$p['psdesc'] = $row['psdesc'];
		$p['pgms'] = $row['pgms'];
		$p['pprice'] = $row['pprice'];
		$p['status'] = $row['status'];
		$p['stock'] = $row['stock'];
		$p['pimg'] = $row['pimg'];
		$p['discount'] = $row['discount'];
		$p['url_slug'] = $row['url_slug'];
		$q[] = $p;
	}
	$returnArr = array("ResponseCode"=>"200","Result"=>"true","ResponseMsg"=>"Product List Get Successfully!!!","ResultData"=>$q);
}
else 
{
	$returnArr = array("ResponseCode"=>"401","Result"=>"false","ResponseMsg"=>"Product Not Found!!");
}
}
echo json_encode($returnArr);
mysqli_close($con);
?> 	