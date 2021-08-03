<!-- W3hubs.com - Download Free Responsive Website Layout Templates designed on HTML5 
   CSS3,Bootstrap,Tailwind CSS which are 100% Mobile friendly. w3Hubs all Layouts are responsive 
   cross browser supported, best quality world class designs. -->

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
 <?php include 'assets/libs/css/third.css' ?>





    </style>
</head>

<body class="registration">
    <div class="row m-0 h-100">
        <div class="col p-0 text-center d-flex justify-content-center align-items-center m-display-none-image">
            <img src="assets/img/login.svg" class="w-100">
        </div>
        <div class="col p-0 bg-custom d-flex justify-content-center align-items-center flex-column w-100">
            <form class="w-75" action="#" ng-app="" name="myForm" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Потребителско име</label>
                    <input type="text" class="form-control" id="username" placeholder="потребителско име" autocomplete="off"
                        required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" name="myAddress" ng-model="text" class="form-control" id="email" placeholder="e-mail" autocomplete="off"
                        required><span ng-show="myForm.myAddress.$error.email" style="color:red;">Невалиден e-mail.</span>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Парола</label>
                    <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" id="password" placeholder="парола" autocomplete="off"
                        required>
         
                </div>



                <div class="row">
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Остани вписан
                            </label>
                        </div>
                    </div>
                </div>
                <button id="btn-register" type="button" class="btn btn-custom btn-lg btn-block mt-3">Регистриране</button>
                <p id="success" style="display:none; color:green;"></p>
                <p id="error" style="display:none; color:red;"></p>
                <p id="pasw" style="display:none; color:red;"></p>

                <div class="logini">
                <a href="login.php">Вече имате профил? <br>Влезте тук</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

<script>
    $('#btn-register').unbind().bind('click', function(e){
        e.preventDefault();
        $('#error').hide();
        var username = $('#username').val();
        var email = $('#email').val();
        var password = $('#password').val();
        if(username != "" && email != "" && password != "") {


            $.ajax({
                url: "includes/user/create.php",
                type: "POST",
                data: {
                    username: username,
                    email: email,
                    password: password,
                },
                cache: false,
                success: function(dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if(dataResult.statusCode == 200) {
                        $('#success').html('Успешна регистрация!');
                        $('#success').show();
                        $('#error').hide();

                    } else if(dataResult.statusCode == 201) {
                        $('#error').html('Паролата трябва да съдържа минимум 8 символа, главна и малка буква и специален символ');
                        $('#error').show();
                        $('#success').hide();

                    } else if(dataResult.statusCode == 203) {
                        $('#error').html('Потребителското име вече съществува!');
                        $('#error').show();
                        $('#success').hide();

                    } else if(dataResult.statusCode == 204) {
                        $('#error').html('Вече има регистриран потребител с този e-mail!');
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
 