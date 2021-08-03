<?php 
session_start();

unset($_SESSION['login_user']);

session_destroy();

error_reporting(0);


require_once 'includes/dbconnect.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if(isset($_POST['submit'])) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $password = substr( str_shuffle( $chars ), 0, 8 );
    $newpassword = password_hash($password, PASSWORD_DEFAULT);
   
    $name= $_POST['username'];
    $email=$_POST['myAddress'];
    $result = "";

    $query = "UPDATE users SET password = '$newpassword' WHERE email='$email' AND username='$name'";
    $result =$conn->query($query);
    $passwordnew = 'Новата Ви парола е : '.$password . '. Можете да я смените от тук:<br> http://book.local//changepass.php';
    header('Cache-Control: no-cache, must-revalidate, max-age=0');
    
    if(mysqli_affected_rows($conn) >0) {
    ?> <script> alert('На пощата Ви е изпратено съобщение с нова парола!');
    window.location.href = "index.php";
 </script> <?php } else {
 ?> 
     <script> setTimeout(function timer() {
  document.getElementById("error").innerHTML = "Възникна грешка. Вероятно потребителят и пощата не съвпадат.";}, 2000);
    </script> <?php    
 }

require_once "Composer/vendor/autoload.php";

$mail = new PHPMailer;



$mail->addAddress($_POST['myAddress'], "Recipient Name");

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
$mail->Subject = "New password";
$mail->Body = utf8_decode('Your new passwords is : <b>'.$password . '</b>. You can change it on the following <a href="http://book.local//changepass.php">link</a>.');
$mail->AltBody = "This is the plain text version of the email content";


try {
    $mail->send();  
} catch (Exception $e) { 
}

}
?>




<!doctype html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css"/>

<!-- Our CSS -->
<link rel="stylesheet" href="assets/libs/css/style.css"/>

<link rel="stylesheet" href="assets/libs/css/secondcss.css"/>
 <!-- Our AngularJS -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

<!-- Bootstrap bundle js -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<!-- Jquery -->
<script src="assets/vendor/jquery/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Регистриране</title>
    <style>
 <?php include 'assets/libs/css/third.css';
 
 ?>
    </style>
</head>

<body class="registration">
    <div class="row m-0 h-100">
        <div class="col p-0 text-center d-flex justify-content-center align-items-center m-display-none-image">
            <img src="assets/img/login.svg" class="w-100">
        </div>
        <div class="col p-0 bg-custom d-flex justify-content-center align-items-center flex-column w-100">
            <form class="w-75" action="forgottenpass.php" ng-app="" name="myForm" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="username" class="form-label">Потребителско име</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="потребителско име" autocomplete="off"
                    value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" name="myAddress" class="form-control" id="email" placeholder="e-mail" autocomplete="off"
                    value="<?php echo isset($_POST['myAddress']) ? $_POST['myAddress'] : '' ?>" required>
                </div>


                <button id="btn-send" type="submit" onclick="timer();" name="submit" class="btn btn-custom btn-lg btn-block mt-3">Изпрати нова парола</button>
                <p id="error"></p>
   

                        

            </form>
        </div>
    </div>
</body>

</html>


    