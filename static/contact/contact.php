<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

$configs = include('config.php');

set_time_limit(60); // set the time limit to 120 seconds

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
$Mail->FromName    = $_POST['name'];
$Mail->WordWrap    = 900; // RFC 2822 Compliant for Max 998 characters per line

$Mail->AddAddress( $configs['mail'] ); // To:
$Mail->isHTML( FALSE );
$Mail->Body    = $_POST['email'] . " schrieb: \n" . $_POST['message'];
$Mail->Send();
$Mail->SmtpClose();

if ( $Mail->IsError() ) {
    echo "Fehler beim Versenden";
} else {
    echo "Danke für deine Mail! Ich werde dir in Kürze antworten.";
}
?>