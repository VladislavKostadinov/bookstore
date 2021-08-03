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
    <title>Вписване</title>
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
            <form class="w-75" action="#">
                <div class="mb-3">
                    <label for="username" class="form-label">Потребителско име</label>
                    <input type="text" class="form-control" id="username" placeholder="потребителско име" autocomplete="off"
                        required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Парола</label>
                    <input type="password" class="form-control" id="password" placeholder="парола" autocomplete="off"
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
                <button id="btn-login" type="button" class="btn btn-custom btn-lg btn-block mt-3">Вход</button>
                <p id="success" style="display:none; color:green;"></p>
                <p id="error" style="display:none; color:red;"></p>
            </form>
        <a class="redirect" href="registration.php">Нямате профил? Регистрирайте се</a>
        <a class="redirect" href="forgottenpass.php">Забравена парола?</a>

        </div>

    </div>
</body>
</html>

<script>
$('#btn-login').unbind().bind('click', function(e){
  e.preventDefault();
  $('#error').hide();
  var username = $('#username').val();
  var password = $('#password').val();

  if(username != "" && password != "") {
    $.ajax ({
      type: 'POST',
      data: {
        username: username,
        password: password,
      },
      cache: false,
      url: 'includes/user/login.php',
      success: function(dataResult) {
        var dataResult = JSON.parse(dataResult);

        if(dataResult.statusCode == 200) {
          window.location = "./index.php";
        } else if(dataResult.statusCode == 201) {
          $('#error').show();
          $('#error').html('Паролата не съвпада.');
        } else if(dataResult.statusCode == 202) {
          $('#error').show();
          $('#error').html('Няма такъв потребител.');

        }
      }
    });
  } else {
    alert('Моля, въведете Вашите данни.');
  }
});

</script>