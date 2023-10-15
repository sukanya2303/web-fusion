<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Include PHPMailer

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 's.kokani2303@gmail.com'; // Your SMTP username
        $mail->Password = 'vwdy ooxo yywz eipa'; // Your SMTP password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        //Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('s.kokani2303@gmail.com'); // Change to your recipient's email and name

        //Content
        $mail->isHTML(false);
        $mail->Subject = 'WebFusion Solutions';
        $mail->Body = "Name: $name\nEmail: $email\nPhone: $phone\nMessage:\n$message";

        $mail->send();
        echo 'Message has been sent. Thank you for contacting us!';
        echo '<a href="../index.html">Click here to return to the homepage</a>';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    // Handle form not being submitted
    echo "Form not submitted.";
}
?>
