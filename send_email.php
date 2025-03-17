<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $mobile = htmlspecialchars($_POST['mobile']);
    $email = htmlspecialchars($_POST['email']);
    $address = htmlspecialchars($_POST['address']);
    $feedback = htmlspecialchars($_POST['feedback']);

    $mail = new PHPMailer(true);

    try {
        // SMTP Settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  
        $mail->SMTPAuth = true;
        $mail->Username = 'your_email@gmail.com'; // YOUR GMAIL
        $mail->Password = 'your_app_password'; // YOUR APP PASSWORD
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Email Settings
        $mail->setFrom('your_email@gmail.com', 'Portfolio Contact Form');
        $mail->addAddress('shakyaaman288@gmail.com'); // Your Email

        $mail->Subject = "New Contact Form Submission";
        $mail->Body = "Name: $name\nMobile: $mobile\nEmail: $email\nAddress: $address\nFeedback: $feedback";

        $mail->send();
        echo "Your message has been sent successfully!";
    } catch (Exception $e) {
        echo "Oops! Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid request!";
}
?>
