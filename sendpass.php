<?php
require_once "includes/dbconnect.php";
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
 $password = substr( str_shuffle( $chars ), 0, 8 );
 $newpassword = password_hash($password, PASSWORD_DEFAULT);

 $name= $_POST['username'];
 $email=mysqli_entities_fix_string($conn, $_POST['email']);
 
 $query = "UPDATE users SET password = '$newpassword'";
 $result = $conn -> query($query);
 $passwordnew = 'Новата Ви парола е : '.$password . '. Можете да я смените от тук:<br> http://book.local//changepass.php';
require_once "Composer/vendor/autoload.php";





?>

<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


$mail = new PHPMailer;



$mail->addAddress($_POST['email'], "Recipient Name");

$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tls";
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->Username = 'vladicius@gmail.com';
$mail->Password = '088470701hateE';
$mail->From = $email;
$mail->FromName = "Vladislav";
$mail->isHTML(true);
$mail->setFrom('bgoutlaw_@abv.bg', 'vladicius@gmail.com');
$mail->addAddress($_POST['email'], 'Joe User');
$mail->Subject = $passwordnew;
$mail->Body = $passwordnew;
$mail->AltBody = "This is the plain text version of the email content";


try {
    $mail->send();
    echo json_encode(["statusCode" => 200]);
} catch (Exception $e) {
    echo json_encode(["statusCode" => 201]);

}
 ?>