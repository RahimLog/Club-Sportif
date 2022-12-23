<?php

    function check_login($con)
    {
        if(isset($_SESSION['user_id']))
        {
            $id = $_SESSION['user_id'];
            $query = "select * from users where user_id = '$id' limit 1";

            $result = mysqli_query($con,$query);
            if($result  && mysqli_num_rows($result) > 0 )
            {
                $user_data = mysqli_fetch_assoc($result);
                return $user_data;
            }
        }
        //redirect to login
        header("location: login.php");
        die;
    }
    function random_num($length)
    {
        $text ="";
        if($length < 5)
        {
            $length = 5;
        }
        $len = rand(4,$length);
        for ($i=0; $i < $len; $i++) { 
            # code...
            $text .=rand(0,9);
        }
        return $text;
    }

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function sendemail_verify($user_name,$email,$verify_token)
{

    $mail = new PHPMailer(true);

    try {
    $mail->isSMTP();                 
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'abdderrQZahmad  SD sne.sairtayeb@gmfdail.com';                     //SMTP username
    $mail->Password   = 'lhlvQqpvqDusyDFbrjhfsrvvpj';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('from@example.com', 'Rahim');
    $mail->addAddress($email, $user_name);     //Add a recipient

    //$message = "name".$user_name."/n.'Email'.$email ";
    $mail->template = "
        <h2> You have Registred with Club Sportif </h2>
        <h4> verify your email address to login with the below link </h4> <br>
        <a href='http://clubsportif/php/verify_email.php?token=$verify_token'> click me </a>";
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Registration confirmation';
    $mail->Body    = $mail->template;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    //echo 'Message has been sent';
    } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}


?>
