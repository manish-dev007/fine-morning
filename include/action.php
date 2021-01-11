<?php
session_start();
extract($_GET); 
date_default_timezone_set('Asia/Kolkata');
$conn = new mysqli("localhost", "finemorning", "Groot@9897", "finemorning");
$fromemail = "info@finemorningpharma.com";
if ($id == 'login-user') {
	$umob = $_POST['mobile'];
	$email = $_POST['email'];
	$name = $_POST['name'];
	$uid = $_POST['uid'];
	$_SESSION["umobile"] = $umob;
	$_SESSION["uemail"] = $email;
	$_SESSION["uname"] = $name;
	$_SESSION["uid"] = $uid;
	echo "y";
}


if ($id == 'forgot-pwd') {
	if($_POST['email'] == '' || $_POST['action'] == '')
	{
	    $returnArr = array("ResponseCode"=>"401","Result"=>"false","ResponseMsg"=>"Something Went Wrong!");
	}
	else
	{
		$length = 78;
		$token = bin2hex(random_bytes($length));
	    $uname = '';
	    $search = $conn->query("select * from user where email='".$_POST['email']."'");
	    if($search->num_rows > 0)
	    {       
	    	if($_POST['action'] == '')
			{ 
				$returnArr = array("ResponseCode"=>"200","Result"=>"true","ResponseMsg"=>$msg);
			}else{
	    	if($row = $search->fetch_assoc())
			{
				$uname = $row['name'];			
			}
			$fromemail = "info@finemorningpharma.com";
			$today_dt = date("Y-m-d H:i", strtotime('+1 hour'));
	    	$msg = 'Please Check your mail, We have sent you a Password recovery Process..';
	    	$subject = 'Forgot Password - Fine Morning Pharma';
	    	$message = '<table border="0" cellpadding="0" cellspacing="0" style="background:#f6f6f6;font-size:15px;line-height:25px;font-family:Arial,Helvetica,sans-serif;padding:25px;border:1px solid #ccc" width="700">
	    <tbody>
	        <tr>
	            <td align="right" valign="top"><img alt="logo" src="https://www.finemorningpharma.com/dashboard/website/logo.png?id='.$token.'" class="CToWUd"></td>
	        </tr>
	        <tr>
	            <td align="left" valign="top">Dear '.$uname.',<br>
	            <br>
	            You have requested to reset your password. Please use the link below to access our secure password reset function.<br>
	            <br>
	            <span style="background:#3ab54a;color:#fff;padding:5px 15px;border-radius:5px"><a href="https://www.finemorningpharma.com/recover_pwd?tokenId='.$token.'&token_sname='.base64_encode($_POST['email']).'" style="color:#fff;text-decoration:none" target="_blank" >Reset Password</a></span><br><br>
            The above link will be valid for 1 hour from the time of the request.<br>
	            <br>
	            Thanks &amp; Regards<br>
	            TEAM - <a href="https://www.finemorningpharma.com/" target="_blank">Fine Morning Pharma</a><br>
	            &nbsp;</td>
	        </tr>
	        <tr>
	            <td align="center" style="background:#3ab54a;color:#fff;padding:15px;font-size:17px;font-weight:bold">For further inquiries call us on : +91-918767287918<br>
	            Mail us on <a href="mailto:finemorningpharma@gmail.com" style="color:#fff;text-decoration:none" target="_blank">finemorningpharma@gmail.com</a></td>
	        </tr>
	    </tbody>
	</table>';
			$upd_auth = $conn->query("update user set token_auth = '".$token."',auth_date = '".$today_dt."' where email='".$_POST['email']."'");
			
			$f_name = $uname;
    		
    		$toemail = $_POST['email']; 
    
    						
    		$mailheaders = "MIME-Version: 1.0" . PHP_EOL;
    		$mailheaders .= "Content-type: text/html; charset=iso-8859-1" . PHP_EOL;
    		$mailheaders .= "From: Fine Morning Pharma" . $fromemail . PHP_EOL;
    		$mailheaders .= "Bcc: finemorningpharma@gmail.com" . PHP_EOL;
    		$mailheaders .= "Reply-To: " . $fromemail . PHP_EOL;
    		$mailheaders .= "X-Mailer: PHP/" . phpversion();
    		$mailheaders .= "X-Priority: 1" . PHP_EOL;
    			
    
    		$mail_data = mail($toemail, $subject, $message, $mailheaders, "-odb -f $fromemail");
    	
	 		$returnArr = array("ResponseCode"=>"200","Result"=>"true","ResponseMsg"=>$msg,"ResponseMail"=>$message);
				
			}
	    }
	    else
	  {
	      $returnArr = array("ResponseCode"=>"401","Result"=>"false","ResponseMsg"=>"Email ID Not Registered!!");
	  }
	}
	echo json_encode($returnArr);
}

if ($id == 'add-to-cart') {
	
	$product_id = base64_decode($_POST['product_id']);
	$product_qty = $_POST['product_qty'];
	$pro_price = $_POST['pro_price'];
	$total_price=0;
	$response = array();
	$response['data'] = array();
	// initialize empty cart items array
	$cart_total = 0;
	$cart_items=array();
	if (isset($_COOKIE['cart_items_cookie'])){
		$cookie_dec = json_decode($_COOKIE['cart_items_cookie'] , true);
		if (empty($cookie_dec)) {
			$cart_total = 1;
		}else{
			$cart_total = 0;
		}
	}else{
		$cart_total = 2;
	}

	// add new item on array
	$cart_items[$product_id]=$product_id;
	$cart_items[$product_id]=$product_qty.",".$pro_price;

	// read the cookie
	$cookie = isset($_COOKIE['cart_items_cookie'])?$_COOKIE['cart_items_cookie']:'';
	$cookie = stripslashes($cookie);
	$saved_cart_items = json_decode($cookie, true);
		    
	// if $saved_cart_items is null, prevent null error
	if(!$saved_cart_items){
		$saved_cart_items=array();
	}

	// check if the item is in the array, if it is, do not add
	if(array_key_exists($product_id, $saved_cart_items)){
		// redirect to product list and tell the user it was already added to the cart
		$response['status']="exist";
	}else{
		if(count($saved_cart_items)>0){
			foreach($saved_cart_items as $key=>$value){
			    // add old item to array, it will prevent duplicate keys
			    $cart_items[$key]=$value;
			}
		}
		if(count($cart_items)>0){
		    foreach($cart_items as $key=>$value){
		    // add old item to array, it will prevent duplicate keys
				$col=array();
		        $col['itemid']=$key;
		        $col['itemqty']=$value;
		        array_push($response['data'], $col);		             
			}
		}
		$response['status']="added";

		$response['cart_items']=$cart_total;
		//$response['items']=$col;
		$json = json_encode($cart_items, true);
		//echo $json;
		setcookie('cart_items_cookie', $json,time() + 2592000, "/");
	}
	echo json_encode($response,JSON_PRETTY_PRINT);
	//$json_cart = json_encode($cart);

	//setcookie('cart', $json_cart, time() + 60*100000, '/'); 
}
if ($id == 'delete-cart-item-order') {
	setcookie('cart_items_cookie', '',time() - 2592000, "/");
}

if ($id == 'delete-cart-item') {
	$item_id = base64_decode($_POST['id']);
	$cart_items=array();
	$cookie_dec = json_decode($_COOKIE['cart_items_cookie'] , true);
	$cart_items["cart_items"] = array();
	$idata = '';

	foreach($cookie_dec as $key => $val) {
		if($key==$item_id){
			$idata = $val;break;
		}
	}
	$dataDecode = explode(',', $idata);
	$total = ($dataDecode[0]*$dataDecode[1]);
	//var_dump($dataDecode);
	$cart_items["total"] = $total;
	unset($cookie_dec[$item_id]);
	$cart_toal = 1;
	if (empty($cookie_dec)) {
		$cart_toal = 0;
	}
	$cart_items["cart_items"] = $cart_toal;
	$json = json_encode($cookie_dec, true);
	if(setcookie('cart_items_cookie', $json,time() + 2592000, "/")){
		echo json_encode($cart_items,JSON_PRETTY_PRINT);		
	}
}


if ($id == 'update-to-cart') {
	$product_id = base64_decode($_POST['product_id']);
	$product_qty = $_POST['product_qty'];
	$pro_price = ltrim($_POST['pro_price'], '₹');
	$total_price=0;
	$response = array();
	$response['data'] = array();
	// initialize empty cart items array
	$cart_items=array();

	// add new item on array
	$cart_items[$product_id]=$product_id;
	$cart_items[$product_id]=$product_qty.",".$pro_price;
	// read the cookie
	$cookie = isset($_COOKIE['cart_items_cookie'])?$_COOKIE['cart_items_cookie']:'';
	$cookie = stripslashes($cookie);
	$saved_cart_items = json_decode($cookie, true);

	foreach($cart_items as $key => $val)
	{
	    if(array_search($key, $saved_cart_items) === false)
	    {
	        unset($saved_cart_items[$key]);
	    }
	}
	// if $saved_cart_items is null, prevent null error
	if(!$saved_cart_items){
		$saved_cart_items=array();
	}
		if(count($saved_cart_items)>0){
			foreach($saved_cart_items as $key=>$value){
			    // add old item to array, it will prevent duplicate keys
			    $cart_items[$key]=$value;
			}
		}
	
		if(count($cart_items)>0){
		    foreach($cart_items as $key=>$value){
		    // add old item to array, it will prevent duplicate keys
				$col=array();
		        $col['itemid']=$key;
		        $col['itemqty']=$value;
		        //$col['itemqty']=$itemqty;

		        array_push($response['data'], $col);		             
			}
		}
		$response['status']="added";
		$response['items']=$col;
		$json = json_encode($cart_items, true);
		//echo $json;
		setcookie('cart_items_cookie', $json,time() + 2592000, "/");
	
	echo json_encode($response,JSON_PRETTY_PRINT);
	//$json_cart = json_encode($cart);

	//setcookie('cart', $json_cart, time() + 60*100000, '/'); 
}
if ($id == 'cart_checkout') {
	if (isset($_COOKIE['cart_items_cookie'])) {
		$cookie_val = $_COOKIE['cart_items_cookie'];
		$json_cookie_d = json_decode($cookie_val);
		$pro_name = $pro_id = $pro_ptax = 0;
		$arr = array();
		$odr_id = 0;
		$re_oid = $conn->query("SELECT max(id) as dd FROM orders");
		if ($re_oid->num_rows > 0) {
		  if($row_oid = $re_oid->fetch_assoc()) {
		  	$odr_id = "#FMP".rand(100000,99999).$row_oid['dd'];
		  }
		}else{
			$odr_id = 0;
		}
		$_SESSION["order_id"] = $odr_id;
		foreach ($json_cookie_d as $key => $value) {
			$result = $conn->query("SELECT pname,ptax FROM product where id = '".$key."'");
			if ($result->num_rows > 0) {
			  if($row = $result->fetch_assoc()) {
			  	$pro_name = $row['pname'];
			  	$pro_ptax = $row['ptax'];
			  }     
			}
			if($pro_ptax == ''){
				$pro_ptax = 0;
			}
			$pro_id = $key;
			$vals = explode(',',$value);
			$arr[] = array('title' => $pro_name, 'pid' => $pro_id, 'ptax' => $pro_ptax, 'cost' => $vals[1], 'qty' => $vals[0]);	
		}
		echo json_encode($arr);
	}else{
		echo "N";
	}
}

if ($id == 'cart_online_pay') {
	//$data = json_decode(file_get_contents('php://input'), true);
	$_SESSION["checkout_online_pay"] = $_POST['udata'];
	$_SESSION["check_pid"] = $_POST['pids'];
}

if ($id == 'updatepayIdOrder') {
	$odr_id = $_POST['odr_id'];
	$pay_id = $_POST['pay_id']; 
	$result = $conn->query("update orders set payment_id = '".$pay_id."' where oid = '".$odr_id."'");
	unset($_SESSION["checkout_online_pay"]);unset($_SESSION["check_pid"]);unset($_SESSION["razorpay_order_id"]);
}

if ($id == 'booking_confirm_msg') {
	if($_POST['oid'] == '' || $_POST['uid'] == '' || $_POST['uname'] == '')
	{
	    $returnArr = array("ResponseCode"=>"401","Result"=>"false","ResponseMsg"=>"Something Went Wrong!");
	}else{   
		$length = 78;
		$token = bin2hex(random_bytes($length));
		$message = '';
	    $uid = $_POST['uid'];
	    $oid = $_POST['oid'];
	    $uname = $_POST['uname'];
		$cy = $conn->query("select * from orders where uid='".$uid."' and oid='".$oid."'");
		$count = $conn->query("select * from orders where uid='".$uid."' and oid='".$oid."'")->num_rows;
		$total_charge = '';
        $subject = 'Order No. '.$oid.' - Fine Morning Order Confirmation';

        $u_phone = '';
		$u_ph = $conn->query("select * from user where id='".$uid."'");
		if($row_ph = $u_ph->fetch_assoc())
		{
			$u_phone = $row_ph['mobile'];
		}


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
				$p_adr = $conn->query("select * from address where id='".$address_id."'");
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
						$p_f = $conn->query("select * from product where id='".$pid[$i]."'");
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
							    $order_status = 'Your Order has been successfully <b>placed</b> with Order ID: <strong>'.$oid.'</strong>';
							    $order_status1 = 'You order with ID: <strong>'.$oid.'</strong> has been successfully <b>placed</b>. We will initiate the packaging and have it shipped to you the minute it is ready.';
							    $order_update_date = '';

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

				            $f_name = $_POST['uname'];
							$subject = $subject;
							$fromemail = "info@finemorningpharma.com";
							$toemail = $_POST['uemail']; //please change this email id

											
							$mailheaders = "MIME-Version: 1.0" . PHP_EOL;
							$mailheaders .= "Content-type: text/html; charset=iso-8859-1" . PHP_EOL;
							$mailheaders .= "From: Fine Morning Pharma " . $fromemail . PHP_EOL;
							$mailheaders .= "Cc: finemorningpharma@gmail.com" . PHP_EOL;
							$mailheaders .= "Reply-To: " . $fromemail . PHP_EOL;
							$mailheaders .= "X-Mailer: PHP/" . phpversion();
							$mailheaders .= "X-Priority: 1" . PHP_EOL;
								

							$mail_data = mail($toemail, $subject, $en_msg, $mailheaders, "-odb -f $fromemail");
							if ($mail_data) {
								echo "Y";
							}else{
								echo "N";
							}
							$mailAdmin_data = mail($fromemail, $subject, $en_msg, $mailheaders, "-odb -f $fromemail");
				
				$returnArr = array("ResponseCode"=>"200","Result"=>"true","ResponseMsg"=>"Order Info Get Successfully!!!","ResultData"=>$en_msg);

			}
		echo json_encode($returnArr);

		}
	}

}



if($id == 'popup-session'){
	$_SESSION["session_popup"] = '1';
}

if($id == 'send-email'){
		$f_name = $_POST['uname'];
		$subject = $_POST['subject'];
		
		$toemail = $_POST['uemail']; //please change this email id

		$fromemail = "info@finemorningpharma.com";				
		$mailheaders = "MIME-Version: 1.0" . PHP_EOL;
		$mailheaders .= "Content-type: text/html; charset=iso-8859-1" . PHP_EOL;
		$mailheaders .= "From: Fine Morning Pharma" . $fromemail . PHP_EOL;
		$mailheaders .= "Bcc: finemorningpharma@gmail.com" . PHP_EOL;
		$mailheaders .= "Reply-To: " . $fromemail . PHP_EOL;
		$mailheaders .= "X-Mailer: PHP/" . phpversion();
		$mailheaders .= "X-Priority: 1" . PHP_EOL;
			
		$message = $_POST['message'];

		$mail_data = mail($toemail, $subject, $message, $mailheaders, "-odb -f $fromemail");
		if ($mail_data) {
			echo "Y";
		}else{
			echo "N";
		}
		$mailAdmin_data = mail($fromemail, $subject, $message, $mailheaders, "-odb -f $fromemail");
		
}


?>