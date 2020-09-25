

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

$configs = include('config.php');

$publickey = $configs['recaptchaSitekey'];
$privatekey = $configs['recaptchaSecret'];

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$gRecaptchaResponse = isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response'] : false;

if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {

    // Verify the reCAPTCHA response
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$privatekey.'&response='.$_POST['g-recaptcha-response']);

    // Decode json data
    $responseData = json_decode($verifyResponse);

    if ($responseData->success) {
        $Mail = new PHPMailer();
        $Mail->IsSMTP(); // Use SMTP
        $Mail->Timeout = 120;
        $Mail->Host        = "smtp.gmail.com"; // Sets SMTP server
        # $Mail->SMTPDebug   = 2; // 2 to enable SMTP debug information
        $Mail->SMTPAuth    = TRUE; // enable SMTP authentication
        $Mail->Port        = 587; // set the SMTP port
        $Mail->Username   = $configs["mail"];
        $Mail->Password   = $configs["password"];
        $Mail->Priority    = 1; // Highest priority - Email priority (1 = High, 3 = Normal, 5 = low)
        $Mail->CharSet     = 'UTF-8';
        $Mail->Encoding    = '8bit';
        $Mail->Subject = "Kontaktanfrage via jonasleitner.de";
        $Mail->ContentType = 'text/html; charset=utf-8\r\n';
        $Mail->From        = $configs["mail"];
        $Mail->FromName    = $name;
        $Mail->WordWrap    = 900; // RFC 2822 Compliant for Max 998 characters per line

        $Mail->AddAddress( $configs['mail'] ); // To:
        $Mail->isHTML( FALSE );
        $Mail->Body    = $email . " schrieb: \n" . $message;
        $Mail->Send();
        $Mail->SmtpClose();

        if ( $Mail->IsError() ) {
            echo "Fehler beim Versenden";
        } else {
            echo "Danke für deine Mail! Ich werde dir in Kürze antworten.";
        }
    } else {
        echo "Recaptcha fehlgeschlagen, bitte versuchen Sie es erneut.";
        print_captcha($name, $email, $message, $publickey);
    }
} else {
    print_captcha($name, $email, $message, $publickey);
}

function print_captcha($name, $email, $message, $publickey) {
    echo "
<head>
    <title>Jonas Leitner</title>
</head>
<body>
<script src='https://www.google.com/recaptcha/api.js' async defer></script>
<form action='/contact/contact.php' method='POST'>
    <input type='hidden' name='name' value='$name'>
    <input type='hidden' name='email' value='$email'>
    <input type='hidden' name='message' value='$message'>

    <div class='g-recaptcha' data-sitekey='$publickey'></div>
    <br/>
    <input type='submit' value='Bestätigen'>
</form>
</body>";
}
?>
