<?php
require_once "includes/dbconnect.php";


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "Composer/vendor/autoload.php";

$mail = new PHPMailer;



$mail->addAddress("vladicius@gmail.com", "Recipient Name");

$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tls";
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->Username = 'vladicius@gmail.com';
$mail->Password = '088470701hateE';
$mail->From = "bgoutlaw_@abv.bg";
$mail->FromName = "Vladislav";
$mail->isHTML(true);
$mail->setFrom('bgoutlaw_@abv.bg', $_POST['email']);
$mail->addAddress('vladicius@gmail.com', 'Joe User');
$mail->Subject = $_POST['subject'];
$mail->Body = $_POST['message'];
$mail->AltBody = "This is the plain text version of the email content";

try {
    $mail->send();
    ?><script>alert('Съобщението е изпратено успешно');
window.location.href = "contacts.php";</script> <?php
} catch (Exception $e) {

}