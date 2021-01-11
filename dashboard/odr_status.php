<?php
require 'include/dbconfig.php';
date_default_timezone_set('Asia/Kolkata');
$timestamp = date("Y-m-d");
$pay_val = $_POST['pay_val'];
$pid = $_POST['pid'];
$userid = $oid = '';$u_phone = $uname = $u_email = '';
if($con->query("update orders set status = '".$pay_val."' where id=".$pid."")){

	

	$oder_info = $con->query("select * from orders where id='".$pid."'");

	if($row_oder_info = $oder_info->fetch_assoc())
	{
		$userid = $row_oder_info['uid'];
		$oid = $row_oder_info['oid'];
		$u_info = $con->query("select * from user where id='".$userid."'");	
		if($row_u_info = $u_info->fetch_assoc())
		{
			$uname = $row_u_info['name'];
			$u_phone = $row_u_info['mobile'];
			$u_email = $row_u_info['email'];
		}
	}
	$count_st = $con->query("select * from tbl_order_status where uid='".$userid."' and oid='".$oid."' and odr_status='".$pay_val."'")->num_rows;
	if($count_st > 0){
		echo "Status Already Updated";die;
	}else{
		$con->query("insert into tbl_order_status(`oid`,`uid`,`odr_status`,`last_modified_date`)values('".$oid."',".$userid.",'".$pay_val."','".$timestamp."')");
	}

	$length = 78;
		$token = bin2hex(random_bytes($length));
		$message = '';
	    $uid = $userid;
	    $oid = $oid;
	    $uname = $uname;
		$cy = $con->query("select * from orders where uid='".$uid."' and oid='".$oid."'");
		$count = $con->query("select * from orders where uid='".$uid."' and oid='".$oid."'")->num_rows;
		$total_charge = '';
        $subject = 'Order No. '.$oid.','.$pay_val.' - Fine Morning Order Status';

        $order_items = '';
		if($count != 0)
		{
			$p = array();
			$q = array();
			$p['product_list'] = array();
			if($row = $cy->fetch_assoc())
			{
				$address_id = $row['address_id'];
				$order_date  = date("d F Y",strtotime($row['order_date']));
				$p_addr = '';
				$p_adr = $con->query("select * from address where id='".$address_id."'");
				if($row_adr = $p_adr->fetch_assoc())
				{
					$p_addr = '<div style="font-weight:bold;margin-bottom:5px">'.$uname.'</div><div style="margin-bottom:5px">'.$row_adr['hno'].', '.$row_adr['society'].',<br> '.$row_adr['landmark'].',</div><div style="margin-bottom:5px"> '.$row_adr['area'].', '.$row_adr['pincode'].'<br><br><div style="margin-top:15px;margin-bottom:5px"><span style="font-weight:bold">Mobile:</span><span>'.$u_phone.'</span> </div>';
				}
				$deliv_addr = $p_addr;

				$total = $row['total'];
				$paymode = $row['p_method'];
				$total = $row['total'];

				$pid=explode('$;',$row['pid']);
				$pprice=explode('$;',$row['pprice']);
				$pname=explode('$;',$row['pname']);
				$qty=explode('$;',$row['qty']);
				$pimg = '';
				$ship_charge = $row['ship_charge'];
				$promocode = $row['promocode'];
				$ptax = $row['tax'];
				$cgst = $ptax/2;
				$sgst = $ptax/2;
				$subTot = 0;
				if(count($pid)>0){
					for($i=0;$i<sizeof($pid);$i++){
						$col=array();
						$col['pid']=$pid[$i];
						$p_f = $con->query("select * from product where id='".$pid[$i]."'");
						if($row_p = $p_f->fetch_assoc())
						{
							$pimg = $row_p['pimg'];
						}
						$p_name=$pname[$i];
						$p_img=$pimg;
						$price=$pprice[$i];
						$qnty=$qty[$i];
						$p_subtotal=$pprice[$i]*$qty[$i];

					$order_items .='<tr style="overflow:hidden;border-bottom:solid 1px #e8e8e8"><td style="padding-left:14px;width:50%;text-align:left;vertical-align:top;border-collapse:collapse"><table style="border-spacing:0px"><tbody><tr><td><img src="'.$p_img.'" alt="" class="'.$pname[$i].'"></td><td style="text-align:left;border-collapse:collapse;font-family:Helvetica,Arial,sans-serif;font-size:14px;vertical-align:top;color:#686868;padding-right:1%;padding-right:10px;padding-left:10px">'.$pname[$i].'</td></tr></tbody></table></td><td style="width:17%;text-align:left;padding-bottom:20px;border-collapse:collapse"><table style="border-spacing:0px"><tbody><tr><td style="font-family:Helvetica,Arial,sans-serif;font-size:14px;color:#686868;width:30%;padding-right:5px;text-align: center;">'.$qty[$i].'</td></tr></tbody></table></td><td style="border-bottom:solid 1px #e8e8e8;text-align:left;border-collapse:collapse;vertical-align:top;color:#686868;font-family:Helvetica,Arial,sans-serif;font-size:14px;width:15%;text-align:left">Rs. '.$pprice[$i].'</td><td style="border-bottom:solid 1px #e8e8e8;border-collapse:collapse;vertical-align:top;color:#686868;font-family:Helvetica,Arial,sans-serif;font-size:14px;width:15%;text-align:right;padding-right:15px">Rs. '.$pprice[$i]*$qty[$i].'</td></tr>';


						$subTot += $p_subtotal;
					}
				}
				$total_charge .= '<tr style="width:100%;overflow:hidden;color:#2c4152;font-family:Helvetica,Arial,sans-serif;font-size:14px;margin-bottom:5px;display:block"><td style="width:70%;float:left;padding-top:5px">Sub Total</td><td style="width:30%;text-align:right;padding-right:10px;padding-top:5px">Rs. '.$subTot.'</td></tr><tr style="width:100%;display:none;overflow:hidden;color:#2c4152;font-family:Helvetica,Arial,sans-serif;font-size:14px"><td style="width:70%;float:left;padding-top:5px">Shipping Chargep</td><td style="width:30%;text-align:right;padding-right:10px;padding-top:5px">Rs. '.$ship_charge.'</td></tr><tr style="width:100%;overflow:hidden;color:#2c4152;font-family:Helvetica,Arial,sans-serif;font-size:14px;display:block"><td style="width:70%;float:left;padding-top:5px;padding-bottom:10px">CGST (<b>6%</b>)</td><td style="width:30%;text-align:right;padding-right:10px;padding-top:5px;padding-bottom:10px">Rs. '.$cgst.'</td></tr><tr style="width:100%;display:block;overflow:hidden;color:#2c4152;font-family:Helvetica,Arial,sans-serif;font-size:14px"><td style="width:70%;float:left">SGST (<b>6%</b>)</td><td style="width:30%;text-align:right;padding-right:10px;">Rs. '.$sgst.'</td></tr>';
							    if($promocode != ''){
							        $total_charge .='<tr style="width:100%;display:none;overflow:hidden;color:#2c4152;font-family:Helvetica,Arial,sans-serif;font-size:14px"><td style="width:70%;float:left;padding-top:5px">Promocode Applied</td><td style="width:30%;text-align:right;padding-right:10px;color:#b9a07b;padding-top:5px;padding-bottom:5px">- Rs. '.$promocode.'</td></tr>';
							    }


							$order_status = 'Your Order has been successfully <b>'.$pay_val.'</b> with Order ID: <strong>'.$oid.'</strong>';
							    $order_status1 = 'You order with ID: <strong>'.$oid.'</strong> has been successfully <b>'.$pay_val.'</b>';
							    $order_update_date = '<tr>
                                            <td style="float:left;width: 25%;">
                                                <div style="font-family:Helvetica,Arial,sans-serif;margin-top:20px;font-size:14px;color:#333;font-weight:bold;margin-bottom:10px"> <b>'.$pay_val.'</b> Date : </div>
                                            </td>
                                            <td style="width:20%;vertical-align:top;float: left;">
                                                <div style="margin-bottom:5px;margin-top:20px;">'.$timestamp.'</div>
                                            </td>
                                        </tr>';

							$en_msg = file_get_contents('https://www.finemorningpharma.com/include/order_email.html');


				            $en_msg = str_replace('$order_no', $oid, $en_msg);
				            $en_msg = str_replace('$order_status', $order_status, $en_msg);
				            $en_msg = str_replace('$order_status1', $order_status1, $en_msg);
				            $en_msg = str_replace('$order_update_date', $order_update_date, $en_msg);
				            $en_msg = str_replace('$order_date', $order_date, $en_msg);
				            $en_msg = str_replace('$deliv_addr', $deliv_addr, $en_msg);
				            $en_msg = str_replace('$order_items', $order_items, $en_msg);
				            $en_msg = str_replace('$total_charge', $total_charge, $en_msg);
				            $en_msg = str_replace('$paymode', $paymode, $en_msg);
				            $en_msg = str_replace('$total_amt', $total, $en_msg);
				            $en_msg = str_replace('$token', $token, $en_msg);
				            $en_msg = str_replace('$custname', $uname, $en_msg);

				            $f_name = $uname;
							$subject = $subject;
							$fromemail = "info@finemorningpharma.com";
							$toemail = $u_email; //please change this email id

											
							$mailheaders = "MIME-Version: 1.0" . PHP_EOL;
							$mailheaders .= "Content-type: text/html; charset=iso-8859-1" . PHP_EOL;
							$mailheaders .= "From: Fine Morning Pharma " . $fromemail . PHP_EOL;
							$mailheaders .= "Cc: finemorningpharma@gmail.com" . PHP_EOL;
							$mailheaders .= "Reply-To: " . $fromemail . PHP_EOL;
							$mailheaders .= "X-Mailer: PHP/" . phpversion();
							$mailheaders .= "X-Priority: 1" . PHP_EOL;
								

							$mail_data = mail($toemail, $subject, $en_msg, $mailheaders, "-odb -f $fromemail");
							if ($mail_data) {
								echo "Order updated & an Email Sent to Customer";
							}else{
								echo "Something went wrong";
							}


			}
		}
}


?>