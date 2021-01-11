<?php 
require 'db.php';
$data = json_decode(file_get_contents('php://input'), true);
if($data['phone'] == '')
{
    $returnArr = array("ResponseCode"=>"401","Result"=>"false","ResponseMsg"=>"Something Went Wrong!");
}
else
{
    
    $phone = strip_tags(mysqli_real_escape_string($con,$data['phone']));
     
     
    $checkemail = $con->query("select * from newsletter where phone='".$phone."'");
   
    if($checkemail->num_rows != 0)
    {
        $returnArr = array("ResponseCode"=>"401","Result"=>"false","ResponseMsg"=>"Phone Number Already Used!");
    }
    else
    {
       $fromemail = "info@finemorningpharma.com";
        $timestamp = date("Y-m-d H:i:s");
        
        $con->query("insert into newsletter(`phone`,`date`)values('".$phone."','".$timestamp."')");

        $subject = 'Newsletter Subscription - Fine Morning';
        $message = 'New User Subscribed.<br>Phone Number : '.$phone;
                        
        $mailheaders = "MIME-Version: 1.0" . PHP_EOL;
        $mailheaders .= "Content-type: text/html; charset=iso-8859-1" . PHP_EOL;
        $mailheaders .= "From: Fine Morning Pharma " . $fromemail . PHP_EOL;
        $mailheaders .= "Bcc: finemorningpharma@gmail.com" . PHP_EOL;
        $mailheaders .= "Reply-To: " . $fromemail . PHP_EOL;
        $mailheaders .= "X-Mailer: PHP/" . phpversion();
        $mailheaders .= "X-Priority: 1" . PHP_EOL;
            
        

        $mail_data = mail($fromemail, $subject, $message, $mailheaders, "-odb -f $fromemail");
       

    
        $returnArr = array("ResponseCode"=>"200","Result"=>"true","ResponseMsg"=>"Registration successfully!");
    }
    
    
}

echo json_encode($returnArr);