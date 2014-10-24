<html>
<body>
<?php
include("../functions.php");
$randomnumber=rand ( 0, 1 );
echo "Thank You, I will email you in the next few days.";
$fieldArray=array("email"=>$_POST["email"],"fname"=>$_POST["fname"],"lname"=>$_POST["lname"]);
validateForm($fieldArray);
validEmail($_POST["email"]);
if ($_POST ["email"]){
    require 'PHPMailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'mail.warrant-group.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'noreply@warrant-group.com';                 // SMTP username
    $mail->Password = 'E29akgwwsR';                           // SMTP password
    $mail->SMTPSecure = '';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 25;                                    // TCP port to connect to

    $mail->From = $_POST["email"];
    $mail->FromName = $_POST["fname"] .' ' . $_POST["lname"];
    $mail->addAddress('kane.bycroft@warrant-group.com', 'Kane Bycroft');     // Add a recipient
    $mail->addReplyTo($_POST["email"], $_POST["fname"] .' ' . $_POST["lname"]);

    $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'contact form';
    $mail->Body    = $_POST["message"];
    $mail->AltBody = $_POST["message"];

    $mail->send();
    echo "<img src='http://www.islandwebworks.ca/images/gears/messageSent.gif' style='width:304px;height:228px'>" . '<br>';
};

