<?php 
    if(isset($_POST['reset'])) {
        $email = $_POST['email'];
    }
    else {
        exit();
    }

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'supawork88@gmail.com';                     //SMTP username
    $mail->Password   = 'atvxuekokyxqfqjw';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('supawork88@gmail.com', 'Admin');
    $mail->addAddress($email);     //Add a recipient
    
    $code = substr(str_shuffle('1234567890QWERTYUIOPASDFGHJKLZXCVBNM'),0,10);


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Password Reset';
    $mail->Body    = 'Hello, To reset your password  <a href="http://localhost:83/reset_password.php?code='.$code.'">Click reset password here</a> . </br> Reset your password in a day.';
    
    $conn = new mysqli('db','root','example','cars');

    if($conn->connect_error) {
        die('Could not connect to the database.');
     }

    $verifyQuery = $conn->query("SELECT * FROM users WHERE email = '$email'");

    if($verifyQuery->num_rows) {
        $codeQuery = $conn->query("UPDATE users SET code = '$code' WHERE email = '$email'");
        $mail->send();
          echo 'Message has been sent , check your email';
     } 
     $conn->close();
    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>