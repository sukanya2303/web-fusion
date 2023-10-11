<?php use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
$mail = new PHPMailer(true);


		
	if(isset($_POST['submit_form']))
			{ 
          $to=$_POST['to']; 
       $subject=$_POST['subject']; 
        $msg=$_POST['msg']; 
        $name=$_POST['name']; 

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 's.kokani2303@gmail.com';                     //SMTP username
    $mail->Password   = 'vwdy ooxo yywz eipa';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    
    $mail->setFrom('noreply@gmail.com', 'Web Fusion');
    
    //for multiple emails
    // $toarray=explode(",",$to);
    // foreach($toarray as $row)
    // {
    //      $mail->addAddress($row); 
    // }
    //for single email 
       $mail->addAddress($to,$name);     //Add a recipient              //Name is optional
       
    $mail->addReplyTo('s.kokani2303@gmail.com', 'Wen Fusion');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $msg;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo '<div class="success ">Message has been sent</div>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

    }
?>
	