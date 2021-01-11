<?php session_start();
require 'db.php';
$data = json_decode(file_get_contents('php://input'), true);
if($data['name'] == '' or $data['email'] == '' or $data['mobile'] == '' or $data['password'] == '')
{
    $returnArr = array("ResponseCode"=>"401","Result"=>"false","ResponseMsg"=>"Something Went Wrong!");
}
else
{
    
    $name = strip_tags(mysqli_real_escape_string($con,$data['name']));
    $email = strip_tags(mysqli_real_escape_string($con,$data['email']));
    $mobile = strip_tags(mysqli_real_escape_string($con,$data['mobile']));
     $password = strip_tags(mysqli_real_escape_string($con,$data['password']));
     
     
     
    $checkmob = $con->query("select * from user where mobile='".$mobile."' and status = '1'");
    $checkemail = $con->query("select * from user where email='".$email."' and status = '1'");
   
    if($checkmob->num_rows != 0)
    {
        $returnArr = array("ResponseCode"=>"401","Result"=>"false","ResponseMsg"=>"Mobile Number Already Used!");
    }
     else if($checkemail->num_rows != 0)
    {
        $returnArr = array("ResponseCode"=>"401","Result"=>"false","ResponseMsg"=>"Email Address Already Used!");
    }
    else
    {
        $checkcred = $con->query("select * from user where mobile='".$mobile."' or email='".$email."'");
   
        if($checkcred->num_rows != 0)
        {
            $con->query("delete from user where mobile='".$mobile."' or email='".$email."'");
        }
        $ccode = rand(999,9999);
        $timestamp = date("Y-m-d H:i:s");
        $auth_date = strtotime($timestamp);
        
        $con->query("insert into user(`name`,`email`,`mobile`,`rdate`,`password`,`status`,`ccode`,`auth_date`)values('".$name."','".$email."','".$mobile."','".$timestamp."','".$password."','0','".$ccode."','".$auth_date."')");

        $mail_content = 'Dear <b>'.$name.'</b>,<br>This is our system generated mail that is being sent out to you with regard to your account at <a href="https://www.finemorningpharma.com/" target="_blank">finemorningpharma.com</a><br><br>For Enhance security of your account, you need to verify your email address <b><a href="'.$email.'"></b>'.$email.'</a><br><br>Please Enter this OTP to activate your account :<br>
                                                                <p style="text-align: center;font-size: 18px;background-color: #61ba5e;font-weight: 800;width: fit-content;margin: 0 auto;   padding: 10px;">'.$ccode.'</p>
                                                                <p><span style="color: red;font-size: 12px;">Note:</span> This OTP will be valid for 24 hours.</p>
                                                                <p>After you verfy your email address, you can start order products on <a href="https://www.finemorningpharma.com/" target="_blank">finemorningpharma.com</a> </p>';
        $mail_header = 'Your <a style="color: white;font-weight: 700;text-decoration: none;" href="https://www.finemorningpharma.com/" target="_blank">finemorningpharma.com</a> Account Verification';


        $en_msg = file_get_contents('https://www.finemorningpharma.com/include/reg_email.html');


        $en_msg = str_replace('$mail_content', $mail_content, $en_msg);
        $en_msg = str_replace('$mail_header', $mail_header, $en_msg);

        $subject = 'Account Verification : Fine Morning Pharma';
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
       
        $_SESSION["verfy_email"] = $email;
    
        $returnArr = array("ResponseCode"=>"200","Result"=>"true","ResponseMsg"=>"Please Enter an OTP Sent on your Email ID!");
    }
    
    
}

echo json_encode($returnArr);