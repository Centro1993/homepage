<?php 
if(isset($_POST['submit'])){
    $to = "jonas.leitner93@gmail.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $subject = "Kontaktanfrage via Homepage";
    $subject2 = "Deine Kontaktanfrage an Jonas Leitner";
    $message = $first_name . " " . $last_name . " schrieb:" . "\n\n" . $_POST['message'];
    $message2 = "Hier eine Kopie deiner Nachricht " . $first_name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Kontaktanfrage gesendet, vielen Dank =)";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    }
?>
