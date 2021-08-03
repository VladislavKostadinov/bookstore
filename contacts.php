<?php 

require_once 'header.php';

require_once 'includes/dbconnect.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if(isset($_POST['submit'])) {
  

require_once "Composer/vendor/autoload.php";

$mail = new PHPMailer;



$mail->addAddress('vladicius@gmail.com', "Recipient Name");

$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tls";
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->Username = 'vladicius@gmail.com';
$mail->Password = '088470701hateE';
$mail->From = $_POST['email'];
$mail->FromName = "Vladislav";
$mail->isHTML(true);
$mail->setFrom('bgoutlaw_@abv.bg', 'vladicius@gmail.com');
$mail->Subject = $_POST['subject'];
$mail->Body = $_POST['message'];
$mail->AltBody = "This is the plain text version of the email content";


try {
    $mail->send();  

   
} catch (Exception $e) {
    
}

}
?>

<style>
    <?php include 'assets/libs/css/contacts.css'?>
     <?php include 'assets/libs/css/style.css' ?>
     <?php include 'assets/libs/css/sidebst.css' ?>
     .contacts {
        background: linear-gradient(to right, #c3e998, #3a551e) !important;  
  }
  .form-control.require {
      border: 4px solid red;
}
    
 </style>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Contact Us</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- Bootstrap CSS -->
       <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

        <head> 

</head>
    </head>
    <body>
        <!-- Contact Us Section -->
        <section class="contact-us">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="section-title">
                            <h2>Контакти</h2>
                            <p><b>Свържете се с нас</b> като ни изпратите <b>e-mail</b> или ни посетите на място (на адреса на офиса ни).</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-7">
                        <form method="post" id="reused_form" ng-app="" name="contact_form" action="subscriberform.php" class="mb-4 mb-lg-0">
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Вашето име" required/>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="email" ng-model="text" class="form-control" name="email" id="email" placeholder="Вашият e-mail" required/>
                                    <span id="hype" ng-show="contact_form.email.$error.email" style="color:red;">Невалиден e-mail.</span>   
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Тема"/>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" id="message" placeholder="Напишете съобщение" required></textarea>
                            </div>
                            <button type="submit" id="submits" class="btn btn-light">Изпрати</button>
                            <div id="users" style="display:none; color:yellow;">Моля, въведете вашето име.</div>
                            <div id="emails" style="display:none; color:yellow;">Моля, въведете вашият e-mail.</div>
                            <div id="messages" style="display:none; color:yellow;">Моля, въведете вашето съобщение.</div>
                            <div id="dype" style="display:none; color:lightblue;">Моля, изчакайте...</div>
                            <div id="success" style="color: lightgreen;"></div>
                            <div id="error"></div>
                        </form>
 
                    </div>

                    <div class="col-lg-5">
                        <div class="map">
                            <iframe src="https://maps.google.com/maps?q=Sofia%201715,%20mladost%204,%20469A&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="350" frameborder="0" style="border: 0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Contact Us Section -->
    </body>
</html>


<!-- <script>


$(document).ready(function () {
$("#submits").unbind().bind("click", function(e) {



    e.preventDefault();
  



        $.ajax({
            type: 'POST',
            data: formData,
            // data: {
            //     email: email,
            //     subject: subject,
            //     message:message,
            // }, 
            cache: false, 
            processData: false,
            contentType: false,
            url: 'subscriberform.php', 

            success: function(dataResult) {
               var dataResult = JSON.parse(dataResult);
                if(dataResult.statusCode == 200) {

                    $('#warning').hide();
                    $("#dype").hide();
                    $("#users").hide();
                    $("#emails").hide();
                    $("#messages").hide();
                    $('#emails').removeClass('require');
                    $('#users').removeClass('require');
                    $('#messages').removeClass('require');
                    $('#name').removeClass('require');
                    $('#email').removeClass('require');
                    $('#message').removeClass('require');



                    $('#hype').hide();
                    $('#success').html('Съобщението е изпратено успешно.');
                    setTimeout(function() {
                     $("#success").empty();
                        }, 3000);
                        $('form').trigger('reset');


                } else if(dataResult.statusCode == 201) {
                    $('#success').hide();
                    $('#warning').html('Изкикна грешка при изпращането на вашето съобщение.');
                    }

            } 

        });

});
});




</script> -->