<?php session_start();
require 'db.php';
$data = json_decode(file_get_contents('php://input'), true);
if($data['otp'] == '' or $data['mail'] == '')
{
    $returnArr = array("ResponseCode"=>"401","Result"=>"false","ResponseMsg"=>"Something Went Wrong!");
}
else
{
    
    $otp = strip_tags(mysqli_real_escape_string($con,$data['otp']));
    $email = strip_tags(mysqli_real_escape_string($con,$data['mail']));
     
     
    $checkemail = $con->query("select * from user where email='".$email."' and ccode = '".$otp."' and status = '0'");
   
    if($checkemail->num_rows <= 0)
    {
        $returnArr = array("ResponseCode"=>"401","Result"=>"false","ResponseMsg"=>"Account not Found! Please Register First");
    }
    else
    {
        $name = '';
        if($row_u = $checkemail->fetch_assoc())
        {
            $name = $row_u['name'];
            $auth_ac = $row_u['auth_date'];
            $NewDate=Date('Y-m-d H:i:s', strtotime("+1 days"));
            $auth_new = strtotime($NewDate);

            $timestamp = date("Y-m-d H:i:s");
            $auth_date = strtotime($timestamp);

            if($auth_new > $auth_date){
        
        $con->query("update user set status = '1' where email='".$email."' and ccode = '".$otp."'");

        $mail_content = 'Dear <b>'.$name.'</b>,<br>Your Account Verified Successfully..!<br>
                                                                <p>You can now login at <a href="https://www.finemorningpharma.com/" target="_blank">finemorningpharma.com</a>, and start order products with some clicks. </p>';
        $mail_header = 'Account Verification Successful - Fine Morning Pharma';


        $en_msg = file_get_contents('https://www.finemorningpharma.com/include/reg_email.html');


        $en_msg = str_replace('$mail_content', $mail_content, $en_msg);
        $en_msg = str_replace('$mail_header', $mail_header, $en_msg);

        $subject = 'Account Verification Successful - Fine Morning Pharma';
        $fromemail = "info@finemorningpharma.com";
        $toemail = $email; //please change this email id

                        
        $mailheaders = "MIME-Version: 1.0" . PHP_EOL;
        $mailheaders .= "Content-type: text/html; charset=iso-8859-1" . PHP_EOL;
        $mailheaders .= "From: Fine Morning Pharma " . $fromemail . PHP_EOL;
        $mailheaders .= "Cc: finemorningpharma@gmail.com" . PHP_EOL;
        $mailheaders .= "Reply-To: " . $fromemail . PHP_EOL;
        $mailheaders .= "X-Mailer: PHP/" . phpversion();
        $mailheaders .= "X-Priority: 1" . PHP_EOL;
            

        $mail_data = mail($toemail, $subject, $en_msg, $mailheaders, "-odb -f $fromemail");
       
        unset($_SESSION['verfy_email']);
    
        $returnArr = array("ResponseCode"=>"200","Result"=>"true","ResponseMsg"=>"Account Verfication Successful!","user"=>$row_u);

            }else{
                $returnArr = array("ResponseCode"=>"401","Result"=>"true","ResponseMsg"=>"OTP Expired! Please Register Again");
            }
         }else{
                $returnArr = array("ResponseCode"=>"401","Result"=>"true","ResponseMsg"=>"Account not Found! Please Register First");
            }
    }
    
    
}

echo json_encode($returnArr);