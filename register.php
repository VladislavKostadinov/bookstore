<?php 
require_once 'header.php';

?>
<style>
         <?php include 'assets/libs/css/style.css' ?>
     <?php include 'assets/libs/css/sidebst.css' ?>
   </style>

<body id="bod">
<div id="login-box">
  <div class="left">
    <h1>Регистрация</h1>
    
    <input type="text" class="texts" name="username" placeholder="Потребителско име" />
    <input type="text" class="texts" name="email" placeholder="E-mail" />
    <input type="password" name="password" placeholder="Парола" />
    <input type="password" name="password2" placeholder="Повтори паролата" />
    
    <input class="submt" type="submit" name="signup_submit" value="Регистрирай ме" />
  </div>
  
  <div class="right">
    <span class="loginwith">Впиши се със<br />социална мрежа</span>
    
    <button class="social-signin facebook"><i style="margin-left: -6px;"class="fa fa-facebook-official mr-3 text-primary fa-fw"></i>
 Впиши се с Facebook</button>
    <button class="social-signin twitter" style="padding-left:0px; padding-right:20px;"><i class="fa fa-twitter mr-3 text-primary fa-fw" style="padding-right: 15px;"></i> Впиши се с Twitter</button>
    <button class="social-signin google"><i class="fa fa-google-plus text-primary fa-fw" style="margin-left: -8px;"></i> Впиши се с Google+</button>
  </div>
  <div class="or">ИЛИ</div>
</div>
</body>
