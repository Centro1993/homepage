<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

$configs = include('config.php');

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";

$mail->SMTPDebug  = 1;
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";
$mail->Username   = $configs["mail"];
$mail->Password   = $configs["password"];

if(isset($_POST['submit'])){

    $mail->IsHTML(true);
    $mail->AddAddress($configs["mail"], "Jonas Leitner");
    $mail->SetFrom($configs["mail"], $_POST['name']);
    $mail->Subject = "Kontaktanfrage via jonasleitner.de";
    $content = $_POST['message'];

    $mail->MsgHTML($content);
    if(!$mail->Send()) {
        echo "Fehler beim Versenden";
        var_dump($mail);
    } else {
        echo "Danke für deine Mail! Ich werde dir in Kürze antworten.";
    }

    }
?>

<!DOCTYPE html>
<head>
<title>Form submission</title>
</head>
<body>

<form action="" method="post">
First Name: <input type="text" name="first_name"><br>
Last Name: <input type="text" name="last_name"><br>
Email: <input type="text" name="email"><br>
Message:<br><textarea rows="5" name="message" cols="30"></textarea><br>
<input type="submit" name="submit" value="Submit">
</form>

