<?php 
require 'db.php';
$data = json_decode(file_get_contents('php://input'), true);
if($data['name'] == '' or $data['email'] == '' or $data['phone'] == '' or $data['message'] == '')
{
    $returnArr = array("ResponseCode"=>"401","Result"=>"false","ResponseMsg"=>"Something Went Wrong!");
}
else
{
    
    $email = strip_tags(mysqli_real_escape_string($con,$data['email']));
    $name = strip_tags(mysqli_real_escape_string($con,$data['name']));
    $phone = strip_tags(mysqli_real_escape_string($con,$data['phone']));
    $subject = strip_tags(mysqli_real_escape_string($con,$data['subject']));
    $message = strip_tags(mysqli_real_escape_string($con,$data['message']));
     
    $fromemail = "info@finemorningpharma.com";
       
        $timestamp = date("Y-m-d H:i:s");
        
        $con->query("insert into contact_details(`name`,`email`,`phone`,`subject`,`message`,`contact_date`) 
        values('".$name."','".$email."','".$phone."','".$subject."','".$message."','".$timestamp."')");
        $subject = 'Fine Morning Enquiry';
        $message2 = 'Dear '.strtoupper($name).',<br><br> Your enquiry has been submitted successfully.<br><br> Our team will get back to you in 24 hours.';

        $message1 = 'Name : '.$name.'<br>'.'Email ID : '.$email.'<br>'.'Phone : '.$phone.'<br>'.'Subject : '.$subject.'<br>'.'Message : '.$message;
                        
        $mailheaders = "MIME-Version: 1.0" . PHP_EOL;
        $mailheaders .= "Content-type: text/html; charset=iso-8859-1" . PHP_EOL;
        $mailheaders .= "From: Fine Morning Pharma " . $fromemail . PHP_EOL;
        $mailheaders .= "Bcc: finemorningpharma@gmail.com" . PHP_EOL;
        $mailheaders .= "Reply-To: " . $fromemail . PHP_EOL;
        $mailheaders .= "X-Mailer: PHP/" . phpversion();
        $mailheaders .= "X-Priority: 1" . PHP_EOL;
            
        

        $mail_data = mail($email, $subject, $message2, $mailheaders, "-odb -f $fromemail");
      

        $mail_data = mail($fromemail, $subject, $message1, $mailheaders, "-odb -f $fromemail");

    
        $returnArr = array("ResponseCode"=>"200","Result"=>"true","ResponseMsg"=>"Request Sent successfully!");
    
    
    
}

echo json_encode($returnArr);