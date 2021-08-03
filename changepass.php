<?php

require_once 'includes/dbconnect.php';


session_start();
unset($_SESSION['login_user']);

 session_destroy();

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


<!-- Bootstrap bundle js -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<!-- Jquery -->
<script src="assets/vendor/jquery/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Нова парола</title>
    <style>
 <?php include 'assets/libs/css/third.css' ?>

    </style>
</head>

<body class="registration">
    <div class="row m-0 h-100">
        <div class="col p-0 text-center d-flex justify-content-center align-items-center m-display-none-image">
            <img src="assets/img/login.svg" class="w-100">
        </div>
        <div class="col p-0 bg-custom d-flex justify-content-center align-items-center flex-column w-100">
            <form class="w-75" action="#"  method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="username" class="form-label">Потребителско име</label>
                    <input type="text" class="form-control" id="username" placeholder="потребителско име" autocomplete="off"
                        required>
                </div>

                <div class="mb-3">
                    <label for="oldpassword" class="form-label">Стара парола</label>
                    <input type="password" class="form-control" id="oldpassword" placeholder="стара парола" autocomplete="off"
                        required>
                </div>

                <div class="mb-3">
                    <label for="newpassword" class="form-label">Нова парола</label>
                    <input type="password" class="form-control" id="newpassword" placeholder="нова парола" autocomplete="off"
                        required>
                </div>

                <div class="mb-3">
                    <label for="newpasswordtwo" class="form-label">Повторете новата парола</label>
                    <input type="password" class="form-control" id="newpasswordtwo" placeholder="повторете нова парола" autocomplete="off"
                        required>
                </div>

              
                <button id="btn-change" type="button" class="btn btn-custom btn-lg btn-block mt-3">Запазете промените</button>
                <p id="success" style="display:none; color:green;"></p>
                <p id="logins" style="display:none; color:green;">Можете да влезете в профила си чрез новата парола <a class="logout" href="login.php">от тук</a></h5>
</p>
                <p id="error" style="display:none; color:red;"></p>
            </form>

        </div>

    </div>
</body>
</html>

<script>
$('#btn-change').unbind().bind('click', function(e){
    
  e.preventDefault();
  $('#error').hide();
  var username = $('#username').val();
  var oldpassword = $('#oldpassword').val();
  var newpassword = $('#newpassword').val();
  var newpasswordtwo = $('#newpasswordtwo').val();

  if(username != "" && oldpassword != ""  && newpassword != "" && newpasswordtwo != "") {
    $.ajax ({
      type: 'POST',
      data: {
        username: username,
        oldpassword: oldpassword,
        newpassword: newpassword,
        newpasswordtwo: newpasswordtwo,

      },
      cache: false,
      url: 'includes/user/changepassword.php',
      success: function(dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if(dataResult.statusCode == 200) {
                        $('form').trigger('reset');

                        $('#success').html('Успешно променихте Вашата парола!');
                        $('#success').show();
                        $('#logins').show();
                        $('#error').hide();

                    } else if(dataResult.statusCode == 201) {
                        $('#error').html('Паролата трябва да съдържа минимум 8 символа, главна и малка буква и специален символ');
                        $('#error').show();
                        $('#success').hide();

                    } else if(dataResult.statusCode == 202) {
                        $('#error').html('Текущата Ви парола не съвпада!');
                        $('#error').show();
                        $('#success').hide();

                    } else if(dataResult.statusCode == 203) {
                        $('#error').html('Въведените символи за Нова парола не съвпадат!');
                        $('#error').show();
                        $('#success').hide();

                    } else if(dataResult.statusCode == 204) {
                        $('#error').html('Новата Ви парола съвпада със старата!');
                        $('#error').show();
                        $('#success').hide();

                    } 
                }
            });
        } else {
            alert('Попълнете задължителните полета.');
        }
    });

</script>